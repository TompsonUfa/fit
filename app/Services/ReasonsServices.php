<?php

namespace App\Services;

use App\Models\Reason;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReasonsServices
{
    public function total()
    {
        return Reason::count();
    }
    public function paginate($search)
    {
        if (empty($search)) {
            $items = Reason::paginate(10);
        } else {
            $items = Reason::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $items->appends(request()->input())->links();
        }
        return $items;
    }
    public function find($id)
    {
        return Reason::find($id);
    }
    public function add($title, $image, $text, $city)
    {
        $item = Reason::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
            'city_id' => $city,
        ]);

        Storage::makeDirectory('/public/media/reasons/' . $item);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/media/reasons/' . $item . "/" .  Str::slug($title) . '.webp'));
        if ($item && $loadImg) {
            return response()->json(['url' => route('admin.reasons')]);
        }
    }
    public function edit($id, $title, $image, $text, $city)
    {
        $item = Reason::find($id);
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
            Storage::move('public/media/reasons/' . $item->id . '/' . $item->img . '.webp', 'public/media/reasons/' . $item->id . '/' . $nameFile . '.webp');
            $item->img = $nameFile;
        } else {
            $files = Storage::allFiles('public/media/reasons/' . $item->id);
            Storage::delete($files);
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/media/reasons/' . $item->id . "/" .  $nameFile . '.webp');
            $item->img = $nameFile;
        }
        $item->save();
        return response()->json(['url' => route('admin.reasons')]);
    }
    public function delete($id)
    {
        $info = Reason::find($id);
        $info->delete();
    }
}
