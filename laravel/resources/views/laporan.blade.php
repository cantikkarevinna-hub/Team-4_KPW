@extends('template.master')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="container-fluid p-0">
  <!-- Header Halaman -->
  <div class="d-flex justify-content-between align-middle align-items-center pb-2 mb-4 border-bottom border-secondary">
    <h2 class="m-0"><i class="bi bi-graph-up me-2"></i> Laporan Penjualan</h2>
    <button class="btn btn-success fw-bold"><i class="bi bi-file-earmark-excel me-1"></i> Ekspor Excel</button>
  </div>

  <!-- Ringkasan Statistik -->
  <div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
      <div class="card p-3 bg-secondary text-white border-0 shadow-sm">
        <h6 class="text-uppercase small text-light mb-1">Total Omzet Bulan Ini</h6>
        <h3 class="fw-bold m-0">Rp 45.000.000</h3>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card p-3 bg-success text-white border-0 shadow-sm">
        <h6 class="text-uppercase small text-light mb-1">Estimasi Keuntungan Bersih</h6>
        <h3 class="fw-bold m-0">Rp 12.500.000</h3>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card p-3 bg-info text-white border-0 shadow-sm">
        <h6 class="text-uppercase small text-light mb-1">Total Item Terjual</h6>
        <h3 class="fw-bold m-0">1.240 Pcs</h3>
      </div>
    </div>
  </div>

  <!-- Daftar Produk Terlaris -->
  <div class="card p-3 border-secondary">
    <h5 class="mb-3"><i class="bi bi-trophy me-2 text-warning"></i> Top 5 Produk Terlaris</h5>
    <ul class="list-group list-group-flush rounded border border-secondary">
      <li class="list-group-item bg-dark text-white border-secondary d-flex justify-content-between align-items-center py-2">
        <span>1. Kopi Susu Aren</span>
        <span class="badge bg-primary rounded-pill">320 Terjual</span>
      </li>
      <li class="list-group-item bg-dark text-white border-secondary d-flex justify-content-between align-items-center py-2">
        <span>2. Es Teh Manis</span>
        <span class="badge bg-primary rounded-pill">210 Terjual</span>
      </li>
      <li class="list-group-item bg-dark text-white border-secondary d-flex justify-content-between align-items-center py-2">
        <span>3. Nasi Goreng Special</span>
        <span class="badge bg-primary rounded-pill">180 Terjual</span>
      </li>
    </ul>
  </div>
</div>
@endsection