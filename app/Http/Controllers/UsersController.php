<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsersServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function show(Request $request, UsersServices $service)
    {
        $search = $request->get('search');
        $total = $service->count();
        $users = $service->list($search);
        return view('admin.users.index', [
            'users' => $users,
            'total' => $total
        ]);
    }

    public function block()
    {
        Auth::logout();
        return redirect()->route('login')->withErrors(['errors' => 'Аккаунт заморожен.']);
    }

    public function showAddUsers()
    {
        return view('admin.users.add.index');
    }

    public function add(Request $request, UsersServices $service)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'emailList' => 'required|array',
                'emailList.*' => 'required|email|unique:users,email',
            ],
            [
                'emailList.*.unique' => 'Значение поля :input уже существует.',
                'emailList.*.email' => 'Поле :input должно быть действительным электронным адресом.',
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        $emailList = $request->get('emailList');
        $service->createByListOfEmails($emailList);
        return response()->json([
            'message' => 'Пользователи успешно зарегистрированы.',
        ], 200);
    }

    public function blocked(Request $request, UsersServices $service)
    {
        $userId = $request->id;
        $service->blocked($userId);
        return response()->json([
            'message' => 'Пользователь заблокирован',
        ]);
    }

    public function extend(Request $request, UsersServices $service)
    {
        $newAccess = $request->newAccess;
        $userId = $newAccess['userId'];
        $addDays = $newAccess['addDays'];
        $user = $service->extend($userId, $addDays);
        return response()->json([
            'message' => 'Срок доступа обновлен',
            'newDate' => $user->access_at->format('Y-m-d H:i:s'),
        ]);
    }
}
