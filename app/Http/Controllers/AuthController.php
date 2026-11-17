<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerProses()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login');
    }

    public function showformlogin()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
             $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin');
            }

            if ($user->role == 'creator') {
                return redirect()->route('creator.dashboard');
            }

            if ($user->role == 'customer') {
                return redirect()->route('customer.dashboard');
            }

            Auth::logout();

            return redirect('/login')->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ]);
    }

        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
         ]);

    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('/admin');
        }

        if ($user->role == 'creator') {
            return redirect()->route('creator.dashboard');
        }

        if ($user->role == 'customer') {
            return redirect()->route('customer.dashboard');
        }

        Auth::logout();
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
