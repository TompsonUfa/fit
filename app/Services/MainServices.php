<?php

namespace App\Services;

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
        return request()->root();
    }
    public function getData($domain)
    {

        $city = Cities::where('domain', $domain);
        $cityId = $city->value('id');
        $cityDesc = $city->value('desc');
        $cityKeyWords = $city->value('keywords');
        $courses = PageCourse::where('city_id', $cityId)->get();
        $teachers = Teacher::where('city_id', $cityId)->get();
        $employment = Employment::where('city_id', $cityId)->orderBy('id', 'desc')->get();
        $contact = Contact::where('city_id', $cityId)->first();
        $direction = Direction::where('city_id', $cityId)->first();
        return [
            'contact' => $contact,
            'cityDesc' => $cityDesc, 'cityKeyWords' => $cityKeyWords,
            'courses' => $courses, 'teachers' => $teachers,
            'employment' => $employment, 'direction' => $direction,
        ];
    }
}
