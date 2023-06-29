<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReasonsServices;
use App\Services\CitiesServices;
use App\Http\Requests\ReasonsRequest;

class ReasonsController extends Controller
{
    public function show(Request $request, ReasonsServices $service)
    {
        $total = $service->total();
        $search = $request->get('search');
        $items = $service->paginate($search);
        return view('admin.reasons.index', ['items' => $items, 'total' => $total]);
    }
    public function add(CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.reasons.add', ['cities' => $cities]);
    }
    public function add_(ReasonsRequest $request, ReasonsServices $service)
    {
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');
        return $service->add($title, $image, $text, $cityId);
    }
    public function edit($id, ReasonsServices $service, CitiesServices $cities)
    {
        $item = $service->find($id);
        $cities = $cities->list();
        return view('admin.reasons.edit', ['item' => $item, 'cities' => $cities]);
    }
    public function edit_(Request $request, $id, ReasonsServices $service)
    {
        $item = $service->find($id);
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');

        if ($item['city_id'] == $cityId) {
            $cityValid = 'required';
        } else {
            $cityValid = 'required|unique:reasons,city_id';
        }

        $request->validate([
            'title' => 'required|min:5|max:100',
            'city' => $cityValid,
            'text' => 'required|min:15',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ]);

        return $service->edit($id, $title, $image, $text, $cityId);
    }
    public function delete(Request $request, ReasonsServices $service)
    {
        $id = $request->get('id');
        return $service->delete($id);
    }
}
