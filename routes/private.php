<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\MediaController;

Route::get('/', [PersonalController::class, 'show'])->name('personal');

Route::get('/media/{media}', [MediaController::class, 'get'])->name('media');
