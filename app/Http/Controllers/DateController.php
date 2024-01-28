<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\User;
use Carbon\Carbon;

class DateController extends Controller
{
    public function index()
    {
        $users = Date::with('user')
        ->get();  

        // Get all dates from the database
        $allDates = Date::pluck('date')->toArray();

        // Get the disabled dates for the authenticated user
        // Check if the authenticated user has dates
    $userDates = auth()->user()->dates ? auth()->user()->dates->pluck('date')->toArray() : [];

        // Combine all dates and remove duplicates
        $disabledDates = array_unique(array_merge($allDates, $userDates));

        $user_type = auth()->user()->user_type;

         // Pass an array to the view, even if it's empty
    return view($user_type . '.dates.index', ['disabledDates' => $disabledDates ?? []], compact('users'));
    }

    public function show(Date $date)
    {
        $user_type = auth()->user()->user_type;

        return view($user_type .'.dates.index', compact('date'));
    }

public function store(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'date' => ['required', 'date_format:d-m-Y', 'unique:dates,date,'],
    ]);

    $formattedDate = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('d-m-Y');

    // Check if the user already has a date
    if ($user->dates()->count() > 0) {
        return redirect()->route('dates.index')->with('error', 'You can only choose one date.');
    }

    try {
        $user->dates()->create(['date' => $formattedDate]);
        return redirect()->route('dates.index')->with('success', 'Date added successfully');
    } catch (\Exception $e) {
        // Log the exception
        \Log::error('Error storing date: ' . $e->getMessage());

        // Redirect with an error message
        return redirect()->route('dates.index')->with('error', 'Error adding date. Please try again.');
    }
}



    public function update(Request $request, Date $date)
    {
        $request->validate([
            'date' => ['required', 'date_format:d-m-Y', 'unique:dates,date,' . $date->id . ',id,user_id,' . auth()->user()->id],
        ]);

        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('d-m-Y');

        if ($date->user->id === auth()->user()->id) {
            $date->update([
                'date' => $formattedDate,
            ]);

            return redirect()->route('dates.index')->with('success', 'Date updated successfully');
        }

        return redirect()->route('dates.index')->with('error', 'You are not authorized to update this date');
    }

    public function destroy(Date $date)
    {
        $date->delete();

        return redirect()->route('dates.index')->with('success', 'Date deleted successfully');
    }
}