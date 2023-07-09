<?php

namespace App\Http\Controllers;

use App\Models\PageCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Services\CitiesServices;

class PageCoursesController extends Controller
{
    public function show(Request $request)
    {
        $total = PageCourse::count();
        $search = $request->get('search');
        if (empty($search)) {
            $courses = PageCourse::paginate(10);
        } else {
            $courses = PageCourse::where('title', 'LIKE', '%' . $search . '%')->paginate(10);
            $courses->appends(request()->input())->links();
        }
        return view('admin.courses.index', ['courses' => $courses, 'total' => $total]);
    }
    public function showAddCourse(Request $request, CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.courses.add.index', ['cities' => $cities]);
    }
    public function showEditCourse(Request $request, $id, CitiesServices $cities)
    {
        $cities = $cities->list();
        $course = PageCourse::find($id);
        return view('admin.courses.edit.index', ['course' => $course, 'cities' => $cities]);
    }
    public function delete(Request $request)
    {
        $courseId = $request->get('id');
        $Course = PageCourse::find($courseId);
        $Course->delete();
    }
    public function addCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
            'city' => 'required',
            'text' => 'required|min:15',
            'desc' => 'required',
            'time' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'nullable|date',
        ]);

        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');
        $desc = $request->get('desc');
        $time = $request->get('time');
        $price = $request->get('price');
        $date = $request->get('date');

        $course = PageCourse::insertGetId([
            'title' => $title,
            'text' => $text,
            'img' =>  Str::slug($title),
            'city_id' => $cityId,
            'desc' => $desc,
            'time' => $time,
            'price' => $price,
            'date' => $date,
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
            'city' => 'required',
            'text' => 'required|min:15',
            'desc' => 'required',
            'time' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'nullable|date',
        ]);

        $title = $request->get('title');
        $image = $request->file('image');
        $text = $request->get('text');
        $cityId = $request->get('city');
        $desc = $request->get('desc');
        $time = $request->get('time');
        $price = $request->get('price');
        $date = $request->get('date');

        $course = PageCourse::find($id);

        if ($title != $course->title) {
            $course->title = $title;
            $nameImg = Str::slug($title);
        } else {
            $nameImg = Str::slug($course->title);
        }

        if ($text != $course->text) {
            $course->text = $text;
        }

        if ($desc != $course->desc) {
            $course->desc = $desc;
        }

        if ($time != $course->time) {
            $course->time = $time;
        }

        if ($price != $course->price) {
            if($price < $course->price) {
                $course->old_price = $course->price;
            } else {
                $course->old_price = null;
            }
            $course->price = $price;
        }

        if ($date != $course->date) {
            $course->date = $date;
        }

        if ($cityId != $course->city_id) {
            $course->city_id = $cityId;
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
