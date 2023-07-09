<?php

namespace App\Services;

use App\Models\Info;
use App\Models\About;
use App\Models\Training;
use App\Models\Reason;
use App\Models\Cities;
use App\Models\Contact;
use App\Models\PageCourse;
use App\Models\teacher;
use App\Models\employment;
use App\Models\direction;

class MainServices
{
    public function getDomain()
    {
        return request()->getHttpHost();
    }
    public function getData($fr, $mainCity)
    {
        if (isset($fr)) {
            $selectedSity = Cities::where('id', $fr)->first();
            if (empty($selectedSity)) {
                $selectedSity = Cities::where('name', "Уфа")->first();
            };
        } else {
            $selectedSity = Cities::where('name', "Уфа")->first();
        }

        $cityId = $selectedSity['id'];
        $cityName = $selectedSity['name'];
        $cityDesc = $selectedSity['desc'];
        $cityKeyWords = $selectedSity['keywords'];

        $info = Info::where('city_id', $cityId)->first();
        if(empty($info)){
            $info = Info::where('city_id', $mainCity->id)->first();
        }

        $about = About::where('city_id', $cityId)->first();
        if(empty($about)){
            $about = About::where('city_id', $mainCity->id)->first();
        }

        $training = Training::where('city_id', $cityId)->first();
        if(empty($training)){
            $training = Training::where('city_id', $mainCity->id)->first();
        }

        $reason = Reason::where('city_id', $cityId)->first();
        if(empty($reason)){
            $reason = Reason::where('city_id', $mainCity->id)->first();
        }

        $courses = PageCourse::where('city_id', $cityId)->get();
        if(Count($courses) == 0){
            $courses = PageCourse::where('city_id', $mainCity->id)->get();
        }

        $teachers = Teacher::where('city_id', $cityId)->get();

        $employment = Employment::where('city_id', $cityId)->orderBy('id', 'desc')->get();
        if(Count($employment) == 0){
            $employment = Employment::where('city_id', $mainCity->id)->get();
        }

        $contact = Contact::where('city_id', $cityId)->first();

        $direction = Direction::where('city_id', $cityId)->first();
        if(empty($direction)){
            $direction = Direction::where('city_id', $mainCity->id)->first();
        }
        
        $sities = Cities::all();

        return [
            'info' => $info, 'about' => $about,
            'training' => $training, 'reason' => $reason,
            'cityName' => $cityName, 'cityDesc' => $cityDesc, 'cityKeyWords' => $cityKeyWords,
            'courses' => $courses, 'teachers' => $teachers,
            'employment' => $employment, 'direction' => $direction,
            'contact' => $contact, 'cities' => $sities,
        ];
    }
}
