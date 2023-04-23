<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectionRequest;
use App\Services\DirectionServices;

class DirectionsController extends Controller
{
    public function show(DirectionServices $service)
    {
        return view('admin.directions.index', ['direction' => $service->show()]);
    }

    public function edit(DirectionRequest $request, DirectionServices $service)
    {
        $title = $request->get('title');
        $text = $request->get('text');
        $file = $request->file('image');

        return $service->edit($title, $text, $file);
    }
}
