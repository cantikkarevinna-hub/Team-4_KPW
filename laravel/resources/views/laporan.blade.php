@extends('template.master')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh; color: #E1E7ED;">
  
  <!-- Header Halaman -->
  <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
    <div>
      <h2 class="fw-bold mb-1 text-white">
        <i class="bi bi-graph-up-arrow me-2" style="color: #B9D3E2;"></i> Laporan Penjualan
      </h2>
      <p class="text-muted small mb-0" style="color: #87A4B5 !important;">Ringkasan performa penjualan dan metode pembayaran</p>
    </div>
    <button class="btn fw-semibold border-0 px-3 py-2" style="background-color: #7D0018; color: #ffffff;">
      <i class="bi bi-download me-1"></i> Export Laporan
    </button>
  </div>

  <div class="row g-4 mb-4">
    <!-- Top Produk Terlaris -->
    <div class="col-lg-7">
      <div class="card p-4 border-0 shadow-sm rounded-4 h-100" style="background-color: #1E222D;">
        <h5 class="fw-bold text-white mb-3">
          <i class="bi bi-trophy me-2" style="color: #FFC107;"></i> Top Produk Terlaris
        </h5>
        
        <div class="table-responsive">
          <table class="table align-middle m-0" style="background-color: #121318 !important; color: #B9D3E2 !important; border-color: rgba(37, 67, 93, 0.4) !important;">
            <thead>
              <tr style="background-color: #1E222D !important; color: #ffffff !important; border-bottom: 2px solid #25435D;">
                <th class="py-3 ps-3">Produk</th>
                <th class="py-3 text-center">Qty Terjual</th>
                <th class="py-3 pe-3 text-end">Total Nominal</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
                <td class="py-3 ps-3 fw-semibold text-white">Kopi Susu Aren</td>
                <td class="py-3 text-center" style="color: #87A4B5;">120 Pcs</td>
                <td class="py-3 pe-3 text-end fw-bold" style="color: #B9D3E2;">Rp 1.800.000</td>
              </tr>
              <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
                <td class="py-3 ps-3 fw-semibold text-white">Nasi Goreng Spesial</td>
                <td class="py-3 text-center" style="color: #87A4B5;">85 Pcs</td>
                <td class="py-3 pe-3 text-end fw-bold" style="color: #B9D3E2;">Rp 935.000</td>
              </tr>
              <tr>
                <td class="py-3 ps-3 fw-semibold text-white">Es Teh Manis</td>
                <td class="py-3 text-center" style="color: #87A4B5;">64 Pcs</td>
                <td class="py-3 pe-3 text-end fw-bold" style="color: #B9D3E2;">Rp 832.000</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Breakdown Metode Pembayaran -->
    <div class="col-lg-5">
      <div class="card p-4 border-0 shadow-sm rounded-4 h-100" style="background-color: #1E222D;">
        <h5 class="fw-bold text-white mb-3">
          <i class="bi bi-pie-chart me-2" style="color: #B9D3E2;"></i> Metode Pembayaran
        </h5>

        <div class="d-flex flex-column gap-3">
          <!-- Tunai -->
          <div class="p-3 rounded-3" style="background-color: #121318; border: 1px solid #25435D;">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold text-white"><i class="bi bi-cash me-2 text-success"></i> Tunai / Cash</span>
              <span class="fw-bold" style="color: #B9D3E2;">Rp 7.200.000 (56%)</span>
            </div>
            <div class="progress" style="height: 6px; background-color: #1E222D;">
              <div class="progress-bar bg-success" style="width: 56%;"></div>
            </div>
          </div>

          <!-- QRIS -->
          <div class="p-3 rounded-3" style="background-color: #121318; border: 1px solid #25435D;">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold text-white"><i class="bi bi-qr-code me-2 text-info"></i> QRIS / E-Wallet</span>
              <span class="fw-bold" style="color: #B9D3E2;">Rp 4.350.000 (34%)</span>
            </div>
            <div class="progress" style="height: 6px; background-color: #1E222D;">
              <div class="progress-bar bg-info" style="width: 34%;"></div>
            </div>
          </div>

          <!-- Kartu Debit -->
          <div class="p-3 rounded-3" style="background-color: #121318; border: 1px solid #25435D;">
            <div class="d-flex justify-content-between mb-1">
              <span class="fw-semibold text-white"><i class="bi bi-credit-card me-2 text-warning"></i> Kartu Debit</span>
              <span class="fw-bold" style="color: #B9D3E2;">Rp 1.300.000 (10%)</span>
            </div>
            <div class="progress" style="height: 6px; background-color: #1E222D;">
              <div class="progress-bar bg-warning" style="width: 10%;"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Rekap Penjualan Harian -->
  <div class="card p-4 border-0 shadow-sm rounded-4" style="background-color: #1E222D;">
    <h5 class="fw-bold text-white mb-3">
      <i class="bi bi-calendar-check me-2" style="color: #B9D3E2;"></i> Rekap Penjualan Harian
    </h5>

    <div class="table-responsive">
      <table class="table align-middle m-0" style="background-color: #121318 !important; color: #B9D3E2 !important; border-color: rgba(37, 67, 93, 0.4) !important;">
        <thead>
          <tr style="background-color: #1E222D !important; color: #ffffff !important; border-bottom: 2px solid #25435D;">
            <th class="py-3 ps-3">Tanggal</th>
            <th class="py-3 text-center">Jumlah Transaksi</th>
            <th class="py-3 text-center">Produk Terjual</th>
            <th class="py-3 pe-3 text-end">Total Omzet Harian</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
            <td class="py-3 ps-3 fw-semibold text-white">14 Aug 2026</td>
            <td class="py-3 text-center" style="color: #87A4B5;">28 Nota</td>
            <td class="py-3 text-center" style="color: #87A4B5;">62 Items</td>
            <td class="py-3 pe-3 text-end fw-bold" style="color: #B9D3E2;">Rp 1.950.000</td>
          </tr>
          <tr>
            <td class="py-3 ps-3 fw-semibold text-white">13 Aug 2026</td>
            <td class="py-3 text-center" style="color: #87A4B5;">32 Nota</td>
            <td class="py-3 text-center" style="color: #87A4B5;">78 Items</td>
            <td class="py-3 pe-3 text-end fw-bold" style="color: #B9D3E2;">Rp 2.300.000</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection
