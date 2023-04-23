<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\poster;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostersController extends Controller
{
    public function show(Request $request)
    {
        $total = Poster::count();
        $search = $request->get('search');
        if (empty($search)) {
            $posters = Poster::paginate(10);
        } else {
            $posters = Poster::where('name', 'LIKE', '%' . $search . '%')->paginate(10);
            $posters->appends(request()->input())->links();
        }
        return view('admin.posters.index', ['posters' => $posters, 'total' => $total]);
    }
    public function showAddPoster(Request $request)
    {
        return view('admin.posters.add.index');
    }
    public function showEditPoster(Request $request, $id)
    {
        $poster = Poster::find($id);

        return view('admin.posters.edit.index', ['poster' => $poster]);
    }
    public function delete(Request $request)
    {
        $posterId = $request->get('id');
        $poster = Poster::find($posterId);
        $poster->delete();
    }
    public function addPoster(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ]);
        $title = $request->get('title');
        $image = $request->file('image');
        $poster = Poster::insertGetId([
            'name' => $title,
            'img' =>  Str::slug($title),
        ]);
        Storage::makeDirectory('/public/images/posters/' . $poster);
        $loadImg = Image::make($image)->encode('webp', 75);
        $loadImg->save(Storage::path('/public/images/posters/' . $poster . "/" .  Str::slug($title) . '.webp'));
        if ($poster && $loadImg) {
            return response()->json(['url' => route('admin.posters')]);
        }
    }
    public function editPoster(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|',
        ]);
        $title = $request->get('title');
        $image = $request->file('image');
        $poster = Poster::find($id);
        if ($title != $poster->name) {
            $poster->name = $title;
            $nameImg = Str::slug($title);
        } else {
            $nameImg = Str::slug($poster->name);
        }
        if (empty($image)) {
            if ($nameImg != $poster->img) {
                Storage::move('public/images/posters/' . $poster->id . '/' . $poster->img . '.webp', 'public/images/posters/' . $poster->id . '/' . str_slug($title) . '.webp');
                $poster->img = $nameImg;
            }
        } else {
            if ($nameImg != $poster->img) {
                Storage::delete('public/images/posters/' . $poster->id . '/' . $poster->img . '.webp');
            }
            Image::make($image)->encode('webp', 75)->save(storage_path() . '/app/public/images/posters/' . $poster->id . "/" .  $nameImg . '.webp');
            $poster->img = $nameImg;
        }
        $poster->save();
        return response()->json(['url' => route('admin.posters')]);
    }
}
