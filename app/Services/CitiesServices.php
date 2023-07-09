<?php

namespace App\Services;

use App\Models\Cities;

class CitiesServices
{
    public function count()
    {
        return Cities::count();
    }
    public function list()
    {
        return Cities::all();
    }
    public function show($search)
    {
        if (empty($search)) {
            $cities = Cities::paginate(10);
        } else {
            $cities = Cities::where('name', 'LIKE', '%' . $search . '%')->paginate(10);
            $cities->appends(request()->input())->links();
        }
        return $cities;
    }
    public function add($name, $desc, $keywords)
    {
        return Cities::insert([
            'name' => $name,
            'desc' => $desc,
            'keywords' => $keywords,
        ]);
    }
    public function delete($id)
    {
        $city = Cities::find($id);
        $city->delete();
    }
    public function find($id)
    {
        $city = Cities::find($id);
        return $city;
    }
    public function findByName($name)
    {
        $city = Cities::where('name', $name)->first();
        return $city;
    }
    public function edit($id, $name, $desc, $keywords)
    {
        $city = cities::find($id);
        $city->name = $name;
        $city->desc = $desc;
        $city->keywords = $keywords;
        $city->save();
        if ($city) {
            return response()->json([
                'success' => 'Данные успешно загружены !',
            ], 200);
        } else {
            return response()->json([
                'errors' => ['Ошибка, попробуйте еще раз.'],
            ], 500);
        }
    }
}
