@extends('template.master')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
        <h3 class="m-0 fw-bold text-white">
            <i class="bi bi-box-seam me-2" style="color: #B9D3E2;"></i>
            Tambah Produk Baru
        </h3>
        <a href="{{ url('/produk') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- NOTIFIKASI ERROR -->
    @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-3 mb-4" style="background-color: #dc3545; color: #fff;">
            <ul class="m-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 border-0 rounded-4" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <form action="{{ url('/produk') }}" method="POST">
            @csrf

            <!-- Kode / Barcode -->
            <div class="mb-3">
                <label class="form-label text-white">Kode / Barcode:</label>
                <input type="text" name="kode_barcode" value="{{ old('kode_barcode') }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" placeholder="Contoh: MN-01" required>
            </div>

            <!-- Nama Produk -->
            <div class="mb-3">
                <label class="form-label text-white">Nama Produk:</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" placeholder="Masukkan nama menu" required>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
                <label class="form-label text-white">Kategori:</label>
                <select name="kategori_id" class="form-select" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->getKey() }}" {{ old('kategori_id') == $kategori->getKey() ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Harga Jual -->
            <div class="mb-3">
                <label class="form-label text-white">Harga Jual (Rp):</label>
                <input type="number" name="harga_jual" value="{{ old('harga_jual') }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" placeholder="0" required>
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-4">
                <button type="submit" class="btn fw-bold px-4" style="background-color: #7D0018; color: #ffffff;">
                    <i class="bi bi-save me-1"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection