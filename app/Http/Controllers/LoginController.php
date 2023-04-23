<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginServices;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin');
            } else {
                //todo
                return redirect('/LC');
            }
        } else {
            return view('auth.index');
        }
    }

    public function login(LoginRequest $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin');
            } else {
                //todo
                return redirect('/LC');
            }
        }

        return back()->withErrors([
            'data' => 'Данные не верны',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
