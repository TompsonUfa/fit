<?php

namespace App\Http\Controllers;

use App\Models\employment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AddEmploymentRequest;
use App\Services\EmploymentServices;
use App\Services\CitiesServices;

class EmploymentController extends Controller
{
    public function show(Request $request, EmploymentServices $service)
    {
        $search = $request->get('search');
        $total = $service->count();
        $employment = $service->show($search);
        return view('admin.employment.index', ['employment' => $employment, 'total' => $total]);
    }
    public function delete(Request $request, EmploymentServices $service)
    {
        $employmentId = $request->get('id');
        $service->delete($employmentId);
    }
    public function showAddEmployment(Request $request, CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.employment.add.index', ['cities' => $cities]);
    }
    public function addEmployment(AddEmploymentRequest $request, EmploymentServices $service)
    {
        $name = $request->get('title');
        $file = $request->file('file');
        $city = $request->get('city');

        $service->add($name, $request->media, $file, $request->itsVideo, $city);

        return response()
            ->json([
                'url' => route('admin.employment')
            ]);
    }
    public function showEditEmployment(Request $request, $id , CitiesServices $cities)
    {
        $cities = $cities->list();
        $employment = employment::find($id);
        return view('admin.employment.edit.index', ['employment' => $employment, 'cities' => $cities]);
    }
    public function editEmployment(Request $request, $id)
    {
        if (empty($request->file)) {
            $validFile = 'nullable|mimes:jpg,png,jpeg,gif,webp,svg,mp4';
        } else {
            $itsVideo = str_contains($request->file->getMimeType(), 'video');
            if ($itsVideo) {
                $validFile = 'required|mimes:mp4| max:20000';
            } else {
                $validFile = 'required|mimes:jpg,png,jpeg,gif,webp,svg|max:2048';
            }
        }
        $request->validate([
            'title' => 'required|min:5|max:100',
            'file' => $validFile,
            'city' => 'required',
        ]);

        $title = $request->get('title');
        $file = $request->file('file');
        $city = $request->get('city');
        $employment = employment::find($id);

        if ($title != $employment->name) {
            $employment->name = $title;
            $nameFile = Str::slug($title);
        } else {
            $nameFile = Str::slug($employment->name);
        }
        if ($city != $employment->city_id) {
            $employment->city_id = $city;
        }
        if (empty($file)) {
            if ($nameFile != $employment->img && !empty($employment->img)) {
                Storage::move('public/media/employment/' . $employment->id . '/' . $employment->img . '.webp', 'public/media/employment/' . $employment->id . '/' . $nameFile . '.webp');
                $employment->video = null;
                $employment->img = $nameFile;
            }
            if ($nameFile != $employment->video && !empty($employment->video)) {
                Storage::move('public/media/employment/' . $employment->id . '/' . $employment->video . '.mp4', 'public/media/employment/' . $employment->id . '/' . $nameFile . '.mp4');
                $employment->img = null;
                $employment->video = $nameFile;
            }
        } else {
            $files = Storage::allFiles('public/media/employment/' . $employment->id);
            Storage::delete($files);
            if ($itsVideo) {
                $filePath = 'media/employment/' . $employment->id . "/" . $nameFile . "." . $file->getClientOriginalExtension();
                Storage::disk('public')->put($filePath, file_get_contents($file));
                $employment->img = null;
                $employment->video = $nameFile;
            } else {
                Image::make($file)->encode('webp', 75)->save(storage_path() . '/app/public/media/employment/' . $employment->id . "/" .  $nameFile . '.webp');
                $employment->video = null;
                $employment->img = $nameFile;
            }
        }
        $employment->save();
        return response()->json(['url' => route('admin.employment')]);
    }
}
