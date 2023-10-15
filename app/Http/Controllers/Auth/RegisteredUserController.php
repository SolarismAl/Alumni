<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Create a user with 'approved' set to false
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'approved' => false, // User is not approved yet
    ]);

    // Trigger the Registered event
    event(new Registered($user));

    // Check if the user is approved
    if (!$user->approved) {
        // Automatically log out the user
        Auth::logout();

        // Redirect the user to a message indicating that their registration is pending approval
        return view('auth.pending-approval'); // Create this view
    }

    // If the user is approved, log them in
    Auth::login($user);

    // Redirect the user to the dashboard or another page
    return redirect(RouteServiceProvider::HOME);
}

}
