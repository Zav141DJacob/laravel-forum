<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
//        var_dump(\request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username|max:255|min:3',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|max:255|min:7'
        ]);

//        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

//        session()->flash('success', 'Your account has been created');
//        Auth::
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
