<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginServices;

class LoginController extends Controller
{
    public function show(LoginServices $service)
    {
        return $service->isAuth();
    }
    public function login(LoginRequest $request)
    {
        $user = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'data' => 'Данные не верны',
        ]);
    }
}
