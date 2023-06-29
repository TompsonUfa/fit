<?php

namespace App\Services;

use App\Models\Info;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InfosServices
{
    public function total()
    {
        return Info::count();
    }
    public function paginate($search)
    {
        if (empty($search)) {
            $infos = Info::paginate(10);
        } else {
            $infos = Info::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $infos->appends(request()->input())->links();
        }
        return $infos;
    }
    public function find($id)
    {
        return Info::find($id);
    }
    public function add($title, $image, $text, $city)
    {
        $info = Info::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
            'city_id' => $city,
        ]);

        Storage::makeDirectory('/public/media/infos/' . $info);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/media/infos/' . $info . "/" .  Str::slug($title) . '.webp'));
        if ($info && $loadImg) {
            return response()->json(['url' => route('admin.infos')]);
        }
    }
    public function edit($id, $title, $image, $text, $city)
    {
        $info = Info::find($id);
        $nameFile = Str::slug($title);
        if ($title != $info->title) {
            $info->title = $title;
        }
        if ($city != $info->city_id) {
            $info->city_id = $city;
        }
        if ($text != $info->text) {
            $info->text = $text;
        }
        if (empty($image)) {
            Storage::move('public/media/infos/' . $info->id . '/' . $info->img . '.webp', 'public/media/infos/' . $info->id . '/' . $nameFile . '.webp');
            $info->img = $nameFile;
        } else {
            $files = Storage::allFiles('public/media/infos/' . $info->id);
            Storage::delete($files);
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/media/infos/' . $info->id . "/" .  $nameFile . '.webp');
            $info->img = $nameFile;
        }
        $info->save();
        return response()->json(['url' => route('admin.infos')]);
    }
    public function delete($id)
    {
        $info = Info::find($id);
        $info->delete();
    }
}
