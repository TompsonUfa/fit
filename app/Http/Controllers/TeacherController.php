<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Str;
use App\Services\DomainServices;
use App\Services\TeachersServices;

class TeacherController extends Controller
{
    public function show (string $name, DomainServices $domainService, TeachersServices $teachersServices)
    {
        $domain = $domainService->getDomain();
        $dataDomain = $domainService->getData($domain);
        $data = $teachersServices->getTeacher($dataDomain, $name);
        
        return view('teachers', $data);
    }
}
