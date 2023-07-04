<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainServices;
use App\Services\DomainServices;

class MainController extends Controller
{
    public function show(Request $request, MainServices $service)
    {
        $idCity = $request->input('_fr');
        $data = $service->getData($idCity);
        return view('home', $data);
    }
}
