<?php

namespace App\Http\Controllers;

use App\Services\MainServices;

class MainController extends Controller
{
    public function show(MainServices $service)
    {
        $domain = $service->getDomain();
        $data = $service->getData($domain);

        return view('home', $data);
        // $courses = PageCourse::all();
        // $posters = Poster::orderBy('id', 'desc')->get();
        // $teachers = Teacher::all();
        // $employment = Employment::orderBy('id', 'desc')->get();
        // $direction = Direction::first();
        // return view('home', [
        //     'courses' => $courses, 'posters' => $posters, 'teachers' => $teachers,
        //     'employment' => $employment, 'direction' => $direction,
        // ]);
    }
}
