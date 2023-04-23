<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class SendRegistrationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $user_id = 0;

    /**
     * Create a new job instance.
     *
     * @param $user_id
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->user_id);
        $token = Password::createToken($user);

        $url = route('password.reset', ['token' => $token, 'email' => $user->email]);

        Mail::to($user->email)
            ->send(new PasswordMail($url));
    }
}
