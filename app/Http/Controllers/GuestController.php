<?php

namespace App\Http\Controllers;
use DB;
use Hash; 
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\User;

class GuestController extends Controller
{
    public function index()
    {
            $guests = auth()->user()->guests;
        
            return view('user/guests.index',compact('guests'));
                                           // ^^^^^^^^^^
                                        //ikut declaration atas tu yang $halls
    }

    public function create()
    {
        return view('user/guests.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:guests,email',
        'relatives' => 'required|numeric', // Add any additional validation rules here
    ]);

    auth()->user()->guests()->create([
        //         ^^^^^^^
        //       mai dari User model
        'name' => $request->input('name'),
        'email'  => $request->input('email'),
        'relatives'  => $request->input('relatives'),
    ]);

    return redirect()->route('guests.index')->with('success', 'Guest added successfully');
}

        public function edit(Guest $guest)
    {
        return view('user/guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:guests,email,'  . $guest->id,
            ]);
            
        if ($guest->user->id === auth()->user()->id) {
            $guest->update([
                'name' => $request->input('name'),
                'email'  => $request->input('email'),
                'relatives'  => $request->input('relatives'),
            ]);

            return redirect()->route('guests.index')->with('success', 'Guest updated successfully');
        }
        return redirect()->route('guest.index')->with('error', 'You are not authorized to update this guest');
}

    public function destroy(Date $date)
    {
        // Ensure the date belongs to the authenticated user
        if ($date->user->id === auth()->user()->id) {
            $date->delete();

            return redirect()->route('dates.index')->with('success', 'Date deleted successfully');
        }

        return redirect()->route('dates.index')->with('error', 'You are not authorized to delete this date');
    }
}
