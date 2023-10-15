<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApproved
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->approved) {
       
            return redirect('/unapproved'); 
        }

        return $next($request);
    }
}
