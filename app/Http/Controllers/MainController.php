<?php

namespace App\Http\Controllers;

use App\Models\PageCourse;
use App\Models\poster;
use App\Models\teacher;
use App\Models\employment;
use App\Models\direction;

class MainController extends Controller
{
    public function show()
    {
        $courses = PageCourse::all();
        $posters = Poster::orderBy('id', 'desc')->get();
        $teachers = Teacher::all();
        $employment = Employment::orderBy('id', 'desc')->get();
        $direction = Direction::first();
        return view('home', [
            'courses' => $courses, 'posters' => $posters, 'teachers' => $teachers,
            'employment' => $employment, 'direction' => $direction,
        ]);
    }
}
