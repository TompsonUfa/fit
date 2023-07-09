<?php

namespace App\Http\Controllers;

use App\Models\PageCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Services\CitiesServices;

class PageCourseController extends Controller
{
    public function show(Request $request, CitiesServices $сitiesServices, $id)
    {
        $cityId = $request->cookie('city');
        if (isset($cityId)){
            $city = $сitiesServices->find($cityId);
        } else {
            $city = $сitiesServices->findByName("Уфа");
            $cityId = $city->id;
        }
        $course = PageCourse::find($id);
        return view('courses', ['course' => $course, 'city' => $city,]);
    }
}
