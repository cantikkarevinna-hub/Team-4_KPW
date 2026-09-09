@extends('template.master')

@section('title', 'Kelola Kategori')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
        <h3 class="m-0 fw-bold text-white">
            <i class="bi bi-tags me-2" style="color: #B9D3E2;"></i>
            Kelola Kategori Produk
        </h3>
    </div>

    <div class="row g-4">
        <!-- FORM TAMBAH KATEGORI -->
        <div class="col-md-5">
            <div class="card p-4 border-0 rounded-4" style="background-color: #1E222D; border: 1px solid #25435D !important;">
                <h5 class="fw-bold text-white mb-3">Tambah Kategori Baru</h5>
                
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Nama Kategori:</label>
                        <input type="text" name="nama_kategori" class="form-control" style="background-color: #121318; color: #fff; border: 1px solid #25435D;" placeholder="Contoh: Makanan / Minuman" required>
                    </div>
                    <button type="submit" class="btn btn-success fw-bold w-100">
                        <i class="bi bi-plus-lg me-1"></i> Simpan Kategori
                    </button>
                </form>
            </div>
        </div>

        <!-- TABEL DAFTAR KATEGORI -->
        <div class="col-md-7">
            <div class="card p-4 border-0 rounded-4" style="background-color: #1E222D; border: 1px solid #25435D !important;">
                <h5 class="fw-bold text-white mb-3">Daftar Kategori</h5>
                
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Nama Kategori</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategoris as $index => $kat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kat->nama_kategori }}</td>
                                <td class="text-center">
                                    <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Belum ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection