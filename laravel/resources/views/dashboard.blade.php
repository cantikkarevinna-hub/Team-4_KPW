@extends('template.master')

@section('title', 'Dashboard - POS Kasir')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">

  <!-- Header Dashboard -->
  <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
    <h3 class="m-0 fw-bold" style="color: #ffffff;">
      <i class="bi bi-speedometer2 me-2" style="color: #B9D3E2;"></i> Dashboard Ringkasan
    </h3>
    <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i> {{ date('d M Y') }}</span>
  </div>

  <!-- Ringkasan Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card p-3 border-0 rounded-3" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small" style="color: #87A4B5;">Total Penjualan</div>
            <h4 class="fw-bold m-0 mt-1" style="color: #ffffff;">Rp 1.450.000</h4>
          </div>
          <div class="p-3 rounded-3" style="background-color: rgba(13, 110, 253, 0.1); color: #0d6efd;">
            <i class="bi bi-currency-dollar fs-3"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 border-0 rounded-3" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small" style="color: #87A4B5;">Total Transaksi</div>
            <h4 class="fw-bold m-0 mt-1" style="color: #ffffff;">48 Transaksi</h4>
          </div>
          <div class="p-3 rounded-3" style="background-color: rgba(25, 135, 84, 0.1); color: #198754;">
            <i class="bi bi-cart-check fs-3"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 border-0 rounded-3" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small" style="color: #87A4B5;">Total Produk</div>
            <h4 class="fw-bold m-0 mt-1" style="color: #ffffff;">120 Item</h4>
          </div>
          <div class="p-3 rounded-3" style="background-color: rgba(255, 193, 7, 0.1); color: #ffc107;">
            <i class="bi bi-box-seam fs-3"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 border-0 rounded-3" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small" style="color: #87A4B5;">Pelanggan</div>
            <h4 class="fw-bold m-0 mt-1" style="color: #ffffff;">32 Orang</h4>
          </div>
          <div class="p-3 rounded-3" style="background-color: rgba(13, 202, 240, 0.1); color: #0dcaf0;">
            <i class="bi bi-people fs-3"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Aksi Cepat / Shortcut ke Kasir -->
  <div class="card p-4 border-0 rounded-4 text-center" style="background-color: #1E222D; border: 1px solid #25435D !important;">
    <h5 class="fw-bold mb-2" style="color: #ffffff;">Mulai Transaksi Penjualan</h5>
    <p class="small mb-3" style="color: #87A4B5;">Klik tombol di bawah ini untuk membuka Terminal Kasir POS.</p>
    <div>
      <a href="/kasir" class="btn btn-lg px-4 fw-bold border-0" style="background-color: #7D0018; color: #ffffff;">
        <i class="bi bi-cart3 me-2"></i> Buka Terminal Kasir
      </a>
    </div>
  </div>

</div>
@endsection
