<?php

namespace App\Services;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersServices
{
    public function count()
    {
        return User::where('role', 0)->count();
    }
    public function show($search)
    {
        if (empty($search)) {
            $user = User::where('role', 0)->paginate(10);
        } else {
            $user = User::where('role', 0)->where('name', 'LIKE', '%' . $search . '%')->paginate(10);
            $user->appends(request()->input())->links();
        }
        return $user;
    }
    public function create($list)
    {
        $currentDate = Carbon::now();
        $expirationDate = $currentDate->addDays(56);
        foreach ($list as $email) {
            $password = str_random(8);
            $hashedPassword = Hash::make($password);
            $user = User::create([
                'name' => $email,
                'email' => $email,
                'password' => $hashedPassword,
                'account_expiry_date' => $expirationDate,
            ]);
            Mail::to($email)->send(new PasswordMail($password));
        }
        return response()->json([
            'message' => 'Пользователи успешно зарегистрированы.',
        ], 200);
    }
    public function blocked($id)
    {
        $currentDate = Carbon::now();
        $user = User::find($id);
        $user->blocked = true;
        $user->account_expiry_date = $currentDate;
        $user->save();
        return response()->json([
            'message' => 'Пользователь заблокирован',
            'newDate' => $currentDate->format('Y-m-d H:i:s'),
        ], 200);
    }
    public function extend($id, $days)
    {
        $user = User::find($id);
        $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->account_expiry_date)->addDays($days);
        $user->account_expiry_date = $newDate;
        $user->blocked = false;
        $user->save();
        return response()->json([
            'message' => 'Срок доступа обновлен',
            'newDate' => $user->account_expiry_date->format('Y-m-d H:i:s'),
        ], 200);
    }
}
