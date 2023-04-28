<?php

namespace App\Http\Controllers;

use App\Services\CourseServices;
use Illuminate\Http\Request;


class CourseController extends Controller
{


    public function list(CourseServices $services)
    {
        return view('admin.course.list', [
            'total' => $services->getTotal(),
        ]);
    }

    public function add()
    {
        return view('admin.course.add', [
        ]);
    }

    public function add_(Request $request)
    {
        dd($request->all());
    }


}
