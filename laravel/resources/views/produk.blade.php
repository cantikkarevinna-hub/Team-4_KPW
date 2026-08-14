@extends('template.master')

@section('title', 'Kelola Produk')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh; color: #E1E7ED;">
  
  <!-- Header Halaman -->
  <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
    <div>
      <h2 class="fw-bold mb-1 text-white">
        <i class="bi bi-box-seam me-2" style="color: #B9D3E2;"></i> Kelola Data Produk
      </h2>
      <p class="text-muted small mb-0" style="color: #87A4B5 !important;">Manajemen daftar barang, penetapan harga, dan kontrol stok</p>
    </div>
    <button class="btn fw-semibold border-0 px-3 py-2" style="background-color: #7D0018; color: #ffffff;">
      <i class="bi bi-plus-lg me-1"></i> Tambah Produk Baru
    </button>
  </div>

  <!-- Filter & Table Card Container -->
  <div class="card p-4 border-0 shadow-sm rounded-4" style="background-color: #1E222D;">
    
    <!-- Filter Bar -->
    <div class="row g-2 mb-4">
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-text border-0" style="background-color: #121318; color: #87A4B5;">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" class="form-control border-0 py-2" placeholder="Cari nama / kode barcode..." style="background-color: #121318; color: #ffffff;">
        </div>
      </div>
      <div class="col-md-4">
        <select class="form-select border-0 py-2" style="background-color: #121318; color: #B9D3E2;">
          <option value="">Semua Kategori</option>
          <option value="minuman">Minuman</option>
          <option value="makanan">Makanan</option>
        </select>
      </div>
    </div>

    <!-- Tabel Data Produk -->
    <div class="table-responsive">
      <table class="table align-middle m-0" style="background-color: #121318 !important; color: #B9D3E2 !important; border-color: rgba(37, 67, 93, 0.4) !important;">
        <thead>
          <tr style="background-color: #1E222D !important; color: #ffffff !important; border-bottom: 2px solid #25435D;">
            <th class="py-3 ps-3">No</th>
            <th class="py-3">Kode/Barcode</th>
            <th class="py-3">Nama Produk</th>
            <th class="py-3">Kategori</th>
            <th class="py-3">Harga Beli</th>
            <th class="py-3">Harga Jual</th>
            <th class="py-3">Stok</th>
            <th class="py-3 text-center pe-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Baris 1 -->
          <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
            <td class="py-3 ps-3" style="color: #87A4B5;">1</td>
            <td class="py-3">
              <span class="badge font-monospace px-2 py-1" style="background-color: #1E222D; color: #B9D3E2; border: 1px solid #25435D;">BRG-001</span>
            </td>
            <td class="py-3 fw-semibold text-white">Kopi Susu Aren</td>
            <td class="py-3">
              <span class="badge rounded-pill px-3 py-1.5" style="background-color: rgba(82, 214, 138, 0.15); color: #52D68A; border: 1px solid #52D68A;">Minuman</span>
            </td>
            <td class="py-3" style="color: #87A4B5;">Rp 10.000</td>
            <td class="py-3 fw-bold" style="color: #B9D3E2;">Rp 18.000</td>
            <td class="py-3">
              <span class="badge px-3 py-1.5" style="background-color: #1E222D; color: #B9D3E2;">45 Unit</span>
            </td>
            <td class="py-3 text-center pe-3">
              <div class="btn-group">
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #121318; color: #B9D3E2;"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm rounded-2 border-0" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B;"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>

          <!-- Baris 2 -->
          <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
            <td class="py-3 ps-3" style="color: #87A4B5;">2</td>
            <td class="py-3">
              <span class="badge font-monospace px-2 py-1" style="background-color: #1E222D; color: #B9D3E2; border: 1px solid #25435D;">BRG-002</span>
            </td>
            <td class="py-3 fw-semibold text-white">Nasi Goreng Spesial</td>
            <td class="py-3">
              <span class="badge rounded-pill px-3 py-1.5" style="background-color: rgba(255, 193, 7, 0.15); color: #FFC107; border: 1px solid #FFC107;">Makanan</span>
            </td>
            <td class="py-3" style="color: #87A4B5;">Rp 15.000</td>
            <td class="py-3 fw-bold" style="color: #B9D3E2;">Rp 25.000</td>
            <td class="py-3">
              <span class="badge px-3 py-1.5" style="background-color: rgba(255, 107, 107, 0.15); color: #FF6B6B; border: 1px solid #FF6B6B;">
                <i class="bi bi-exclamation-circle me-1"></i> 4 Unit
              </span>
            </td>
            <td class="py-3 text-center pe-3">
              <div class="btn-group">
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #121318; color: #B9D3E2;"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm rounded-2 border-0" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B;"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination Footer -->
    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top" style="border-color: #25435D !important;">
      <small style="color: #87A4B5;">Menampilkan 1 - 2 dari 2 data produk</small>
      <ul class="pagination pagination-sm m-0">
        <li class="page-item disabled"><a class="page-link border-0" style="background-color: #121318; color: #87A4B5;">Prev</a></li>
        <li class="page-item active"><a class="page-link border-0 text-white" style="background-color: #7D0018;">1</a></li>
        <li class="page-item disabled"><a class="page-link border-0" style="background-color: #121318; color: #87A4B5;">Next</a></li>
      </ul>
    </div>

  </div>

</div>
@endsection
