<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use App\Models\course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CoursesController extends Controller
{
    public function show(Request $request)
    {
        $total = Course::count();
        $search = $request->get('search');
        if (empty($search)) {
            $courses = Course::paginate(10);
        } else {
            $courses = Course::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $courses->appends(request()->input())->links();
        }
        return view('admin.courses.index', ['courses' => $courses, 'total' => $total]);
    }
    public function showAddCourse(Request $request)
    {
        return view('admin.courses.add.index');
    }
    public function showEditCourse(Request $request, $id)
    {
        $course = Course::find($id);

        return view('admin.courses.edit.index', ['course' => $course]);
    }
    public function delete(Request $request)
    {
        $courseId = $request->get('id');
        $Course = Course::find($courseId);
        $Course->delete();
    }
    public function addCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
            'text' => 'required|min:15'
        ]);
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $course = Course::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
        ]);
        Storage::makeDirectory('/public/images/courses/' . $course);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/images/courses/' . $course . "/" .  Str::slug($title) . '.webp'));
        if ($course && $loadImg) {
            return response()->json(['url' => route('admin.courses')]);
        }
    }
    public function editCourse(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
            'text' => 'required|min:15'
        ]);
        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $course = Course::find($id);
        if ($title != $course->title) {
            $course->title = $title;
            $nameImg = Str::slug($title);
        } else {
            $nameImg = Str::slug($course->title);
        }
        if ($text != $course->text) {
            $course->text = $text;
        }
        if (empty($image)) {
            if ($nameImg != $course->img) {
                Storage::move('public/images/courses/' . $course->id . '/' . $course->img . '.webp', 'public/images/courses/' . $course->id . '/' . str_slug($title) . '.webp');
                $course->img = $nameImg;
            }
        } else {
            if ($nameImg != $course->img) {
                Storage::delete('public/images/courses/' . $course->id . '/' . $course->img . '.webp');
            }
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/images/courses/' . $course->id . "/" .  $nameImg . '.webp');
            $course->img = $nameImg;
        }
        $course->save();
        return response()->json(['url' => route('admin.courses')]);
    }
}
