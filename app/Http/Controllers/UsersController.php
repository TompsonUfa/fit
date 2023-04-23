<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsersServices;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function show(Request $request, UsersServices $service)
    {
        $search = $request->get('search');
        $total = $service->count();
        $users = $service->show($search);
        return view('admin.users.index', ['users' => $users, 'total' => $total]);
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
        $emailList = $request->emailList;
        return $service->create($emailList);
    }
    public function blocked(Request $request, UsersServices $service)
    {
        $userId = $request->id;
        return $service->blocked($userId);
    }
    public function extend(Request $request, UsersServices $service)
    {
        $newAccess = $request->newAccess;
        $userId = $newAccess['userId'];
        $addDays = $newAccess['addDays'];
        return $service->extend($userId, $addDays);
    }
}
