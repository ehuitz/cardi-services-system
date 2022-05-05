<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageUploadController extends Controller
{

    //  public function index()
    // {
    //     return view('file-upload');
    // }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'file' => 'required|mimes:jpeg,png,gif,jpg|max:2048',
                'variety_id'=> 'required|integer',
             ]);
             $name = $request->file('file')->getClientOriginalName();
             $path = $request->file('file')->store('public/images');

             Image::create([
                 'variety_id' => $request->variety_id,
                 'author_id' => auth()->user()->id,
                 'name' => $name,
                 'type' => 'image',
                 'path' => 'storage'.substr($path, 6),
             ]);

             return redirect()->back();
            } catch (\exception $e) {
                return redirect()->back();
            }
    }
}
