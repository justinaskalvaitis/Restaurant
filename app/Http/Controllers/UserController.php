<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function profile()
    {
        $user = \Auth::user();
        $title = 'Update profile';
        return view('auth.register', compact('user', 'title'));
    }



    public function show(user $user)
    {
        return view('user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        

        return redirect()->route('dishes.index')->with('message', [
            'text' => 'Profile updated!',
            'type' => 'success'
        ]);
    }

    public function index()
    {
        $users = user::all();
        return view('user.index', compact('users'));
    }

    

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.form', compact('user'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

    
}