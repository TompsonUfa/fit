<?php

namespace App\Services;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutServices
{
    public function total()
    {
        return About::count();
    }
    public function paginate($search)
    {
        if (empty($search)) {
            $items = About::paginate(10);
        } else {
            $items = About::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $items->appends(request()->input())->links();
        }
        return $items;
    }
    public function find($id)
    {
        return About::find($id);
    }
    public function add($title, $image, $text, $city)
    {
        $item = About::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
            'city_id' => $city,
        ]);

        Storage::makeDirectory('/public/media/about/' . $item);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/media/about/' . $item . "/" .  Str::slug($title) . '.webp'));
        if ($item && $loadImg) {
            return response()->json(['url' => route('admin.about')]);
        }
    }
    public function edit($id, $title, $image, $text, $city)
    {
        $item = About::find($id);
        $nameFile = Str::slug($title);
        if ($title != $item->title) {
            $item->title = $title;
        }
        if ($city != $item->city_id) {
            $item->city_id = $city;
        }
        if ($text != $item->text) {
            $item->text = $text;
        }
        if (empty($image)) {
            Storage::move('public/media/about/' . $item->id . '/' . $item->img . '.webp', 'public/media/about/' . $item->id . '/' . $nameFile . '.webp');
            $item->img = $nameFile;
        } else {
            $files = Storage::allFiles('public/media/about/' . $item->id);
            Storage::delete($files);
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/media/about/' . $item->id . "/" .  $nameFile . '.webp');
            $item->img = $nameFile;
        }
        $item->save();
        return response()->json(['url' => route('admin.about')]);
    }
    public function delete($id)
    {
        $info = About::find($id);
        $info->delete();
    }
}
