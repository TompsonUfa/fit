<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Services\infosServices;
use App\Services\CitiesServices;
use App\Http\Requests\InfosRequest;

class InfosController extends Controller
{
    public function show(Request $request, infosServices $service)
    {
        $total = $service->total();
        $search = $request->get('search');
        $infos = $service->paginate($search);
        return view('admin.infos.index', ['infos' => $infos, 'total' => $total]);
    }
    public function add(CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.infos.add', ['cities' => $cities]);
    }
    public function add_(InfosRequest $request, infosServices $service)
    {
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');
        return $service->add($title, $image, $text, $cityId);
    }
}
