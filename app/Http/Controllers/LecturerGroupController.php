<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class LecturerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*   ini declaration ->*/ $groups = Group::all();
                                         //^^^^^^
                             //  ikut nama Model, jangan ikut nama file controller

           // dd($students);
        
            return view('groups.index',compact('groups'));
                                           //    ^^^^^^^^^^
                                                //ikut declaration la
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'part' => 'required',
              
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')
                         ->with('success','Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required',
            'part' => 'required',  
        ]);
  
        $group->update($request->all());
  
        return redirect()->route('groups.index')
                         ->with('success','group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
  
        return redirect()->route('groups.index')
                         ->with('success','group deleted successfully');
    }
}
