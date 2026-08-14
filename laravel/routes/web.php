<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Tampilan Halaman Login
Route::get('/', function () {
    if (session()->has('user_login')) {
        return redirect('/dashboard');
    }
    return view('login');
});

Route::get('/login', function () {
    if (session()->has('user_login')) {
        return redirect('/dashboard');
    }
    return view('login');
});

// 2. Proses Verifikasi Login (Username & Password)
Route::post('/login-process', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    // Password sementara untuk testing: admin / 12345
    if ($username === 'admin' && $password === '12345') {
        session(['user_login' => $username]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Username atau Password salah!');
});

// 3. Proses Logout
Route::get('/logout', function () {
    session()->forget('user_login');
    return redirect('/login');
});

// 4. Halaman yang Di-protect (Harus Login Dulu)
Route::get('/dashboard', function () {
    if (!session()->has('user_login')) return redirect('/login');
    return view('dashboard');
});

Route::get('/kasir', function () {
    if (!session()->has('user_login')) return redirect('/login');
    return view('kasir');
});

Route::get('/produk', function () {
    if (!session()->has('user_login')) return redirect('/login');
    return view('produk');
});

Route::get('/riwayat', function () {
    if (!session()->has('user_login')) return redirect('/login');
    return view('riwayat');
});

Route::get('/laporan', function () {
    if (!session()->has('user_login')) return redirect('/login');
    return view('laporan');
});