<?php

namespace App\Services;

use App\Models\employment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EmploymentServices
{
    public function count()
    {
        return employment::count();
    }
    public function show($search)
    {
        if (empty($search)) {
            $employment = employment::paginate(10);
        } else {
            $employment = employment::where('name', 'LIKE', '%' . $search . '%')->paginate(10);
            $employment->appends(request()->input())->links();
        }
        return $employment;
    }
    public function delete($id){
        $employment = employment::find($id);
        $employment->delete();
    }
    public function add($name, $media, $file, $itsVideo, $city)
    {
        $employment = Employment::insertGetId([
            'name' => $name,
            $media =>  Str::slug($name),
            'city_id' => $city,
        ]);
        $filePath = 'media/employment/' . $employment . "/" . str_slug($name) . "." . $file->getClientOriginalExtension();
        if ($itsVideo) {
            Storage::disk('public')->put($filePath, file_get_contents($file));
        } else {
            Storage::makeDirectory('/public/media/employment/' . $employment);
            Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/media/employment/' . $employment . "/" . str_slug($name) . '.webp');
        }
    }
}
