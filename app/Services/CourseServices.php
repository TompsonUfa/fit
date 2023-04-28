<?php

namespace App\Services;

use App\Models\Course;

class CourseServices
{

    public function getTotal()
    {
        return Course::all()->count();
    }

}
