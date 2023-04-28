<?php

namespace App\Http\Controllers;

use App\Services\CourseServices;
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

    public function manager()
    {
        $files = Storage::disk('media')->allFiles();
        return view('admin.media.manager', [
            'files' => $files,
        ]);
        $directory = '../storage/app/media';

        if (!isset($_GET['CKEditorFuncNum'])) {
            exit('CKEditorFuncNum is not defined');
        }

// Здесь нужно выполнить любые необходимые операции для выбора файлов с сервера.
// В примере мы просто сканируем директорию "images" и возвращаем список файлов.
        $files = array_diff(scandir($directory), array('..', '.'));
        $images = array();

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                $images[] = array(
                    'url' => $directory . '/' . $file,
                    'thumb' => $directory . '/' . $file,
                    'name' => $file
                );
            }
        }

        echo '<script src="/ckeditor/ckeditor.js"></script>';

// Отправляем список файлов обратно в CKEditor с помощью JavaScript.
        echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $_GET['CKEditorFuncNum'] . ', ' . json_encode($images) . ');</script>';


    }

}
