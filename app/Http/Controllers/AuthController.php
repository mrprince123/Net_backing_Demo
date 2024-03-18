<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('Pages.home');
        }
    }

    public function viewLogin()
    {
        return view('Auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required',Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        if (Auth::attempt($request->only('email', 'password'))) {
            return view('Pages.home');
        }

        return view('Pages.home');
    }

    public function viewRegister()
    {
        return view('Auth.register');
    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('');
    }
}
