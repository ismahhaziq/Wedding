<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Catering;
use App\Models\Date;
use App\Models\User;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_type = auth()->user()->user_type;

        $invoices = Invoice::with('items')->where('user_id', $user->id)->get();

        $eventDate = Date::where('user_id', $user->id)->value('date');

        $users = User::with('invoices')->get();

        // Assuming you want to display the date associated with the first invoice (modify as needed)

        return view($user_type . '.invoices.index', compact('invoices', 'eventDate', 'users'));
    }

    public function destroy(InvoiceItem $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }

    public function handlePayment(Request $request, $totalAmount)
    {
        // Retrieve the invoice_id from the request parameters
        $invoiceId = $request->route('invoice_id');

        // Store the invoice_id in the session
        session(['invoice_id' => $invoiceId]);

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
        // Retrieve the invoice_id from the session
        $invoiceId = session('invoice_id');

        // Verify if the invoice ID is valid
        if ($invoiceId) {
            // Retrieve the invoice from the database
            $invoice = Invoice::find($invoiceId);

            // Check if the invoice exists
            if ($invoice) {
                // Update the status of the invoice to 'Paid'
                $invoice->status = 'Paid';
                $invoice->save();

                // Retrieve the event date directly from the invoice
                $eventDate = $invoice->dates ? $invoice->dates->date : null;

                // Send the invoice email
                $this->sendInvoiceEmail($invoice, $eventDate);

                // Redirect the user with a success message
                return redirect()->route('invoices.index', ['invoice_id' => $invoiceId])->with('success', 'Invoice payment successful.');
            } else {
                // Handle the scenario where the invoice does not exist
                return redirect()->route('invoices.index')->with('error', 'Invoice not found.');
            }
        } else {
            // Handle the scenario where the invoice ID is missing
            return redirect()->route('invoices.index')->with('error', 'Invoice ID not provided.');
        }
    }



    public function updateStatus(Invoice $invoice)
    {
        $invoice->update(['status' => 'Completed']);

        return redirect()->route('invoices.index')
            ->with('success', 'Status updated successfully');
    }

    public function sendInvoiceEmail(Invoice $invoice, $eventDate)
    {
        $user = auth()->user();
        $invoices = Invoice::where('user_id', $user->id)->get();

        foreach ($invoices as $invoice) {
            Mail::to($user->email)->send(new InvoiceEmail($invoice, $eventDate));
        }

        return redirect()->back()->with('success', 'Invoice emails sent successfully');
    }

    public function revertStatus($id)
{
    // Find the invoice by ID
    $invoice = Invoice::findOrFail($id);

    // Perform logic to revert the status
    $invoice->status = 'Paid'; // Change status to whatever is appropriate

    // Save the changes
    $invoice->save();

    // Redirect back or wherever necessary
    return redirect()->back()->with('success', 'Invoice status reverted successfully.');
}
}