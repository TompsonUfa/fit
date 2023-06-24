<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectionRequest;
use App\Services\DirectionServices;
use App\Services\CitiesServices;
use Illuminate\Http\Request;

class DirectionsController extends Controller
{
    public function show(Request $request, DirectionServices $service, CitiesServices $cities)
    {
        $search = $request->get('search');
        $total = $service->count();
        $cities = $cities->list();
        $directions = $service->show($search);

        return view('admin.directions.index', ['directions' => $directions, 'cities' => $cities, 'total' => $total]);
    }
    public function showAddItem(CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.directions.add', ['cities' => $cities]);
    }
    public function showEditEmployment(Request $request, $id)
    {
    }
    public function edit(DirectionRequest $request, DirectionServices $service)
    {
        $city = $request->get('city');
        $title = $request->get('title');
        $text = $request->get('text');
        $file = $request->file('image');

        return $service->edit($city, $title, $text, $file);
    }
    public function addEmployment(DirectionRequest $request, DirectionServices $service)
    {
    }
}
