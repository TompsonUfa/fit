<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainServices;
use App\Services\DomainServices;
use App\Services\CitiesServices;

class MainController extends Controller
{
    public function show(Request $request, MainServices $service, CitiesServices $city)
    {
        $mainCity = $city->findByName("Уфа");
        $cityId = $request->cookie('city');
        $data = $service->getData($cityId, $mainCity);
        return view('home', $data);
    }
}
