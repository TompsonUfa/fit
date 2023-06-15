<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function show (string $name)
    {
        $teacher = teacher::where('slug', $name)->firstOrFail();
        return view('teachers', ['teacher' => $teacher]);
    }
}
