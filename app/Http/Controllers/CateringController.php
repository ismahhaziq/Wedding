<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use App\Models\Invoice;
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

    // Check if there's an existing invoice for the user
    $existingInvoice = Invoice::where('user_id', auth()->user()->id)->first();

    if ($existingInvoice) {
        // Update the existing invoice
        $existingInvoice->update([
            'total_guests' => $totalGuests,
            'total_amount' => $totalAmount,
            'selected_package_id' => $selectedPackageId,
            'title' => $selectedPackageName,
        ]);

        $confirmationMessage = "Invoice updated: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
    } else {
        // Create a new invoice
        Invoice::create([
            'user_id' => auth()->user()->id,
            'total_guests' => $totalGuests,
            'total_amount' => $totalAmount,
            'selected_package_id' => $selectedPackageId,
            'title' => $selectedPackageName,
            
        ]);

        $confirmationMessage = "Invoice created: Total Guests: $totalGuests, Total Amount: $totalAmount, Selected Package ID: $selectedPackageId, Selected Package Name: $selectedPackageName";
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
