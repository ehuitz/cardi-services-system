<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{

    //  public function index()
    // {
    //     return view('file-upload');
    // }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpeg,png|max:2048',
                'type' => 'required|string',
                'ticket_id'=> 'required|integer',
             ]);
             $name = $request->file('file')->getClientOriginalName();
             $path = $request->file('file')->store('public/files');

             File::create([
                 'ticket_id' => $request->ticket_id,
                 'author_id' => auth()->user()->id,
                 'name' => $name,
                 'type'=> $request->type,
                 'path' => 'storage'.substr($path, 6),
             ]);

             return redirect()->back();
            } catch (\exception $e) {
                return response()->json(['msg' => 'Error sending message'], 406);
            }
    }
}
