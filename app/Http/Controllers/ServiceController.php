<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use DB;
use Hash; 

class ServiceController extends Controller
{
    public function index()
    {
        $user_type = auth()->user()->user_type;

        $services = Service::all();

        return view($user_type .'.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create'); // You may adjust the view folder based on your folder structure
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1', // Ensure status is either 0 or 1
            'image' => ['nullable','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Assuming 'image' is a file input in your form
        ]);

        // If you have an 'image' field in your form, you might want to handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/services', 'public');
        } else {
            $imagePath = 'images/users/default_user_image.jpg';
        }

        Service::create([
            'title' => $request->title,
            'price' => $request->price,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Add-On created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service')); // You may adjust the view folder based on your folder structure
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1', // Ensure status is either 0 or 1
            'image' => ['nullable','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Assuming 'image' is a file input in your form           
        ]);

        $service->update($request->except('image'));

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/services', 'public');
        $service->update(['image' => $imagePath]); // Update the service with the image path
        }

        return redirect()->route('services.index')->with('success', 'Add-On updated successfully.');
    }

    public function addToInvoice(Service $service)
    {
        // Check if an invoice exists for the user
        $invoice = Invoice::where('user_id', auth()->user()->id)->first();

        // If no invoice exists, create a new one
        if (!$invoice) {
            $invoice = Invoice::create([
                'user_id' => auth()->user()->id,
                // Check if the user has a date, otherwise set date_id to null
                'date_id' => auth()->user()->date ? auth()->user()->date->id : null,
                // Add any additional fields you want to save in Invoice
            ]);
        }

        // Create a new InvoiceItem record with service details and link it to the invoice
        $invoiceItem = InvoiceItem::create([
            'title' => $service->title,
            'price' => $service->price,
            'invoice_id' => $invoice->id,
            // Add any additional fields you want to save in InvoiceItem
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service added to invoice successfully');
    }


    public function destroy(Service $service)
    {
        $service->delete();
  
        return redirect()->route('services.index')
                         ->with('success','Add-On deleted successfully');
    }

    // Add other methods as needed (e.g., show, destroy)
}
