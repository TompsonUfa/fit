<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showCourses()
    {
        return view('admin.courses.index');
    }
    public function showTeachers()
    {
        return view('admin.teachers.index');
    }
    public function showEmployment()
    {
        return view('admin.employment.index');
    }
}
