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

        return view('admin.directions.index', ['directions' => $directions, 'total' => $total]);
    }
    public function showAddItem(CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.directions.add', ['cities' => $cities]);
    }
    public function showEditItem(Request $request, $id, DirectionServices $service, CitiesServices $cities)
    {
        $direction = $service->find($id);
        $cities = $cities->list();
        return view('admin.directions.edit', ['direction' => $direction, 'cities' => $cities]);
    }
    public function edit($id, Request $request, DirectionServices $service)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'city' => 'required',
            'text' => 'required|min:15',
            'img' => 'image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ]);

        $city = $request->get('city');
        $title = $request->get('title');
        $text = $request->get('text');
        $file = $request->file('image');

        return $service->edit($id, $city, $title, $text, $file);
    }
    public function add(DirectionRequest $request, DirectionServices $service)
    {
        $city = $request->get('city');
        $title = $request->get('title');
        $text = $request->get('text');
        $file = $request->file('image');

        $service->add($city, $title, $text, $file);

        return response()
        ->json([
            'url' => route('admin.directions')
        ]);
    }
    public function delete(Request $request, DirectionServices $service)
    {
        $directionId = $request->get('id');
        $service->delete($directionId);
    }
}
