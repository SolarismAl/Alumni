<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

     public function store(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         if (Auth::attempt($request->only('email', 'password'))) {
             // Check if the user is approved
             if (Auth::user()->approved) {
                 return redirect()->intended('/dashboard'); // Redirect to the dashboard
             } else {
                 Auth::logout(); // Log out the user
                 return view('auth.pending-approval'); // Redirect to the "auth.pending-approval" view
             }
         }
 
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
     }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
