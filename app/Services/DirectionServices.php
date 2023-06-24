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
    public function edit($city, $title, $text, $file)
    {
        $direction = Direction::first();

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
                'img' =>  "shkola-fitnesa-dlya-trenerov-i-instruktorov",
            ]);
        }

        $loadImg = true;

        if (isset($file) && $direction) {
            Storage::makeDirectory('/public/images/direction/');
            $loadImg = Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/images/direction/shkola-fitnesa-dlya-trenerov-i-instruktorov.webp');
        }

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
    public function add($name, $media, $file, $itsVideo)
    {
        $direction = Direction::insertGetId([
            'name' => $name,
            $media =>  Str::slug($name),
        ]);
        $filePath = 'media/directions/' . $direction . "/" . str_slug($name) . "." . $file->getClientOriginalExtension();
        if ($itsVideo) {
            Storage::disk('public')->put($filePath, file_get_contents($file));
        } else {
            Storage::makeDirectory('/public/media/employment/' . $direction);
            Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/media/directions/' . $direction . "/" . str_slug($name) . '.webp');
        }
    }
}
