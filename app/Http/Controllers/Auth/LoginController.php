<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $user = User::where('email', $request->email)
            ->first();


        if ($user) {
            if (password_verify($request->password, $user->password)) {

                Auth::login($user);
                return redirect('/dashboard');
            } else {
                return redirect('/login')->with('fail', 'Password yang anda masukan salah');
            }
        } else {
            return redirect('/login')->with('fail', 'Username yang anda masukan salah');
        }
        // if (Auth::attempt($request->only('username', 'password'))) {
        //     return redirect('/kasir');
        // }
        // return redirect('/login-biasa')->with('fail', 'Username atau password anda salah');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
