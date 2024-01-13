<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Catering;
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
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
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
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
  
        return redirect()->route('caterings.index')
                         ->with('success','Catering deleted successfully');
    } 
    
    // Add other methods as needed (e.g., show, destroy)
}
