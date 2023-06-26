<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Login' => 'required|unique:users',
            'Password' => 'required',
            'Name' => 'required',
            'Surname' => 'required',
            'DateOfBirth' => 'nullable|date',
        ]);

        // Create a new user
        $user = User::create([
            'Login' => $request->input('Login'),
            'Password' => Hash::make($request->input('Password')),
            'Name' => $request->input('Name'),
            'Surname' => $request->input('Surname'),
            'DateOfBirth' => $request->input('DateOfBirth'),
            'DateOfRegistration' => now(),
        ]);

        // Redirect to the admin panel
        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Login' => 'required',
            'Password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('Login', 'Password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }

    public function dashboard()
    {
        // Get the list of events
        $events = Event::all();

        // Get the user information
        $user = Auth::user();

        // Render the admin dashboard view
        return view('admin.dashboard', compact('events', 'user'));
    }

    public function userDetails($userId)
    {
        // Find the user
        $user = User::findOrFail($userId);

        // Render the user details view
        return view('admin.user_details', compact('user'));
    }
}
