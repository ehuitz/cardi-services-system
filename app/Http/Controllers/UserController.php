<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    //  public function index()
    // {
    //     return view('file-upload');
    // }

    public function show(User $user)
    {


        $user = User::find(auth()->user()->id);

        return view('users.profile', compact('user'));

    }



    public function updateProfile(Request $request)
    {

        try {
            $request->validate([
                'file' => 'required|mimes:jpeg,png,gif,jpg|max:2048',
             ]);
             $name = $request->file('file')->getClientOriginalName();
             $path = $request->file('file')->store('public/users');

             $reset= '';

                // Find the storage and update the number
                $user = User::find(auth()->user()->id);
                $user->path = 'storage'.substr($path, 6);

                $user->save();

             return redirect()->back();
            } catch (\exception $e) {
                return redirect()->back();
            }


    }
}
