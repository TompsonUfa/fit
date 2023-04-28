<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectionsController;
use App\Http\Controllers\PageCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostersController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MediaController;

Route::get('/', function () {
    return redirect('/admin/directions');
})->name('admin');

Route::get('/directions', [DirectionsController::class, 'show'])->name('directions');
Route::post('/directions', [DirectionsController::class, 'edit']);

Route::get('/page_courses', [PageCourseController::class, 'show'])->name('courses');
Route::post('/page_courses', [PageCourseController::class, 'delete']);
Route::get('/page_courses/add', [PageCourseController::class, 'showAddCourse']);
Route::post('/page_courses/add', [PageCourseController::class, 'addCourse']);
Route::get('/page_courses/edit/{id}', [PageCourseController::class, 'showEditCourse']);
Route::post('/page_courses/edit/{id}', [PageCourseController::class, 'editCourse']);

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


Route::get('/course/list', [CourseController::class, 'list'])->name('course.list');
Route::get('/course/add', [CourseController::class, 'add'])->name('course.add');
Route::post('/course/add_', [CourseController::class, 'add_'])->name('course.add_');


Route::post('/media/upload', [MediaController::class, 'upload']);
Route::get('/media/manager', [MediaController::class, 'manager']);
