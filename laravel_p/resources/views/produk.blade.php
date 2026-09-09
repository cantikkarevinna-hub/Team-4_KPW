@extends('template.master')

@section('title', 'Kelola Data Produk')

@section('content')

<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
        <div>
            <h3 class="m-0 fw-bold text-white">
                <i class="bi bi-box-seam me-2" style="color: #B9D3E2;"></i>
                Kelola Data Produk
            </h3>
            <small style="color: #87A4B5;">
                Manajemen daftar menu kafe dan penetapan harga
            </small>
        </div>

        <a href="{{ url('/produk/create') }}" class="btn fw-bold px-3 py-2" style="background-color: #7D0018; color: #ffffff;">
            <i class="bi bi-plus-circle me-1"></i> + Tambah Produk Baru
        </a>
    </div>

    <!-- NOTIFIKASI SUKSES -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 mb-4" role="alert" style="background-color: #198754; color: #fff;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- TABEL DATA PRODUK -->
    <div class="card p-3 border-0 rounded-4" style="background-color: #1E222D; border: 1px solid #25435D !important;">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle m-0">
                <thead>
                    <tr style="border-bottom: 2px solid #25435D; color: #87A4B5;">
                        <th width="50">No</th>
                        <th>Kode/Barcode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Status Menu</th>
                        <th width="140" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $index => $barang)
                        @php 
                            // Deteksi ID produk secara akurat apa pun nama kolom di database
                            $barangId = $barang->id ?? $barang->id_barang ?? $barang->getKey(); 
                        @endphp
                        <tr style="border-bottom: 1px solid rgba(37,67,93,.4);">
                            <td class="text-white">{{ $index + 1 }}</td>
                            <td>
                                <span class="badge px-2 py-1" style="background-color: #121318; color: #B9D3E2; border: 1px solid #25435D;">
                                    {{ $barang->kode_barcode }}
                                </span>
                            </td>
                            <td class="fw-semibold text-white">{{ $barang->nama_barang }}</td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info px-2 py-1">
                                    {{ $barang->kategori->nama_kategori ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="fw-bold" style="color: #52D68A;">
                                Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($barang->stok > 0)
                                    <span class="badge bg-success text-white px-3 py-2 fw-semibold">
                                        <i class="bi bi-check-circle me-1"></i> Ready
                                    </span>
                                @else
                                    <span class="badge bg-danger text-white px-3 py-2 fw-semibold">
                                        <i class="bi bi-x-circle me-1"></i> Sold Out
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <!-- Tombol Edit Produk -->
                                    <a href="{{ url('/produk/' . $barangId . '/edit') }}" class="btn btn-sm btn-primary fw-bold" title="Edit Produk">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ url('/produk/' . $barangId) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $barang->nama_barang }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger fw-bold" title="Hapus Produk">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5" style="color: #87A4B5;">
                                <i class="bi bi-box2 fs-1 d-block mb-2"></i>
                                Belum ada data produk. Silakan tambah produk baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection