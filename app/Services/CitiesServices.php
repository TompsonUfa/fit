<?php

namespace App\Services;

use App\Models\Cities;

class CitiesServices
{
    public function list()
    {
        return Cities::all();
    }
}
