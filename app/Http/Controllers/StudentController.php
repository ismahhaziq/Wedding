<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Hash; 
use App\Rules\MatchPassword;

class StudentController extends Controller
{
    public function index() {
    
    $students = User::all();

   // dd($students);

    return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','min:8', 'confirmed'],
            'age' => 'required',
            'phone_number' =>  ['required', 'unique:users'],
        ]);

        /*DB::table('users')->insert([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
          //  'group_id' => $request->group_id,
        ]);*/
        //atau guna cara ni kalau takmau letak use DB kat atas
        User::create($request->all());
        //dengan guna cara ni, akan guna semua data dalam table. so created_time pun akan dapat data bila akaun di create
   
        return redirect()->route('students.index')
                         ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        return view('students.show', compact('student'));
        //persoalan, kenapa takleh guna student's' ????? Kenapa kalau tambah 's', tak keluar data???
        //Sebabnya adalah laravel detect singular or plural. Ni memang built in dia based on english vocab 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        
        return view('students.edit', compact('student'));
        //still sama cam atas, kenapa takleh guna student's' ????? Kenapa kalau tambah 's', tak keluar data???
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
        ]);
    
        // Check if a new password is provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed', new MatchPassword($student->id)],
            ]);
    
            // Update the password
            $student->password = Hash::make($request->password);
        }
    
        // Update other fields
        $student->update($request->except('password'));
    
        return redirect()->route('students.index')
                         ->with('success','Student updated successfully');
    }

    public function alter(User $student)
    {
        
        return view('students.change', compact('student'));

    }

    public function change(Request $request, User $student)
    {   
        
        $request->validate([
            'old_password' => ['required', new MatchPassword($student->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // Update the user's password
        $student->update([
            'password' => Hash::make($request->input('password')),
        ]);
        
        return redirect()->route('students.index')
                         ->with('success', 'Password changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();
  
        return redirect()->route('students.index')
                         ->with('success','Student deleted successfully');
    }
}
