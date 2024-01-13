<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\Catering;

class InvoiceController extends Controller
{
public function addToInvoice($serviceId) {
    // Retrieve the service based on the provided $serviceId
    $service = Service::find($serviceId);

    if (!$service) {
        // Handle the case where the service is not found, for example, redirecting with an error message
        return redirect()->route('services.index')->with('error', 'Service not found');
    }

    // Create a new invoice or retrieve an existing one (adjust logic as needed)
    $invoice = Invoice::create();

    // Add the service to the invoice
    $invoice->services()->attach($service);

    // You may redirect back to the services page or wherever you need
    return redirect()->route('services.index')->with('success', 'Service added to invoice successfully');
}

}
