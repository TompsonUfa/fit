<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaServices
{

    private $map = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
        'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '',
        'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E',
        'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M',
        'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'Kh', 'Ц' => 'Ts', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Shch', 'Ъ' => '',
        'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
    ];

    public function upload(UploadedFile $file)
    {
        try {
            $name = $file->getClientOriginalName();
            $name = strtr($name, $this->map);
            $name = preg_replace('/[^a-zA-Z0-9\-]/', '-', $name);
            $name = str_replace(' ', '-', $name);
            $name = $name . '.' . $file->extension();

            $media = Media::query()
                ->where('caption', $name)
                ->first();
            if (!empty($media)) {
                $name = time() . $name;
            }

            $media = new Media();
            $media->caption = $name;
            $media->mimeType = $file->getMimeType();
            $media->size = $file->getSize();
            $media->hash = Str::uuid();
            $media->save();

            Storage::disk('media')
                ->putFileAs(
                    '/',
                    $file,
                    $media->hash
                );
            return $media;
        } catch (\Exception $e) {
            return null;
        }

    }


    public function get($name)
    {
        return Media::whereCaption($name)
            ->first();
    }

}
