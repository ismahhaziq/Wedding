<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\Catering;
use App\Models\Date;
use App\Models\User;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_type = auth()->user()->user_type;

        $invoices = Invoice::where('user_id', $user->id)->with('user')->get();

        $eventDate = Date::where('user_id', $user->id)->value('date');

        $users = User::with('invoices')->get();

         // Assuming you want to display the date associated with the first invoice (modify as needed)

        return view($user_type . '.invoices.index', compact('invoices', 'eventDate', 'users'));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
  
        return redirect()->route('invoices.index')
                         ->with('success','Invoice deleted successfully');
    }

    public function handlePayment(Request $request, $totalAmount)
{
    // Assuming you have set up the PayPal client

    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();

    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('success.payment'),
            "cancel_url" => route('cancel.payment'),
        ],
        "purchase_units" => [
            0 => [
                "amount" => [
                    "currency_code" => "MYR", // Adjust currency code as needed
                    "value" => $totalAmount,
                ]
            ]
        ]
    ]);

    if (isset($response['id']) && $response['id'] != null) {
        foreach ($response['links'] as $links) {
            if ($links['rel'] == 'approve') {
                return redirect()->away($links['href']);
            }
        }
        return redirect()
            ->route('cancel.payment')
            ->with('error', 'Something went wrong.');
    } else {
        return redirect()
            ->route('invoices.index')
            ->with('error', $response['message'] ?? 'Something went wrong.');
    }
}


    public function paymentCancel()
    {
        return redirect()
            ->route('invoices.index')
            ->with('error', 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->input('token'));

        try {
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Update the status of the invoice to 'Paid'
                $invoiceId = $request->input('invoice_id'); // Assuming you pass the invoice ID along with the payment request
                $invoice = Invoice::find($invoiceId);

                $invoice->status = 'Paid';
                $invoice->save();

                return redirect()
                    ->route('invoices.index')
                    ->with('success', 'Transaction complete.');
            } else {
                return redirect()
                    ->route('invoices.index')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (ModelNotFoundException $e) {
            // Handle ModelNotFoundException (Invoice not found)
            return redirect()
                ->route('invoices.index')
                ->with('error', 'Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()
                ->route('invoices.index')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function updateStatus(Invoice $invoice)
    {
        $invoice->update(['status' => 'Completed']);

        return redirect()->route('invoices.index')
            ->with('success', 'Status updated successfully');
    }

}
