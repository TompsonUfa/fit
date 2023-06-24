<?php

namespace App\Http\Controllers;

use App\Services\MainServices;

class MainController extends Controller
{
    public function show(MainServices $service)
    {
        $domain = $service->getDomain();
        $data = $service->getData($domain);

        return view('home', $data);
    }
}
