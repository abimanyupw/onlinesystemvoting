<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:4|max:10',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:12',
        ]);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Success');
        
    }
}