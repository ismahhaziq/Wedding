<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Date;
use DB;
use Hash; 

class CateringController extends Controller
{
    public function index(Request $request)
    {
        $user_type = auth()->user()->user_type;

        $caterings = Catering::all();

        $totalGuests = $request->input('total_guests');
         $totalAmount = $totalGuests * $caterings->first()->price;

        return view($user_type .'.caterings.index', compact('caterings', 'totalGuests', 'totalAmount'));
    }

    public function welcome()
    {
        $caterings = Catering::all();

        return view('welcome', compact('caterings'));
    }


    public function create()
    {
        return view('admin/caterings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Catering::create($request->all());

        return redirect()->route('caterings.index')->with('success', 'Catering created successfully.');
    }

    public function edit(Catering $catering)
    {
        return view('admin/caterings.edit', compact('catering'));
    }

    public function update(Request $request, Catering $catering)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $catering->update($request->all());

        return redirect()->route('caterings.index')->with('success', 'Catering updated successfully.');
    }

    public function confirmInvoice(Request $request)
    {
        $totalGuests = $request->input('total_guests');
        $totalAmount = $request->input('total_amount');
        $selectedPackageId = $request->input('selected_package');
        $selectedPackageName = Catering::find($selectedPackageId)->title;

        // Find existing invoice for the user
        $existingInvoice = Invoice::where('user_id', auth()->user()->id)->first();

        if ($existingInvoice) {

            // Find the existing InvoiceItem associated with the selected package
            $existingInvoiceItem = $existingInvoice->items()->where('selected_package_id', $selectedPackageId)->first();

            if ($existingInvoiceItem) {
                // Update the existing InvoiceItem for the selected package
                $existingInvoiceItem->update([
                    'total_guests' => $totalGuests,
                    'total_amount' => $totalAmount,
                    'title' => $selectedPackageName,
                ]);

                $confirmationMessage = "Invoice item updated: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
            } else {
                // Check if there is an existing InvoiceItem for a different selected package
                $existingInvoiceItemDifferentPackage = $existingInvoice->items()->where('selected_package_id', '<>', $selectedPackageId)->first();

                if ($existingInvoiceItemDifferentPackage) {
                    // Update the existing InvoiceItem associated with a different package
                    $existingInvoiceItemDifferentPackage->update([
                        'total_guests' => $totalGuests,
                        'total_amount' => $totalAmount,
                        'selected_package_id' => $selectedPackageId, // Update the selected_package_id
                        'title' => $selectedPackageName,
                    ]);

                    $confirmationMessage = "Invoice item updated with a different package: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
                } else {
                    // Create a new InvoiceItem for the selected package
                    $existingInvoice->items()->create([
                        'total_guests' => $totalGuests,
                        'total_amount' => $totalAmount,
                        'selected_package_id' => $selectedPackageId,
                        'title' => $selectedPackageName,
                    ]);

                    $confirmationMessage = "New invoice item created: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
                }
            }
        } else {
            // Create new invoice
            $newInvoice = Invoice::create([
                'user_id' => auth()->user()->id,
                // Check if the user has a date, otherwise set date_id to null
                'date_id' => auth()->user()->date ? auth()->user()->date->id : null,
            ]);

            // Create a new InvoiceItem for the selected package
            $newInvoice->items()->create([
                'total_guests' => $totalGuests,
                'total_amount' => $totalAmount,
                'selected_package_id' => $selectedPackageId,
                'title' => $selectedPackageName,
            ]);

            $confirmationMessage = "New invoice item created: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
        }

        return response()->json(['message' => $confirmationMessage]);
    }



    public function destroy(Catering $catering)
    {
        $catering->delete();
  
        return redirect()->route('caterings.index')
                         ->with('success','Catering deleted successfully');
    }  

    // Add other methods as needed (e.g., show, destroy)
}
