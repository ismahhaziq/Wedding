<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered; // Import the Registered event
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth; // Add this line to import the Auth facade
use App\Models\User; // Add this line to import the User model

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            // Check if the user denied access
            if ($request->has('error')) {
                return redirect()->route('login')->with('error', 'Access to Google account was denied.');
            }

            // Retrieve user details from Google
            $googleUser = Socialite::driver('google')->user();

            // Check if the user exists in your database
            $user = User::where('email', $googleUser->email)->first();

            // If the user doesn't exist, create a new user
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => null, // No password since it's a Google sign-in
                    'phone_number' => null, // You might want to prompt the user to provide this later
                    'user_type' => 'user',
                ]);

                // Trigger the Registered event for the new user
                event(new Registered($user));
            }

            // Log in the user
            Auth::login($user);

                        // Redirect the user to the dashboard based on their user type
            return redirect()->route('dashboards.index', ['user_type' => $user->user_type]);

        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->route('login')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
