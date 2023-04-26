<?php

use App\Http\Controllers\PersonalController;

Route::get('/', [PersonalController::class, 'show'])->name('personal');
