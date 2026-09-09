<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// --- RUTE AUTENTIKASI & HALAMAN UTAMA ---

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login-process', function () {
    return redirect('/dashboard');
});

// --- RUTE DASHBOARD ---
Route::get('/dashboard', function () {
    $totalPenjualan = 0;
    try {
        $totalPenjualan = Penjualan::sum('total') ?? 0;
    } catch (\Exception $e) {
        $totalPenjualan = 0;
    }

    $transaksiHariIni = 0;
    try {
        $transaksiHariIni = Penjualan::whereDate('created_at', Carbon::today())->count();
    } catch (\Exception $e) {
        $transaksiHariIni = 0;
    }

    $totalMenu = 0;
    try {
        $totalMenu = Barang::count();
    } catch (\Exception $e) {
        $totalMenu = 0;
    }

    $produkTerlaris = '-';
    try {
        $produkTerlarisData = DetailPenjualan::select('barang_id', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('barang_id')
            ->orderByDesc('total_qty')
            ->first();

        if ($produkTerlarisData && $produkTerlarisData->barang) {
            $produkTerlaris = $produkTerlarisData->barang->nama_barang;
        }
    } catch (\Exception $e) {
        $produkTerlaris = '-';
    }

    return view('dashboard', compact('totalPenjualan', 'transaksiHariIni', 'totalMenu', 'produkTerlaris'));
});

// --- RUTE PRODUK ---
Route::get('/produk', [BarangController::class, 'index']);
Route::get('/produk/create', [BarangController::class, 'create']);
Route::post('/produk', [BarangController::class, 'store']);
Route::get('/produk/{id}/edit', [BarangController::class, 'edit']);
Route::put('/produk/{id}', [BarangController::class, 'update']);
Route::delete('/produk/{id}', [BarangController::class, 'destroy']);

// --- RUTE KASIR & RIWAYAT ---
Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir/transaksi', [KasirController::class, 'store']);

// MENGARAHKAN HALAMAN RIWAYAT KE METHOD RIWAYAT DI KASIRCONTROLLER
Route::get('/riwayat', [KasirController::class, 'riwayat']);

Route::get('/laporan', function () {
    return view('laporan');
});

// --- RUTE CRUD DATA MASTER ---
Route::resource('kategori', KategoriController::class);