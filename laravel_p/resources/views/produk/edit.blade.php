@extends('template.master')

@section('title', 'Edit Produk')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
        <h3 class="m-0 fw-bold text-white">
            <i class="bi bi-pencil-square me-2" style="color: #B9D3E2;"></i>
            Edit Data Produk
        </h3>
        <a href="{{ url('/produk') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- PESAN ERROR VALIDASI -->
    @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-3 mb-4" style="background-color: #dc3545; color: #fff;">
            <ul class="m-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php $barangId = $barang->id_barang ?? $barang->id; @endphp

    <div class="card p-4 border-0 rounded-4" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <form action="{{ url('/produk/' . $barangId) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Kode / Barcode -->
            <div class="mb-3">
                <label class="form-label text-white">Kode / Barcode:</label>
                <input type="text" name="kode_barcode" value="{{ old('kode_barcode', $barang->kode_barcode) }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
            </div>

            <!-- Nama Produk -->
            <div class="mb-3">
                <label class="form-label text-white">Nama Produk:</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
                <label class="form-label text-white">Kategori:</label>
                <select name="kategori_id" class="form-select" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        @php $katId = $kategori->id_kategori ?? $kategori->id; @endphp
                        <option value="{{ $katId }}" {{ old('kategori_id', $barang->id_kategori) == $katId ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Harga Jual -->
            <div class="mb-3">
                <label class="form-label text-white">Harga Jual (Rp):</label>
                <input type="number" name="harga_jual" value="{{ old('harga_jual', $barang->harga_jual) }}" class="form-control" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
            </div>

            <!-- Status Menu -->
            <div class="mb-3">
                <label class="form-label text-white">Status Menu:</label>
                <select name="status" class="form-select" style="background-color: #121318; color: #ffffff; border: 1px solid #25435D;" required>
                    <option value="ready" {{ $barang->stok > 0 ? 'selected' : '' }}>Ready (Tersedia)</option>
                    <option value="sold_out" {{ $barang->stok == 0 ? 'selected' : '' }}>Sold Out (Habis)</option>
                </select>
            </div>

            <!-- Tombol Update -->
            <div class="mt-4">
                <button type="submit" class="btn fw-bold px-4" style="background-color: #0d6efd; color: #ffffff;">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection