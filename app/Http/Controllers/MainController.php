<?php

namespace App\Http\Controllers;

use App\Services\MainServices;
use App\Services\DomainServices;

class MainController extends Controller
{
    public function show(DomainServices $domainService, MainServices $service)
    {
        $domain = $domainService->getDomain();
        $dataDomain = $domainService->getData($domain);
        $data = $service->getData($dataDomain);
        return view('home', $data);
    }
}
