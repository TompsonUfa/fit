<?php

namespace App\Services;

use App\Models\Direction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DirectionServices
{
    public function count()
    {
        return direction::count();
    }
    public function show($search)
    {
        if (empty($search)) {
            $directions = direction::paginate(10);
        } else {
            $directions = direction::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $directions->appends(request()->input())->links();
        }
        return $directions;
    }
    public function find($id)
    {
       return $Direction = Direction::find($id);
    }
    public function edit($id, $city, $title, $text, $file)
    {
        $direction = Direction::find($id);
        $loadImg = true;

        if (isset($direction)) {
            if ($direction->title != $title) {
                $direction->title = $title;
            }
            if ($direction->text != $text) {
                $direction->text = $text;
            }
            if ($direction->city_id != $city) {
                $direction->city_id = $city;
            }
            $direction->save();
        } else {
            $direction = Direction::insert([
                'title' => $title,
                'text' => $text,
                'city_id' => $city,
                'img' =>  Str::slug($title),
            ]);
        }

        if (empty($file)) {
            if (Str::slug($title) != $direction->img) {
                $loadImg = Storage::move('public/media/directions/' . $direction->id . '/' . $direction->img . '.webp', 'public/media/directions/' . $direction->id . '/' . str_slug($title) . '.webp');
                $direction->img = Str::slug($title);
            } 
        } else {
            if (Str::slug($title) != $direction->img) {
                Storage::delete('public/media/directions/' . $direction->id . '/' . $direction->img . '.webp');
            }
            $loadImg = Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/media/directions/' . $direction->id . "/" .  str_slug($title) . '.webp');
            $direction->img = Str::slug($title);
        }

        $direction->save();

        if ($loadImg && $direction) {
            return response()->json([
                'success' => 'Данные успешно загружены !',
            ], 200);
        } else {
            return response()->json([
                'errors' => ['Ошибка, попробуйте еще раз.'],
            ], 500);
        }
    }
    public function add($city, $title, $text, $file)
    {
        $direction = Direction::insertGetId([
            'title' => $title,
            'text' => $text,
            'city_id'=> $city,
            'img' =>  Str::slug($title),
        ]);
        $filePath = 'media/directions/' . $direction . "/" . str_slug($title) . "." . $file->getClientOriginalExtension();

        Storage::makeDirectory('/public/media/directions/' . $direction);
        Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/media/directions/' . $direction . "/" . str_slug($title) . '.webp');
    }
    public function delete($id)
    {
        $direction = direction::find($id);
        $direction->delete();
    }
}
