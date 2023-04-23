<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\PollitikaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DirectionsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PostersController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'show']);
Route::post('/', [BotController::class, 'post']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/politika-konfidencialnosti', [PollitikaController::class, 'show']);

Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return redirect('/admin/directions');
    });

    Route::get('/directions', [DirectionsController::class, 'show'])->name('directions');
    Route::post('/directions', [DirectionsController::class, 'edit']);

    Route::get('/courses', [CoursesController::class, 'show'])->name('courses');
    Route::post('/courses', [CoursesController::class, 'delete']);

    Route::get('/courses/add', [CoursesController::class, 'showAddCourse']);
    Route::post('/courses/add', [CoursesController::class, 'addCourse']);

    Route::get('/courses/edit/{id}', [CoursesController::class, 'showEditCourse']);
    Route::post('/courses/edit/{id}', [CoursesController::class, 'editCourse']);

    Route::get('/posters', [PostersController::class, 'show'])->name('posters');
    Route::post('/posters', [PostersController::class, 'delete']);

    Route::get('/posters/add', [PostersController::class, 'showAddPoster']);
    Route::post('/posters/add', [PostersController::class, 'addPoster']);

    Route::get('/posters/edit/{id}', [PostersController::class, 'showEditPoster']);
    Route::post('/posters/edit/{id}', [PostersController::class, 'editPoster']);

    Route::get('/teachers', [TeachersController::class, 'show'])->name('teachers');
    Route::post('/teachers', [TeachersController::class, 'delete']);

    Route::get('/teachers/add', [TeachersController::class, 'showAddTeacher']);
    Route::post('/teachers/add', [TeachersController::class, 'addTeacher']);

    Route::get('/teachers/edit/{id}', [TeachersController::class, 'showEditTeacher']);
    Route::post('/teachers/edit/{id}', [TeachersController::class, 'editTeacher']);

    Route::get('/employment', [EmploymentController::class, 'show'])->name('employment');
    Route::post('/employment', [EmploymentController::class, 'delete']);

    Route::get('/employment/add', [EmploymentController::class, 'showAddEmployment']);
    Route::post('/employment/add', [EmploymentController::class, 'addEmployment']);

    Route::get('/employment/edit/{id}', [EmploymentController::class, 'showEditEmployment']);
    Route::post('/employment/edit/{id}', [EmploymentController::class, 'editEmployment']);

    Route::get('/users', [UsersController::class, 'show'])->name('users');

    Route::get('/users/add', [UsersController::class, 'showAddUsers']);
    Route::post('/users/add', [UsersController::class, 'add']);
    Route::post('/users/blocked', [UsersController::class, 'blocked']);
    Route::post('/users/extend', [UsersController::class, 'extend']);
});
