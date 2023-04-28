<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Jobs\SendRegistrationEmailJob;
use App\Jobs\SendResetPassEmailJob;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginServices;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('private');
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

        if (Auth::attempt($user, $request->get('remember', false))) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin');
            } else {
                //todo
                return redirect()->route('private');
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

    public function PasswordResetGetEmail()
    {
        return view('auth.get_email');
    }

    public function PasswordResetGetEmail_(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ],
        );
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::whereEmail($request->get('email'))
            ->first();

        if (!empty($user)) {
            SendResetPassEmailJob::dispatch($user->id)
                ->onQueue('email');
        }

        return redirect()
            ->route('password.get_email_ok');
    }

    public function PasswordResetGetEmailOk()
    {
        return view('auth.get_email_ok');
    }

    public function PasswordReset(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');
        return view('auth.password_reset', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function PasswordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password)  {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function RegistrationEnd(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');
        return view('auth.registration_end', [
            'token' => $token,
            'email' => $email,
        ]);
    }


    public function RegistrationUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $name = $request->get('name');

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) use ($name) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->name = $name;
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
