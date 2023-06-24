<?php

namespace App\Services;

use App\Models\Cities;
use App\Models\PageCourse;
use App\Models\teacher;
use App\Models\employment;
use App\Models\direction;

class MainServices
{
    public function getDomain()
    {
        return request()->root();
    }
    public function getData($domain)
    {
        $cityId = Cities::where('domain', $domain)->value('id');
        $courses = PageCourse::where('city_id', $cityId)->get();
        $teachers = Teacher::where('city_id', $cityId)->get();
        $employment = Employment::where('city_id', $cityId)->orderBy('id', 'desc')->get();
        $direction = Direction::where('city_id', $cityId)->first();
        return [
            'courses' => $courses, 'teachers' => $teachers,
            'employment' => $employment, 'direction' => $direction,
        ];
    }
}
