<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use DB;
use Hash; 

class CateringController extends Controller
{
    public function index()
    {
        $user_type = auth()->user()->user_type;

        $caterings = Catering::all();

        return view($user_type .'.caterings.index', compact('caterings'));
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

    public function destroy(Catering $catering)
    {
        $catering->delete();
  
        return redirect()->route('caterings.index')
                         ->with('success','Catering deleted successfully');
    }  

    // Add other methods as needed (e.g., show, destroy)
}
