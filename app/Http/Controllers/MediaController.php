<?php

namespace App\Http\Controllers;

use App\Services\MediaServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MediaController extends Controller
{

    public function get($media, MediaServices $service)
    {
        $media = $service->get($media);
        if (empty($media)) {
            abort(404);
        }
        $path = Storage::disk('media')->path($media->hash);
        return response()->file(
            $path,
            [
                'Content-Type' => $media->mimeType,
                'Content-Length' => $media->size,
            ]
        );
    }

    public function upload(Request $request, MediaServices $service)
    {
        $res = $service->upload($request->file('upload'));

        if (is_null($res)) {
            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => 'Error upload',
                ]
            ]);
        }

        return response()->json([
            'uploaded' => 1,
            'fileName' => $res->caption,
            'url' => '/private/media/' . $res->caption,
        ]);
    }

    public function manager(Request $request, MediaServices $services)
    {
        $files = $services->list();
        return view('admin.media.manager', [
            'CKEditorFuncNum' => $request->get('CKEditorFuncNum', 1),
            'files' => $files,
        ]);
    }

}
