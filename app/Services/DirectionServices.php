<?php

namespace App\Services;

use App\Models\direction;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DirectionServices
{
    public function show()
    {
        return Direction::first();
    }
    public function edit($title, $text, $file)
    {
        $direction = Direction::first();

        if (isset($direction)) {
            if ($direction->title != $title) {
                $direction->title = $title;
            }
            if ($direction->text != $text) {
                $direction->text = $text;
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
}
