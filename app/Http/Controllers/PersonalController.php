<?php

namespace App\Http\Controllers;

use App\Services\CourseServices;

class PersonalController extends Controller
{
    public function show(CourseServices $services)
    {
        $courses = $services->getListWithPaginate();
        return view('personal.list', [
            'courses' => $courses,
        ]);
    }

}
