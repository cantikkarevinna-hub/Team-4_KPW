@extends('template.master')

@section('title', 'Transaksi Kasir')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">

  <!-- Header POS -->
  <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom" style="border-color: #25435D !important;">
    <h3 class="m-0 fw-bold" style="color: #ffffff;">
      <i class="bi bi-cart3 me-2" style="color: #B9D3E2;"></i> Terminal Kasir
    </h3>
    <span class="badge bg-success bg-opacity-20 text-success border border-success px-3 py-2 rounded-pill">
      <i class="bi bi-circle-fill fs-6 me-1" style="font-size: 8px !important;"></i> Kasir Active
    </span>
  </div>

  <div class="row g-3">
    <!-- KOLOM KIRI: Katalog & Pencarian -->
    <div class="col-lg-7 col-xl-7">
      <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color: #1E222D;">
        
        <!-- Search & Filter Tab -->
        <div class="row g-2 mb-3">
          <div class="col-md-7">
            <div class="input-group">
              <span class="input-group-text border-0" style="background-color: #121318; color: #87A4B5;">
                <i class="bi bi-search"></i>
              </span>
              <input type="text" class="form-control border-0 shadow-none py-2" style="background-color: #121318; color: #ffffff;" placeholder="Cari barang / scan barcode...">
            </div>
          </div>
          <div class="col-md-5">
            <select class="form-select border-0 py-2" style="background-color: #121318; color: #B9D3E2;">
              <option value="">Semua Kategori</option>
              <option value="minuman">Minuman</option>
              <option value="makanan">Makanan</option>
              <option value="snack">Cemilan</option>
            </select>
          </div>
        </div>

        <!-- Grid Katalog Produk -->
        <div class="row g-2 overflow-auto custom-scroll" style="max-height: 580px;">
          
          <!-- Produk Card Item 1: Kopi Susu Aren -->
          <div class="col-6 col-md-4 col-xl-4">
            <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover" style="background-color: #121318; border: 1px solid #25435D !important;">
              <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center" style="background-color: rgba(76, 108, 129, 0.1);">
                <img src="{{ asset('images/kopi-aren.png') }}" alt="Kopi Susu Aren" class="img-fluid" style="height: 80px; object-fit: contain;">
              </div>
              <h6 class="mb-1 text-truncate fw-semibold" style="color: #ffffff;">Kopi Susu Aren</h6>
              <div class="small fw-bold mb-2" style="color: #B9D3E2;">Rp 18.000</div>
              <button class="btn btn-sm w-100 fw-semibold border-0 py-1" style="background-color: #7D0018; color: #ffffff;">
                <i class="bi bi-plus-lg"></i> Tambah
              </button>
            </div>
          </div>

          <!-- Produk Card Item 2: Nasi Goreng Special -->
          <div class="col-6 col-md-4 col-xl-4">
            <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover" style="background-color: #121318; border: 1px solid #25435D !important;">
              <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center" style="background-color: rgba(76, 108, 129, 0.1);">
                <img src="{{ asset('images/nasgor-spesial.png') }}" alt="Nasi Goreng Special" class="img-fluid" style="height: 80px; object-fit: contain;">
              </div>
              <h6 class="mb-1 text-truncate fw-semibold" style="color: #ffffff;">Nasi Goreng Special</h6>
              <div class="small fw-bold mb-2" style="color: #B9D3E2;">Rp 25.000</div>
              <button class="btn btn-sm w-100 fw-semibold border-0 py-1" style="background-color: #7D0018; color: #ffffff;">
                <i class="bi bi-plus-lg"></i> Tambah
              </button>
            </div>
          </div>

          <!-- Produk Card Item 3: Es Teh Manis -->
          <div class="col-6 col-md-4 col-xl-4">
            <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover" style="background-color: #121318; border: 1px solid #25435D !important;">
              <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center" style="background-color: rgba(76, 108, 129, 0.1);">
                <img src="{{ asset('images/es-teh.png') }}" alt="Es Teh Manis" class="img-fluid" style="height: 80px; object-fit: contain;">
              </div>
              <h6 class="mb-1 text-truncate fw-semibold" style="color: #ffffff;">Es Teh Manis</h6>
              <div class="small fw-bold mb-2" style="color: #B9D3E2;">Rp 5.000</div>
              <button class="btn btn-sm w-100 fw-semibold border-0 py-1" style="background-color: #7D0018; color: #ffffff;">
                <i class="bi bi-plus-lg"></i> Tambah
              </button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- KOLOM KANAN: Keranjang & Pembayaran -->
    <div class="col-lg-5 col-xl-5">
      <div class="card p-3 border-0 shadow-sm rounded-4 h-100 d-flex flex-column justify-content-between" style="background-color: #1E222D;">
        <div>
          <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom" style="border-color: #25435D !important;">
            <h5 class="m-0 fw-bold" style="color: #ffffff;">
              <i class="bi bi-receipt me-2" style="color: #B9D3E2;"></i> Keranjang Belanja
            </h5>
            <button class="btn btn-sm text-danger p-0 border-0"><i class="bi bi-trash"></i> Kosongkan</button>
          </div>

          <!-- Item Table (Dibuat Rapi & Tidak Melipat Teks) -->
          <div class="overflow-auto mb-3 custom-scroll" style="max-height: 260px;">
            <table class="table table-borderless align-middle text-white m-0 text-nowrap">
              <tbody style="border-color: #25435D;">
                <tr class="border-bottom" style="border-color: rgba(37, 67, 93, 0.5) !important;">
                  <td class="ps-0 py-2">
                    <div class="fw-semibold text-white small">Kopi Susu Aren</div>
                    <small style="color: #87A4B5; font-size: 11px;">@ Rp 18.000</small>
                  </td>
                  <td width="55" class="px-1">
                    <input type="number" class="form-control form-control-sm text-center border-0 fw-bold px-1 py-1" style="background-color: #121318; color: #ffffff;" value="2">
                  </td>
                  <td class="text-end fw-bold px-1 small" style="color: #B9D3E2;">Rp 36.000</td>
                  <td width="20" class="pe-0 text-end">
                    <button class="btn btn-sm text-danger p-0 border-0"><i class="bi bi-x-circle"></i></button>
                  </td>
                </tr>

                <tr class="border-bottom" style="border-color: rgba(37, 67, 93, 0.5) !important;">
                  <td class="ps-0 py-2">
                    <div class="fw-semibold text-white small">Es Teh Manis</div>
                    <small style="color: #87A4B5; font-size: 11px;">@ Rp 5.000</small>
                  </td>
                  <td width="55" class="px-1">
                    <input type="number" class="form-control form-control-sm text-center border-0 fw-bold px-1 py-1" style="background-color: #121318; color: #ffffff;" value="1">
                  </td>
                  <td class="text-end fw-bold px-1 small" style="color: #B9D3E2;">Rp 5.000</td>
                  <td width="20" class="pe-0 text-end">
                    <button class="btn btn-sm text-danger p-0 border-0"><i class="bi bi-x-circle"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section Totals & Payment -->
        <div class="pt-2 border-top" style="border-color: #25435D !important;">
          <!-- Metode Pembayaran -->
          <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #87A4B5;">Metode Pembayaran</label>
            <div class="row g-2">
              <div class="col-4">
                <input type="radio" class="btn-check" name="pay_method" id="pay_cash" checked>
                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_cash"><i class="bi bi-cash me-1"></i> Cash</label>
              </div>
              <div class="col-4">
                <input type="radio" class="btn-check" name="pay_method" id="pay_qris">
                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_qris"><i class="bi bi-qr-code me-1"></i> QRIS</label>
              </div>
              <div class="col-4">
                <input type="radio" class="btn-check" name="pay_method" id="pay_debit">
                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_debit"><i class="bi bi-credit-card me-1"></i> Debit</label>
              </div>
            </div>
          </div>

          <!-- Display Subtotal & Grand Total -->
          <div class="p-3 rounded-3 mb-3" style="background-color: #121318; border: 1px solid #25435D;">
            <div class="d-flex justify-content-between mb-1 small" style="color: #87A4B5;">
              <span>Subtotal</span>
              <span>Rp 41.000</span>
            </div>
            <div class="d-flex justify-content-between align-items-center fs-4 fw-bold">
              <span style="color: #87A4B5;">TOTAL</span>
              <span style="color: #B9D3E2;">Rp 41.000</span>
            </div>
          </div>

          <!-- Cash Input -->
          <div class="mb-3">
            <label class="form-label small fw-semibold" style="color: #87A4B5;">Bayar (Rp)</label>
            <input type="number" class="form-control form-control-lg border-0 fw-bold fs-4 text-end" style="background-color: #121318; color: #52D68A;" placeholder="0">
          </div>

          <!-- Action Button -->
          <button class="btn btn-lg w-100 fw-bold py-3 border-0 shadow" style="background-color: #7D0018; color: #ffffff;">
            <i class="bi bi-printer me-2"></i> BAYAR & CETAK STRUK
          </button>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
