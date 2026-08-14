@extends('template.master')

@section('title', 'Kelola Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom border-secondary">
  <h2><i class="bi bi-box-seam me-2"></i> Kelola Data Produk</h2>
  <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Produk</button>
</div>

<div class="card p-3">
  <!-- Table Data Produk -->
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
      <thead>
        <tr>
          <th width="50">No</th>
          <th>Kode/Barcode</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Stok</th>
          <th width="120">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><code>BRG-001</code></td>
          <td>Kopi Susu Aren</td>
          <td>Minuman</td>
          <td>Rp 10.000</td>
          <td>Rp 18.000</td>
          <td><span class="badge bg-success">45</span></td>
          <td>
            <button class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><code>BRG-002</code></td>
          <td>Nasi Goreng Special</td>
          <td>Makanan</td>
          <td>Rp 15.000</td>
          <td>Rp 25.000</td>
          <td><span class="badge bg-danger">4 (Stok Rendah)</span></td>
          <td>
            <button class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection