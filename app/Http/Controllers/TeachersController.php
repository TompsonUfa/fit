<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use App\Models\teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Services\CitiesServices;

class TeachersController extends Controller
{
    public function show(Request $request)
    {
        $total = Teacher::count();
        $search = $request->get('search');
        if (empty($search)) {
            $teachers = Teacher::paginate(10);
        } else {
            $teachers = Teacher::where('fullName', 'LIKE', '%' . $search . '%')->paginate(10);
            $teachers->appends(request()->input())->links();
        }
        return view('admin.teachers.index', ['teachers' => $teachers, 'total' => $total]);
    }
    public function showAddTeacher(Request $request, CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.teachers.add.index', ['cities' => $cities]);
    }
    public function showEditTeacher(Request $request, $id, CitiesServices $cities)
    {
        $cities = $cities->list();
        $teacher = Teacher::find($id);
        return view('admin.teachers.edit.index', ['teacher' => $teacher, 'cities' => $cities]);
    }
    public function delete(Request $request)
    {
        $teacherId = $request->get('id');
        $teacher = teacher::find($teacherId);
        $teacher->delete();
    }
    public function addTeacher(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'desc' => 'required|min:5|max:200',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
            'text' => 'required|min:15',
            'city' => 'required',
        ]);
        $title = $request->get('title');
        $desc = $request->get('desc');
        $image = $request->file('image');
        $text = $request->get('text');
        $city = $request->get('city');
        $teacher = teacher::insertGetId([
            'fullName' => $title,
            'desc' => $desc,
            'text' => $text,
            'img' =>  Str::slug($title),
            'slug' =>  Str::slug($title),
            'city_id' => $city,
        ]);
        Storage::makeDirectory('/public/images/teachers/' . $teacher);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/images/teachers/' . $teacher . "/" .  Str::slug($title) . '.webp'));
        if ($teacher && $loadImg) {
            return response()->json(['url' => route('admin.teachers')]);
        }
    }
    public function editTeacher(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'desc' => 'required|min:5|max:200',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
            'text' => 'required|min:15',
            'city' => 'required',
        ]);
        $title = $request->get('title');
        $desc = $request->get('desc');
        $image = $request->file('image');
        $text = $request->get('text');
        $city = $request->get('city');
        $teacher = teacher::find($id);
        if ($title != $teacher->fullName) {
            $teacher->fullName = $title;
            $nameImg = Str::slug($title);
        } else {
            $nameImg = Str::slug($teacher->fullName);
        }
        if ($text != $teacher->text) {
            $teacher->text = $text;
        }
        if ($desc != $teacher->desc) {
            $teacher->desc = $desc;
        }
        if ($city != $teacher->city_id) {
            $teacher->city_id = $city;
        }
        if (empty($image)) {
            if ($nameImg != $teacher->img) {
                Storage::move('public/images/teachers/' . $teacher->id . '/' . $teacher->img . '.webp', 'public/images/teachers/' . $teacher->id . '/' . str_slug($title) . '.webp');
                $teacher->img = $nameImg;
            }
        } else {
            if ($nameImg != $teacher->img) {
                Storage::delete('public/images/teachers/' . $teacher->id . '/' . $teacher->img . '.webp');
            }
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/images/teachers/' . $teacher->id . "/" .  $nameImg . '.webp');
            $teacher->img = $nameImg;
        }
        $teacher->save();
        return response()->json(['url' => route('admin.teachers')]);
    }
}
