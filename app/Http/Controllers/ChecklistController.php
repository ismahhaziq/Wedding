<?php

namespace App\Http\Controllers;
use App\Models\Checklist;
use DB;
use Hash; 
use Illuminate\Http\Request;
use App\Models\User;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = auth()->user()->checklists;

        return view('user.checklists.index', compact('checklists'));
    }

    public function create()
    {
        return view('user/checklists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_type' => 'required|in:list,description',
            'content' => 'required|string',
        ]);

        auth()->user()->checklists()->create([
            'title' => $request->input('title'),
            'content_type' => $request->input('content_type'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('checklists.index')->with('success', 'Checklist created successfully!');
    }

     public function edit(Checklist $checklist)
    {
        return view('user/checklists.edit', compact('checklist'));
    }

    public function update(Request $request, Checklist $checklist)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_type' => 'required|in:list,description',
            'content' => 'required|string',
        ]);
        // Update the checklist only if it belongs to the currently logged-in user
        if ($checklist->user->id === auth()->user()->id) {
            $checklist->update([
                'title' => $request->input('title'),
                'content_type' => $request->input('content_type'),
                'content' => $request->input('content'),
            ]);

            return redirect()->route('checklists.index')->with('success', 'Checklist updated successfully');
        }

        return redirect()->route('checklists.index')->with('error', 'You are not authorized to update this checklist');
    }


    public function destroy(Checklist $checklist)
    {
        // Delete the checklist only if it belongs to the currently logged-in user
        if ($checklist->user->id === auth()->user()->id) {
            $checklist->delete();

            return redirect()->route('checklists.index')->with('success', 'Checklist deleted successfully');
        }

        return redirect()->route('checklists.index')->with('error', 'You are not authorized to delete this checklist');
    }   
}
