<?php

namespace App\Services;

use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TrainingServices
{
    public function total()
    {
        return Training::count();
    }
    public function paginate($search)
    {
        if (empty($search)) {
            $items = Training::paginate(10);
        } else {
            $items = Training::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $items->appends(request()->input())->links();
        }
        return $items;
    }
    public function find($id)
    {
        return Training::find($id);
    }
    public function add($title, $image, $text, $city)
    {
        $item = Training::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
            'city_id' => $city,
        ]);

        Storage::makeDirectory('/public/media/training/' . $item);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/media/training/' . $item . "/" .  Str::slug($title) . '.webp'));
        if ($item && $loadImg) {
            return response()->json(['url' => route('admin.training')]);
        }
    }
    public function edit($id, $title, $image, $text, $city)
    {
        $item = Training::find($id);
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
            Storage::move('public/media/training/' . $item->id . '/' . $item->img . '.webp', 'public/media/training/' . $item->id . '/' . $nameFile . '.webp');
            $item->img = $nameFile;
        } else {
            $files = Storage::allFiles('public/media/training/' . $item->id);
            Storage::delete($files);
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/media/training/' . $item->id . "/" .  $nameFile . '.webp');
            $item->img = $nameFile;
        }
        $item->save();
        return response()->json(['url' => route('admin.training')]);
    }
    public function delete($id)
    {
        $info = Training::find($id);
        $info->delete();
    }
}
