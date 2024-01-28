<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash; 
use App\Rules\MatchPassword;


class UserController extends Controller
{
    public function index() {
    
    $users = User::all();

    $totalUsers = User::count();

   // dd($users);

    return view('admin/users.index', compact('users', 'totalUsers'));
    } 

    public function create(User $user)
    {
        return view('admin/users.create', compact('user'));
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required'], // Assuming 'user_type' is a field in your form
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Assuming 'image' is a file input in your form
        ]);

        // If you have an 'image' field in your form, you might want to handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
        } else {
            $imagePath = 'images/users/default_user_image.jpg';
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Make sure to hash the password
            'phone_number' => $request->phone_number,
            'user_type' => $request->user_type,
            'image' => $imagePath,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function profile(User $user)
    {
        return view('user/users.profile', compact('user'));
        //persoalan, kenapa takleh guna user's' ????? Kenapa kalau tambah 's', tak keluar data???
        //Sebabnya adalah laravel detect singular or plural. Ni memang built in dia based on english vocab 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('admin/users.edit', compact('user'));
        //still sama cam atas, kenapa takleh guna user's' ????? Kenapa kalau tambah 's', tak keluar data???
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'user_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this line for image validation
        ]);
        
        $user -> update($request->except('image')); // Save user without image first

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/users', 'public');
        $user->update(['image' => $imagePath]); // Update the user with the image path
        }
        
    
        return redirect()->route('users.index')
                         ->with('success','User updated successfully');
    }

        public function show_profile(User $user)
    {
        
        return view('users.profile', compact('user'));
        //still sama cam atas, kenapa takleh guna user's' ????? Kenapa kalau tambah 's', tak keluar data???
    }

        public function edit_profile(User $user)
    {
        
        return view('user/users.edit_profile', compact('user'));
        //still sama cam atas, kenapa takleh guna user's' ????? Kenapa kalau tambah 's', tak keluar data???
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this line for image validation
        ]);
        
        $user -> update($request->except('image')); // Save user without image first

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/users', 'public');
        $user->update(['image' => $imagePath]); // Update the user with the image path
        }
        
    
        return redirect()->route('users.profile')
                         ->with('success','User updated successfully');
    }


    public function alter(User $user)
    {
        
        return view('admin/users.change', compact('user'));

    }

    public function change(Request $request, User $user)
    {   
        
        $request->validate([
            'old_password' => ['required', new MatchPassword($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);
        
        return redirect()->route('users.index')
                         ->with('success', 'Password changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('users.index')
                         ->with('success','User deleted successfully');
    }

public function deleteSelected(Request $request)
    {
        $selectedUserIds = $request->input('selectedUsers', []);

        if (empty($selectedUserIds)) {
            return redirect()->route('users.index')->with('error', 'No users selected for deletion.');
        }

        try {
            User::whereIn('id', $selectedUserIds)->delete();
            return redirect()->route('users.index')->with('success', 'Selected users have been deleted successfully.');
        } catch (\Exception $e) {
            // Handle the exception as needed (e.g., log the error)
            return redirect()->route('users.index')->with('error', 'Error deleting selected admin/users.');
        }
    }
}
