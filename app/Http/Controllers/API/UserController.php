<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

        // Return the response
        return response()->json([
            'error' => null,
            'result' => $user,
        ]);
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
            $user = Auth::user();
            return response()->json([
                'error' => null,
                'result' => [
                    'id' => $user->id,
                    'first_name' => $user->Name,
                    'last_name' => $user->Surname,
                ],
            ]);
        } else {
            return response()->json([
                'error' => 'Invalid credentials',
                'result' => null,
            ]);
        }
    }

    public function createEvent(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Title' => 'required',
            'Text' => 'required',
        ]);

        // Create a new event
        $event = Event::create([
            'Title' => $request->input('Title'),
            'Text' => $request->input('Text'),
            'DateOfCreation' => now(),
            'Creator' => Auth::id(),
            'Participants' => [],
        ]);

        // Return the response
        return response()->json([
            'error' => null,
            'result' => $event,
        ]);
    }

    public function getEvents()
    {
        // Get the list of events
        $events = Event::all();

        // Return the response
        return response()->json([
            'error' => null,
            'result' => $events,
        ]);
    }

    public function participateEvent($eventId)
    {
        // Find the event
        $event = Event::findOrFail($eventId);

        // Add the current user as a participant
        $event->Participants()->attach(Auth::id());

        // Return the response
        return response()->json([
            'error' => null,
            'result' => 'Participation successful',
        ]);
    }

    public function cancelParticipation($eventId)
    {
        // Find the event
        $event = Event::findOrFail($eventId);

        // Remove the current user as a participant
        $event->Participants()->detach(Auth::id());

        // Return the response
        return response()->json([
            'error' => null,
            'result' => 'Participation canceled',
        ]);
    }

    public function removeEvent($eventId)
    {
        // Find the event
        $event = Event::findOrFail($eventId);

        // Check if the current user is the creator of the event
        if ($event->Creator == Auth::id()) {
            // Delete the event
            $event->delete();

            // Return the response
            return response()->json([
                'error' => null,
                'result' => 'Event removed',
            ]);
        } else {
            return response()->json([
                'error' => 'Unauthorized',
                'result' => null,
            ], 401);
        }
    }
}
