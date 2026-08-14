@extends('template.master')

@section('title', 'Transaksi Kasir - POS')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom border-secondary">
  <h2><i class="bi bi-cart3 me-2"></i> Transaksi Kasir (POS)</h2>
</div>

<div class="row g-3">
  <!-- Kolom Kiri: Daftar Produk -->
  <div class="col-md-7">
    <div class="card p-3 mb-3">
      <!-- Input Cari & Filter -->
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white border-secondary"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="Cari nama atau barcode produk...">
      </div>

      <!-- Grid Katalog Produk -->
      <div class="row g-2" style="max-height: 500px; overflow-y: auto;">
        <!-- Card Produk 1 -->
        <div class="col-md-4">
          <div class="card bg-dark border-secondary h-100 text-center p-2">
            <div class="bg-secondary text-white rounded py-4 mb-2">
              <i class="bi bi-cup-hot fs-1"></i>
            </div>
            <h6 class="m-0 text-truncate">Kopi Susu Aren</h6>
            <small class="text-success fw-bold">Rp 18.000</small>
            <button class="btn btn-primary btn-sm mt-2"><i class="bi bi-plus-lg"></i> Tambah</button>
          </div>
        </div>

        <!-- Card Produk 2 -->
        <div class="col-md-4">
          <div class="card bg-dark border-secondary h-100 text-center p-2">
            <div class="bg-secondary text-white rounded py-4 mb-2">
              <i class="bi bi-egg-fried fs-1"></i>
            </div>
            <h6 class="m-0 text-truncate">Nasi Goreng Special</h6>
            <small class="text-success fw-bold">Rp 25.000</small>
            <button class="btn btn-primary btn-sm mt-2"><i class="bi bi-plus-lg"></i> Tambah</button>
          </div>
        </div>

        <!-- Card Produk 3 -->
        <div class="col-md-4">
          <div class="card bg-dark border-secondary h-100 text-center p-2">
            <div class="bg-secondary text-white rounded py-4 mb-2">
              <i class="bi bi-cup-straw fs-1"></i>
            </div>
            <h6 class="m-0 text-truncate">Es Teh Manis</h6>
            <small class="text-success fw-bold">Rp 5.000</small>
            <button class="btn btn-primary btn-sm mt-2"><i class="bi bi-plus-lg"></i> Tambah</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kolom Kanan: Detail Keranjang & Pembayaran -->
  <div class="col-md-5">
    <div class="card p-3">
      <h5 class="border-bottom border-secondary pb-2"><i class="bi bi-receipt me-2"></i> Keranjang Belanja</h5>
      
      <!-- Tabel Ringkasan Pesanan -->
      <table class="table table-dark table-striped align-middle mt-2">
        <thead>
          <tr>
            <th>Item</th>
            <th width="80">Qty</th>
            <th>Total</th>
            <th width="40"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Kopi Susu Aren</td>
            <td><input type="number" class="form-control form-control-sm bg-dark text-white border-secondary" value="2"></td>
            <td>Rp 36.000</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
          <tr>
            <td>Es Teh Manis</td>
            <td><input type="number" class="form-control form-control-sm bg-dark text-white border-secondary" value="1"></td>
            <td>Rp 5.000</td>
            <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>
          </tr>
        </tbody>
      </table>

      <hr class="border-secondary">

      <!-- Total & Bayar -->
      <div class="d-flex justify-content-between fs-5 fw-bold mb-3">
        <span>TOTAL:</span>
        <span class="text-success">Rp 41.000</span>
      </div>

      <div class="mb-3">
        <label class="form-label small text-muted">Jumlah Uang Diterima (Rp)</label>
        <input type="number" class="form-control form-control-lg bg-dark text-white border-secondary" placeholder="50000">
      </div>

      <button class="btn btn-success btn-lg w-100 fw-bold py-3">
        <i class="bi bi-printer me-2"></i> BAYAR & CETAK STRUK
      </button>
    </div>
  </div>
</div>
@endsection