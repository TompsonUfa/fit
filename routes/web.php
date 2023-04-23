<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\PollitikaController;
use App\Http\Controllers\LoginController;
use App\Mail\User\PasswordMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;


Route::get('logs', [LogViewerController::class, 'index']);

Route::get('/', [MainController::class, 'show']);
Route::post('/', [BotController::class, 'post']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset-password', [LoginController::class, 'ResetPassword'])
    ->name('password.reset');

Route::post('/update-password', [LoginController::class, 'UpdatePassword'])
    ->name('password.update');


Route::get('/politika-konfidencialnosti', [PollitikaController::class, 'show']);

