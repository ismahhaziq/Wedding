<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makeup;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Date;

class MakeupController extends Controller
{
    public function index()
    {

        $makeups = Makeup::all();

        $user_type = auth()->user()->user_type;

        return view($user_type . '.makeups.index', compact('makeups'));
    }

    public function create()
    {
        return view('admin/makeups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Assuming 'image' is a file input in your form
        ]);

        // If you have an 'image' field in your form, you might want to handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/makeups', 'public');
        } else {
            $imagePath = 'images/users/default_user_image.jpg';
        }

        Makeup::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('makeups.index')
            ->with('success', 'Makeup created successfully');
    }

    public function edit(Makeup $makeup)
    {
        return view('admin/makeups.edit', compact('makeup'));
    }

    public function update(Request $request, Makeup $makeup)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Assuming 'image' is a file input in your form
        ]);

        $makeup->update($request->except('image')); // Save makeup without image first

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/makeups', 'public');
            $makeup->update(['image' => $imagePath]); // Update the makeup with the image path
        }

        return redirect()->route('makeups.index')
            ->with('success', 'Makeup updated successfully');
    }

    public function addToInvoice(Makeup $makeup)
    {
        // Check if an invoice exists for the user
        $invoice = Invoice::where('user_id', auth()->user()->id)->first();

        // If no invoice exists, create a new one
        if (!$invoice) {
            $invoice = Invoice::create([
                'user_id' => auth()->user()->id,
                // Add any additional fields you want to save in Invoice
            ]);
        }

        // Create a new InvoiceItem record with makeup details and link it to the invoice
        $invoiceItem = InvoiceItem::create([
            'title' => $makeup->title,
            'price' => $makeup->price,
            'invoice_id' => $invoice->id,
            // Check if the user has a date, otherwise set date_id to null
            'date_id' => auth()->user()->date ? auth()->user()->date->id : null,
            // Add any additional fields you want to save in InvoiceItem
        ]);

        return redirect()->route('makeups.index')
            ->with('success', 'Makeup added to invoice successfully');
    }

    public function destroy(Makeup $makeup)
    {
        $makeup->delete();

        return redirect()->route('makeups.index')
            ->with('success', 'Makeup deleted successfully');
    }

    public function dress(){
        return view('user/makeups.dress');
    }
}
