<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_READER = 0;
    const ROLE_ADMIN = 1;

    public static function getRoles()
    {
        return [
            self::ROLE_READER => "Читатель",
            self::ROLE_ADMIN => "Админ",
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'blocked_at',
        'access_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'access_at' => 'datetime',
        'blocked_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->role === User::ROLE_ADMIN ? true : false;
    }

    public function blocked(): bool
    {
        if (!$this->role) {
            $date = Carbon::now();
            if ($this->blocked_at) {
                return true;
            }
            if ($this->access_at <= $date) {
                return true;
            }
        }
        return false;
    }
}
