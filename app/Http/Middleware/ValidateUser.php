<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class ValidateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->blocked()) {
            return redirect()->route('block');
        }
        return $next($request);
    }
}
