<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alumni;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Check if the first name is already in the alumni list
        $isAlumni = Alumni::where('first_name', $request->name)->exists();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create a user with 'approved' set based on alumni list check
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'approved' => $isAlumni, // Automatically set to true if in alumni list
        ]);

        // Trigger the Registered event
        event(new Registered($user));

        // If the user is approved (in alumni list), log them in
        if ($isAlumni) {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }

        // If not approved, redirect the user to a message indicating that their registration is pending approval
        return view('auth.pending-approval'); // Create this view
    }
}
