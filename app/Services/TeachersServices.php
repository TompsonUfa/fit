<?php

namespace App\Services;

use App\Models\teacher;
use App\Models\Cities;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeachersServices
{
    public function getTeacher($cityId, $name)
    {
        $teacher = teacher::where('slug', $name)
            ->where('city_id', $cityId)
            ->firstOrFail();
        return $teacher;
    }
}