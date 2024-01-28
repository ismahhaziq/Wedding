<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\Catering;
use App\Models\Date;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_type = auth()->user()->user_type;

        $invoices = Invoice::where('user_id', $user->id)->get();

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

}
