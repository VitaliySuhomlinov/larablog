<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        /* User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123'
        ]); */
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.main.index');
            } else {
                return redirect()->route('home');
            }
            
        } else {
            return redirect()->back()->with('error', 'Incorrect email or password');
        }
    }
}
