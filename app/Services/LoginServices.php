<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;


class LoginServices
{
    public function isAuth()
    {
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view('auth.index');
        }
    }
}
