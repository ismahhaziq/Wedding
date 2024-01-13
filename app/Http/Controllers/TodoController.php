<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use DB;
use Hash; 


class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos;

        return view('user/todos.index', compact('todos'));
    }

    public function create()
{
    return view('user/todos.create');
}

 public function store(Request $request)
{
    $request->validate([
        'text' => 'required|max:255',
        // Add validation rules for other fields
    ]);

    auth()->user()->todos()->create([
        'text' => $request->input('text'),
        'status' => $request->input('status', false), // Assuming you have a checkbox for the status in your form
        // Set other fields accordingly
    ]);

    return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
}

public function edit(Todo $todo)
{
    
    return view('user/todos.edit', compact('todo'));
}

public function update(Request $request, Todo $todo)
{
    $request->validate([
        'text' => 'required|max:255',
        // Add validation rules for other fields
    ]);

        // Update the checklist only if it belongs to the currently logged-in user
        if ($todo->user->id === auth()->user()->id) {
            $todo->update([
                'text' => $request->input('text'),
                'status' => $request->input('status', false), // Assuming you have a checkbox for the status in your form
                // Update other fields accordingly
            ]);

            return redirect()->route('todos.index')->with('success', 'Todos updated successfully');
        }

        return redirect()->route('todos.index')->with('error', 'You are not authorized to update this to-do');
    }

    public function destroy(Todo $todo)
    {
        // Delete the checklist only if it belongs to the currently logged-in user
        if ($todo->user->id === auth()->user()->id) {
            $todo->delete();

            return redirect()->route('todos.index')->with('success', 'To-Do deleted successfully');
        }

        return redirect()->route('todos.index')->with('error', 'You are not authorized to delete this to-do');
    }  
}
