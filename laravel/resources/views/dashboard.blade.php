@extends('template.master')

@section('title', 'Dashboard Kasir')

@section('content')
  <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom border-secondary">
    <h2>Dashboard Penjualan</h2>
  </div>

  <!-- Kartu Statistik Dark Mode -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card bg-primary text-white p-3 shadow-sm">
        <h6 class="text-uppercase small">Total Penjualan</h6>
        <h3 class="m-0">Rp 2.500.000</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-success text-white p-3 shadow-sm">
        <h6 class="text-uppercase small">Transaksi Hari Ini</h6>
        <h3 class="m-0">15 Transaksi</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-warning text-dark p-3 shadow-sm">
        <h6 class="text-uppercase small">Stok Menipis</h6>
        <h3 class="m-0">4 Barang</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-danger text-white p-3 shadow-sm">
        <h6 class="text-uppercase small">Produk Terlaris</h6>
        <h3 class="m-0">Kopi Susu</h3>
      </div>
    </div>
  </div>

  <!-- Box Area Grafik / Informasi tambahan -->
  <div class="card p-4">
    <h5><i class="bi bi-bar-chart-fill me-2"></i> Ringkasan Mingguan</h5>
    <p class="text-muted mb-0">Area grafik penjualan akan dirender di sini saat terhubung dengan database.</p>
  </div>
@endsection