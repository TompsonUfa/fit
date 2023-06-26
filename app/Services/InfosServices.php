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
}
