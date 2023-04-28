<?php

namespace App\Http\Controllers;

use App\Services\CourseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MediaController extends Controller
{


    public function upload(Request $request)
    {
        try {
            $file = $request->file('upload');
            $name = bin2hex(random_bytes(5)) . '_' . $file->getClientOriginalName();
            Storage::disk('media')
                ->putFileAs(
                    '/',
                    $file,
                    $name
                );
        } catch (\Exception $e) {
            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => $e->getMessage(),
                ]
            ]);
        }
        
        return response()->json([
            'uploaded' => 1,
            'fileName' => $name,
            'url' => env('APP_URL') . '/media/' . $name,
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
        echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$_GET['CKEditorFuncNum'].', '.json_encode($images).');</script>';


    }

}
