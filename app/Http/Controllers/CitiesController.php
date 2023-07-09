<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CitiesServices;
use App\Http\Requests\CitiesRequest;

class CitiesController extends Controller
{
    public function show(Request $request, CitiesServices $service)
    {
        $search = $request->get('search');
        $total = $service->count();
        $cities = $service->show($search);
        return view('admin.cities.index', ['cities' => $cities, 'total' => $total]);
    }
    public function showAddItem()
    {
        return view('admin.cities.add');
    }
    public function showEditItem($id, CitiesServices $service)
    {
        $city = $service->find($id);
        return view('admin.cities.edit', ['city' => $city]);
    }
    public function add(CitiesRequest $request, CitiesServices $service)
    {
        $name = $request->get('name');
        $desc = $request->get('desc');
        $keywords = $request->get('keywords');
        $service->add($name, $desc, $keywords);
        return response()
            ->json([
                'url' => route('cities')
            ]);
    }
    public function delete(Request $request, CitiesServices $service)
    {
        $cityId = $request->get('id');
        $service->delete($cityId);
    }
    public function edit($id, CitiesRequest $request, CitiesServices $service)
    {
        $name = $request->get('name');
        $desc = $request->get('desc');
        $keywords = $request->get('keywords');
        return $service->edit($id, $name, $desc, $keywords);
    }
    public function createCookie(Request $request)
    {
        $cookie = cookie('city', $request->cityId, 60);
        return response('success')->cookie($cookie);
    }
}
