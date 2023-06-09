<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function edit($id, infosServices $service, CitiesServices $cities)
    {
        $info = $service->find($id);
        $cities = $cities->list();
        return view('admin.infos.edit', ['info' => $info, 'cities' => $cities]);
    }
    public function edit_(Request $request, $id, infosServices $service)
    {
        $info = $service->find($id);
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');

        if ($info['city_id'] == $cityId) {
            $cityValid = 'required';
        } else {
            $cityValid = 'required|unique:infos,city_id';
        }

        $request->validate([
            'title' => 'required|min:5|max:100',
            'city' => $cityValid,
            'text' => 'required|min:15',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ]);

        return $service->edit($id, $title, $image, $text, $cityId);
    }
    public function delete(Request $request, infosServices $service)
    {
        $id = $request->get('id');
        return $service->delete($id);
    }
}
