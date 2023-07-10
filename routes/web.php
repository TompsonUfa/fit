<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\PollitikaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\PageCoursesController;
use App\Http\Controllers\PageCourseController;

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

Route::get('block', [UsersController::class, 'block'])->name('block');

Route::get('logs', [LogViewerController::class, 'index']);

Route::post('/', [BotController::class, 'post']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/end-registration', [LoginController::class, 'RegistrationEnd'])
    ->name('registration.end');

Route::post('/update-registration', [LoginController::class, 'RegistrationUpdate'])
    ->name('registration.update');

Route::get('/password-reset-get-email', [LoginController::class, 'PasswordResetGetEmail'])
    ->name('password.get_email');

Route::post('/password-reset-get-email', [LoginController::class, 'PasswordResetGetEmail_'])
    ->name('password.get_email_');

Route::get('/password-reset-get-email-ok', [LoginController::class, 'PasswordResetGetEmailOk'])
    ->name('password.get_email_ok');

Route::get('/password-reset', [LoginController::class, 'PasswordReset'])
    ->name('password.reset');

Route::post('/password-update', [LoginController::class, 'PasswordUpdate'])
    ->name('password.update');


Route::get('/politika-konfidencialnosti', [PollitikaController::class, 'show']);

Route::get('/teachers/{name}', [TeacherController::class, 'show']);

Route::get('/courses/{id}', [PageCourseController::class, 'show']);

Route::get('/city', [CitiesController::class, 'getCookie']);
Route::get('/{fr?}', [MainController::class, 'show']);

Route::post('/city', [CitiesController::class, 'createCookie']);