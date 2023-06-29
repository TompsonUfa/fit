<?php

namespace App\Services;

use App\Models\teacher;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeachersServices
{
    public function getTeacher($domain, $name)
    {
        $cityId = $domain['cityId'];
        $cityDesc = $domain['cityDesc'];
        $cityKeyWords = $domain['cityKeyWords'];
        
        $teacher = teacher::where('slug', $name)
            ->where('city_id',$cityId)
            ->firstOrFail();

        return [
            'cityDesc' => $cityDesc, 
            'cityKeyWords' => $cityKeyWords,
            'teacher' => $teacher,
        ];
    }
}