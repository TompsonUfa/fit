<?php

namespace App\Services;

use App\Models\Course;

class CourseServices
{

    public function getTotal()
    {
        return Course::all()->count();
    }

    public function getListWithPaginate()
    {
        return Course::query()
            ->paginate(3);
    }

    public function create($caption, $text)
    {
        $course = new Course();
        $course->caption = $caption;
        $course->text = $text;
        $course->save();
        return $course;
    }

    public function getById($id)
    {
        return Course::find($id);
    }

}
