<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollitikaController extends Controller
{
    public function show()
    {
        return view('politika-konfidencialnosti.index');
    }
}
