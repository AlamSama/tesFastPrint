<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $credentials = $request->validate(
            [
                'name' => ['required'],
                'username' => ['required'],
                'password' => ['required', 'confirmed', 'min:8', 'max:16', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
                'password_confirmation' => ['required'],
            ],
            [
                'name.required' => 'name tidak boleh kosong',
                'username.required' => 'username tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
                'password.min' => 'password minimal 8 karakter',
                'password.max' => 'password maximal 16 karakter',
                'password.regex' => 'password harus memiliki setidaknya 1 huruf kapital, angka, dan simbol',
                'password_confirmation.required' => 'password confirmation tidak boleh kosong',
                'password.confirmed' => 'password dan password confirmation berbeda',
            ]
        );

        $credentials['password'] = Hash::make($request->password);
        $user = User::create($credentials);
        if ($user) {
            return redirect()->route('login')->with('success', 'anda berhasil melakukan registrasi, silahkan login');
        } else {
            return back()->with('error', 'anda gagal melakukan registrasi');
        }
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'username tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'username / password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
