<?php

namespace App\Services;

use App\Jobs\SendRegistrationEmailJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersServices
{
    public function count()
    {
        return User::where('role', 0)->count();
    }

    public function list($search = '')
    {
        if (empty($search)) {
            $user = User::where('role', 0)
                ->paginate(10);
        } else {
            $user = User::where('role', 0)
                ->where('name', 'LIKE', '%' . $search . '%')
                ->paginate(10);
        }
        return $user;
    }

    public function createByListOfEmails($list)
    {
        foreach ($list as $email) {
            $this->createByEmail($email);
        }
    }

    public function createByEmail($email)
    {
        $currentDate = Carbon::now();
        $currentDate->setSeconds(59);
        $currentDate->setMinutes(59);
        $currentDate->setHours(23);
        $access_at = $currentDate->addDays(env('ACCESS_TO_COURSES_DAYS'));

        $user = User::whereEmail($email)->first();
        if (empty($user)) {
            $user = new User();
            $user->name = $email;
            $user->email = $email;
            $user->password = Hash::make(Str::uuid());
            $user->access_at = $access_at;
            $user->save();
        }
        SendRegistrationEmailJob::dispatch($user->id)
            ->onQueue('email');
    }

    public function blocked($id)
    {
        $currentDate = Carbon::now();
        $user = User::find($id);
        $user->blocked_at = $currentDate;
        $user->save();
        return $user;
    }

    public function extend($id, $days)
    {
        $user = User::find($id);
        $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->access_at)
            ->addDays($days);
        $user->access_at = $newDate;
        $user->blocked_at = null;
        $user->save();
        return $user;
    }

}
