<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CourseController;


Route::get('/', [PersonalController::class, 'show'])->name('private');
Route::get('/course/{id}', [CourseController::class, 'detail'])->name('course.detail');

Route::get('/media/{media}', [MediaController::class, 'get'])->name('media');
