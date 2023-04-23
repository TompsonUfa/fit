<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginServices;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

    public function ResetPassword(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

//        $pr = PasswordReset::whereToken($request->get('token'))
//            ->first();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
            }
        );

//        $pr->save();

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
