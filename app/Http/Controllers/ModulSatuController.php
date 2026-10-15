<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Nasabah;

class ModulSatuController extends Controller
{
    // form login
    public function index()
    {
        return view('auth.login'); // sesuaikan nama view(login.blade.php)
    }

    // submit login
    public function login(Request $request)
    {
        // 1. validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. cek username dan password ke tabel petugas
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // login berhasil -> arahkan ke dashboard
            return redirect()->intended('/dashboard');
        }

        // 3. login gagal -> kembalikan dengan pesan error
        return back()->withErrors([
            'error' => 'Username atau password salah',
        ])->onlyInput('username');
    }

    // proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/modul-1');
    }

    // dashboard
    public function dashboard()
    {
        // Data dari database
        $totalNasabah = Nasabah::count();
        $nasabahAktif = Nasabah::where('status', 'aktif')->count();

        // Belum ada tabel transaksi/sampah/saldo, tampilkan 0
        $totalTransaksi = 0;
        $totalSampah = 0;
        $totalSaldo = 0;

        // 5 nasabah terbaru untuk tabel
        $nasabahTerbaru = Nasabah::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalNasabah',
            'nasabahAktif',
            'totalTransaksi',
            'totalSampah',
            'totalSaldo',
            'nasabahTerbaru'
        ));
    }
}