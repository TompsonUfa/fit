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
    public function getData($domain)
    {
        $cityId = $domain['cityId'];
        $cityDesc = $domain['cityDesc'];
        $cityKeyWords = $domain['cityKeyWords'];

        $info = Info::where('city_id', $cityId)->first();
        $about = About::where('city_id', $cityId)->first();
        $training = Training::where('city_id', $cityId)->first();
        $reason = Reason::where('city_id', $cityId)->first();
        $courses = PageCourse::where('city_id', $cityId)->get();
        $teachers = Teacher::where('city_id', $cityId)->get();
        $employment = Employment::where('city_id', $cityId)->orderBy('id', 'desc')->get();
        $contact = Contact::where('city_id', $cityId)->first();
        $direction = Direction::where('city_id', $cityId)->first();

        return [
            'info' => $info, 'about' => $about, 
            'training' => $training, 'reason' => $reason,
            'cityDesc' => $cityDesc, 'cityKeyWords' => $cityKeyWords,
            'courses' => $courses, 'teachers' => $teachers,
            'employment' => $employment, 'direction' => $direction,
            'contact' => $contact,
        ];
    }
}
