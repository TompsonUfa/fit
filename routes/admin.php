<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DirectionsController;
use App\Http\Controllers\PageCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostersController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ReasonsController;

Route::get('/', function () {
    return redirect('/admin/directions');
})->name('admin');

Route::get('/infos', [InfosController::class, 'show'])->name('admin.infos');
Route::post('/infos', [InfosController::class, 'delete']);
Route::get('/infos/add', [InfosController::class, 'add']);
Route::post('/infos/add', [InfosController::class, 'add_']);
Route::get('/infos/edit/{id}', [InfosController::class, 'edit']);
Route::post('/infos/edit/{id}', [InfosController::class, 'edit_']);

Route::get('/about', [AboutController::class, 'show'])->name('admin.about');
Route::post('/about', [AboutController::class, 'delete']);
Route::get('/about/add', [AboutController::class, 'add']);
Route::post('/about/add', [AboutController::class, 'add_']);
Route::get('/about/edit/{id}', [AboutController::class, 'edit']);
Route::post('/about/edit/{id}', [AboutController::class, 'edit_']);

Route::get('/training', [TrainingController::class, 'show'])->name('admin.training');
Route::post('/training', [TrainingController::class, 'delete']);
Route::get('/training/add', [TrainingController::class, 'add']);
Route::post('/training/add', [TrainingController::class, 'add_']);
Route::get('/training/edit/{id}', [TrainingController::class, 'edit']);
Route::post('/training/edit/{id}', [TrainingController::class, 'edit_']);

Route::get('/reasons', [ReasonsController::class, 'show'])->name('admin.reasons');
Route::post('/reasons', [ReasonsController::class, 'delete']);
Route::get('/reasons/add', [ReasonsController::class, 'add']);
Route::post('/reasons/add', [ReasonsController::class, 'add_']);
Route::get('/reasons/edit/{id}', [ReasonsController::class, 'edit']);
Route::post('/reasons/edit/{id}', [ReasonsController::class, 'edit_']);

Route::get('/directions', [DirectionsController::class, 'show'])->name('admin.directions');
Route::post('/directions', [DirectionsController::class, 'delete']);
Route::get('/directions/add', [DirectionsController::class, 'showAddItem']);
Route::post('/directions/add', [DirectionsController::class, 'add']);
Route::get('/directions/edit/{id}', [DirectionsController::class, 'showEditItem']);
Route::post('/directions/edit/{id}', [DirectionsController::class, 'edit']);

Route::get('/page_courses', [PageCourseController::class, 'show'])->name('admin.courses');
Route::post('/page_courses', [PageCourseController::class, 'delete']);
Route::get('/page_courses/add', [PageCourseController::class, 'showAddCourse']);
Route::post('/page_courses/add', [PageCourseController::class, 'addCourse']);
Route::get('/page_courses/edit/{id}', [PageCourseController::class, 'showEditCourse']);
Route::post('/page_courses/edit/{id}', [PageCourseController::class, 'editCourse']);

Route::get('/posters', [PostersController::class, 'show'])->name('admin.posters');
Route::post('/posters', [PostersController::class, 'delete']);
Route::get('/posters/add', [PostersController::class, 'showAddPoster']);
Route::post('/posters/add', [PostersController::class, 'addPoster']);
Route::get('/posters/edit/{id}', [PostersController::class, 'showEditPoster']);
Route::post('/posters/edit/{id}', [PostersController::class, 'editPoster']);

Route::get('/teachers', [TeachersController::class, 'show'])->name('admin.teachers');
Route::post('/teachers', [TeachersController::class, 'delete']);
Route::get('/teachers/add', [TeachersController::class, 'showAddTeacher']);
Route::post('/teachers/add', [TeachersController::class, 'addTeacher']);
Route::get('/teachers/edit/{id}', [TeachersController::class, 'showEditTeacher']);
Route::post('/teachers/edit/{id}', [TeachersController::class, 'editTeacher']);

Route::get('/employment', [EmploymentController::class, 'show'])->name('admin.employment');
Route::post('/employment', [EmploymentController::class, 'delete']);
Route::get('/employment/add', [EmploymentController::class, 'showAddEmployment']);
Route::post('/employment/add', [EmploymentController::class, 'addEmployment']);
Route::get('/employment/edit/{id}', [EmploymentController::class, 'showEditEmployment']);
Route::post('/employment/edit/{id}', [EmploymentController::class, 'editEmployment']);

Route::get('/users', [UsersController::class, 'show'])->name('admin.users');
Route::get('/users/add', [UsersController::class, 'showAddUsers']);
Route::post('/users/add', [UsersController::class, 'add']);
Route::post('/users/blocked', [UsersController::class, 'blocked']);
Route::post('/users/extend', [UsersController::class, 'extend']);


Route::get('/course/list', [CourseController::class, 'list'])->name('course.list');
Route::get('/course/add', [CourseController::class, 'add'])->name('course.add');
Route::post('/course/add_', [CourseController::class, 'add_'])->name('course.add_');
Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::post('/course/edit_/{id}', [CourseController::class, 'edit_'])->name('course.edit_');
Route::post('/course/delete/{id}', [CourseController::class, 'delete'])->name('course.delete');

Route::get('/cities', [CitiesController::class, 'show'])->name('admin.cities');
Route::post('/cities', [CitiesController::class, 'delete']);
Route::get('/cities/add', [CitiesController::class, 'showAddItem']);
Route::post('/cities/add', [CitiesController::class, 'add']);
Route::get('/cities/edit/{id}', [CitiesController::class, 'showEditItem'])->name('cities.edit');
Route::post('/cities/edit/{id}', [CitiesController::class, 'edit']);

Route::get('/contacts', [ContactsController::class, 'show'])->name('admin.contacts');
Route::post('/contacts', [ContactsController::class, 'delete']);
Route::get('/contacts/add', [ContactsController::class, 'add']);
Route::post('/contacts/add', [ContactsController::class, 'add_']);
Route::get('/contacts/edit/{id}', [ContactsController::class, 'edit']);
Route::post('/contacts/edit/{id}', [ContactsController::class, 'edit_']);

Route::post('/media/upload', [MediaController::class, 'upload']);
Route::get('/media/manager', [MediaController::class, 'manager']);
