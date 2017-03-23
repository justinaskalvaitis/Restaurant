<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = \Auth::user();
        $title = 'Update profile';
        return view('auth.register', compact('user', 'title'));
    }

    public function update(Request $request)
    {
        $user = \Auth::user();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->dateofbirth = $request->dateofbirth;
        $user->phonenumber = $request->phonenumber;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->save();

        return redirect()->route('dishes.index')->with('message', [
            'text' => 'Profile updated!',
            'type' => 'success'
        ]);
    }
}