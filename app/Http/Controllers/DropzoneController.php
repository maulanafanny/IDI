<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    function dropzone()
    {
        return view('dropzone');
    }
    
    function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();

        $image->storeAs('menu', $imageName, [
            'disk' => 'images'
        ]);

        return $imageName;
    }
}
