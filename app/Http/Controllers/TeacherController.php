<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Str;
use App\Services\CitiesServices;
use App\Services\TeachersServices;

class TeacherController extends Controller
{
    public function show (Request $request, string $name, CitiesServices $сitiesServices, TeachersServices $teachersServices)
    {
        $cityId = $request->cookie('city');
        if (isset($cityId)){
            $city = $сitiesServices->find($cityId);
        } else {
            $city = $сitiesServices->findByName("Уфа");
            $cityId = $city->id;
        }
        $teacher = $teachersServices->getTeacher($cityId, $name);
        return view('teachers',  ['teacher' => $teacher, 'city' => $city,]);
    }
}
