<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
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

    public function add_(CourseRequest $request, CourseServices $service)
    {
        $service->create($request->get('title'), $request->get('text'));
        return redirect()
            ->route('course.list');
    }

    public function edit($id, CourseServices $service)
    {
        $course = $service->getById($id);
        if (empty($course)) {
            abort(404);
        }
        return view('admin.course.edit', [
            'course' => $course,
        ]);
    }

    public function edit_($id, CourseRequest $request, CourseServices $service)
    {
        $course = $service->getById($id);
        if (empty($course)) {
            abort(404);
        }
        $service->update($id, $request->get('title'), $request->get('text'));
        return redirect()
            ->route('course.list');
    }

    public function delete($id, CourseServices $service)
    {
        $course = $service->getById($id);
        if (empty($course)) {
            abort(404);
        }
        $service->delete($id);
        return redirect()
            ->route('course.list');
    }

    public function detail($id, CourseServices $service)
    {
        $course = $service->getById($id);
        if (empty($course)) {
            abort(404);
        }
        return view('personal.detail', [
            'course' => $course,
        ]);
    }
}
