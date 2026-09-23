<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulSatuController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view('modul-1'); // Pastikan nama view sesuai (login.blade.php)
    }

    // Memproses submit login
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Cek username dan password ke tabel petugas
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // Login berhasil -> arahkan ke dashboard
            return redirect()->intended('/dashboard');
        }

        // 3. Login gagal -> kembalikan dengan pesan error
        return back()->withErrors([
            'error' => 'Username atau password salah',
        ])->onlyInput('username');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/modul-1');
    }

    // Menampilkan Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }
}