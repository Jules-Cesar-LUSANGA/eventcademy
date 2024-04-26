<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function setLoged(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return to_route('events.index');
        } else {
            return back()->with('error', 'Login failed');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        // Create user with validated data
        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);
        
        event(new Registered($user));

        auth()->login($user);

        return to_route('events.index');    
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();

        return to_route('login');
    }
}   
