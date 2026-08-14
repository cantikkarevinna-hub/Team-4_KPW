<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login-process', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/kasir', function () {
    return view('kasir');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

Route::get('/laporan', function () {
    return view('laporan');
});
