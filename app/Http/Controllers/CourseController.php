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
            'courses' => $services->getListWithPaginate(),
        ]);
    }

    public function add()
    {
        return view('admin.course.add', []);
    }

    public function add_(Request $request, CourseServices $service)
    {
        $service->create($request->get('title'), $request->get('text'));
        return redirect()
            ->route('course.list');
    }

    public function detail($id, CourseServices $service)
    {
        $course = $service->getById($id);
        if (empty($course)) {
            abort(404);
        }
        return view('admin.course.detail', [
            'course' => $course,
        ]);
    }

}
