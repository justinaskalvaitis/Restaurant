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

    public function show($id)
    {
        if(\Auth::user()->id == $id || \Auth::user()->isAdmin())
        {
        $user = User::find($id);
        return view('user.show', compact('user'));
        } else {
            return redirect()->route('dishes.index');
        }
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect()->route('users.index')->with('message', [
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
    if(\Auth::user()->id == $id || \Auth::user()->isAdmin())
    {
        
    $user = User::find($id);
    return view('user.form', compact('user'));
    } else {
        return redirect()->route('dishes.index');
    }
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

}