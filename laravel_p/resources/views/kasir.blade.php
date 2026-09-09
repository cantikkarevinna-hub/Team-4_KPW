@extends('template.master')

@section('title', 'Terminal Kasir')

@section('content')

<!-- Token CSRF untuk AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="p-4 rounded-4" style="background-color:#121318; min-height:100vh;">

    <!-- HEADER POS -->
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom" style="border-color:#25435D !important;">
        <h3 class="m-0 fw-bold" style="color:#ffffff;">
            <i class="bi bi-cart3 me-2" style="color:#B9D3E2;"></i>
            Terminal Kasir
        </h3>
    </div>

    <div class="row g-3">
        <!-- ================================= -->
        <!-- KOLOM KIRI (PRODUK / MENU KAFE) -->
        <!-- ================================= -->
        <div class="col-lg-7">
            <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color:#1E222D;">

                <!-- SEARCH & FILTER -->
                <div class="row g-2 mb-3">
                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-text border-0" style="background-color:#121318; color:#87A4B5;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text"
                                   id="searchProduk"
                                   class="form-control border-0 shadow-none py-2"
                                   style="background-color:#121318; color:#ffffff;"
                                   placeholder="Cari barang / scan barcode..."
                                   onkeyup="cariProduk()">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <select id="filterKategori"
                                class="form-select border-0 py-2"
                                style="background-color:#121318; color:#B9D3E2;"
                                onchange="filterProduk()">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoris ?? [] as $kat)
                                <option value="{{ strtolower($kat->nama_kategori) }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- GRID PRODUK -->
                <div class="row g-2 overflow-auto custom-scroll" style="max-height:580px;" id="produkContainer">
                    @forelse($barangs ?? [] as $barang)
                        <div class="col-6 col-md-4 produk-item"
                             data-nama="{{ $barang->nama_barang }}"
                             data-kategori="{{ strtolower($barang->kategori->nama_kategori ?? 'umum') }}"
                             data-barcode="{{ $barang->kode_barcode }}">

                            <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover"
                                 style="background-color:#121318; border:1px solid #25435D !important;">

                                <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center"
                                     style="background-color:rgba(76,108,129,.1);">
                                    <i class="bi bi-cup-hot fs-1" style="color:#B9D3E2;"></i>
                                </div>

                                <h6 class="mb-1 text-truncate fw-semibold">
                                    {{ $barang->nama_barang }}
                                </h6>

                                <div class="small text-muted mb-1" style="font-size: 11px;">
                                    Stok: {{ $barang->stok }}
                                </div>

                                <div class="small fw-bold mb-2" style="color:#B9D3E2;">
                                    Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}
                                </div>

                                <button type="button"
                                        class="btn btn-sm w-100 fw-semibold border-0 py-1 mt-auto"
                                        style="background-color:#7D0018; color:#ffffff;"
                                        onclick="tambahProduk(
                                            '{{ $barang->nama_barang }}',
                                            {{ $barang->harga_jual }},
                                            '{{ strtolower($barang->kategori->nama_kategori ?? 'umum') }}'
                                        )">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" style="color:#87A4B5;">
                            <i class="bi bi-box2 fs-1 d-block mb-2"></i>
                            <p class="mb-2">Belum ada produk di database.</p>
                            <a href="{{ url('/produk/create') }}" class="btn btn-sm fw-bold px-3" style="background-color:#7D0018; color:#fff;">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Produk Sekarang
                            </a>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

        <!-- ================================= -->
        <!-- KOLOM KANAN (KERANJANG & PEMBAYARAN) -->
        <!-- ================================= -->
        <div class="col-lg-5">
            <div class="card p-3 border-0 shadow-sm rounded-4 h-100 d-flex flex-column justify-content-between" style="background-color:#1E222D;">
                <div>
                    <!-- HEADER KERANJANG -->
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom" style="border-color:#25435D !important;">
                        <h5 class="m-0 fw-bold text-white">
                            <i class="bi bi-receipt me-2" style="color:#B9D3E2;"></i>
                            Keranjang Belanja
                        </h5>
                        <button type="button" class="btn btn-sm text-danger p-0 border-0 bg-transparent" onclick="kosongkanKeranjang()">
                            <i class="bi bi-trash"></i> Kosongkan
                        </button>
                    </div>

                    <!-- TABEL KERANJANG -->
                    <div class="overflow-auto mb-3 custom-scroll" style="max-height:260px;">
                        <table class="table table-borderless align-middle text-white m-0 text-nowrap">
                            <tbody id="keranjangBody">
                                <tr id="keranjangKosong">
                                    <td colspan="4" class="text-center py-5" style="color:#87A4B5;">
                                        <i class="bi bi-cart-x fs-2 d-block mb-2"></i>
                                        Keranjang masih kosong
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PEMBAYARAN -->
                <div class="pt-2 border-top" style="border-color:#25435D !important;">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold" style="color:#87A4B5;">Metode Pembayaran</label>
                        <div class="row g-2">
                            <div class="col-4">
                                <input type="radio" class="btn-check" name="pay_method" id="pay_cash" value="cash" checked onchange="ubahMetodePembayaran()">
                                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_cash">
                                    <i class="bi bi-cash me-1"></i> Cash
                                </label>
                            </div>
                            <div class="col-4">
                                <input type="radio" class="btn-check" name="pay_method" id="pay_qris" value="qris" onchange="ubahMetodePembayaran()">
                                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_qris">
                                    <i class="bi bi-qr-code me-1"></i> QRIS
                                </label>
                            </div>
                            <div class="col-4">
                                <input type="radio" class="btn-check" name="pay_method" id="pay_debit" value="debit" onchange="ubahMetodePembayaran()">
                                <label class="btn btn-sm btn-outline-secondary w-100 text-white" for="pay_debit">
                                    <i class="bi bi-credit-card me-1"></i> Debit
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL -->
                    <div class="p-3 rounded-3 mb-3" style="background-color:#121318; border:1px solid #25435D;">
                        <div class="d-flex justify-content-between mb-1 small" style="color:#87A4B5;">
                            <span>Subtotal</span>
                            <span id="subtotal">Rp 0</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center fs-4 fw-bold">
                            <span style="color:#87A4B5;">TOTAL</span>
                            <span id="total" style="color:#B9D3E2;">Rp 0</span>
                        </div>
                    </div>

                    <!-- BAYAR -->
                    <div class="mb-3" id="bayarContainer">
                        <label class="form-label small fw-semibold" style="color:#87A4B5;">Bayar (Rp)</label>
                        <input type="number"
                               id="jumlahBayar"
                               class="form-control form-control-lg border-0 fw-bold fs-4 text-end"
                               style="background-color:#121318; color:#52D68A;"
                               placeholder="0"
                               oninput="hitungKembalian()">
                    </div>

                    <!-- KEMBALIAN -->
                    <div class="d-flex justify-content-between mb-3">
                        <span style="color:#87A4B5;">Kembalian</span>
                        <strong id="kembalian" style="color:#52D68A;">Rp 0</strong>
                    </div>

                    <!-- TOMBOL PROSES -->
                    <button type="button"
                            class="btn btn-lg w-100 fw-bold py-3 border-0 shadow"
                            style="background-color:#7D0018; color:#ffffff;"
                            onclick="bayarTransaksi()">
                        <i class="bi bi-check-circle me-2"></i>
                        BAYAR TRANSAKSI
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT AJAX & INTERAKSI KASIR -->
<script>
let keranjang = [];

function tambahProduk(nama, harga, kategori) {
    let produk = keranjang.find(item => item.nama === nama);
    if (produk) {
        produk.qty++;
    } else {
        keranjang.push({ nama: nama, harga: harga, kategori: kategori, qty: 1 });
    }
    tampilkanKeranjang();
}

function tampilkanKeranjang() {
    const body = document.getElementById('keranjangBody');
    body.innerHTML = '';

    if (keranjang.length === 0) {
        body.innerHTML = `
            <tr>
                <td colspan="4" class="text-center py-5" style="color:#87A4B5;">
                    <i class="bi bi-cart-x fs-2 d-block mb-2"></i>
                    Keranjang masih kosong
                </td>
            </tr>
        `;
        hitungTotal();
        return;
    }

    keranjang.forEach((item, index) => {
        let subtotal = item.harga * item.qty;
        body.innerHTML += `
            <tr class="border-bottom" style="border-color:rgba(37,67,93,.5) !important;">
                <td class="ps-0 py-2">
                    <div class="fw-semibold text-white small">${item.nama}</div>
                    <small style="color:#87A4B5;font-size:11px;">@ Rp ${formatRupiah(item.harga)}</small>
                </td>
                <td width="60" class="px-1">
                    <input type="number" min="1" value="${item.qty}"
                           class="form-control form-control-sm text-center border-0 fw-bold px-1 py-1"
                           style="background-color:#121318; color:#ffffff;"
                           onchange="ubahQty(${index}, this.value)">
                </td>
                <td class="text-end fw-bold px-1 small" style="color:#B9D3E2;">
                    Rp ${formatRupiah(subtotal)}
                </td>
                <td width="20" class="pe-0 text-end">
                    <button type="button" class="btn btn-sm text-danger p-0 border-0 bg-transparent" onclick="hapusProduk(${index})">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    hitungTotal();
}

function ubahQty(index, qty) {
    qty = parseInt(qty);
    if (isNaN(qty) || qty < 1) qty = 1;
    keranjang[index].qty = qty;
    tampilkanKeranjang();
}

function hapusProduk(index) {
    keranjang.splice(index, 1);
    tampilkanKeranjang();
}

function kosongkanKeranjang() {
    if (keranjang.length === 0) return;
    if (confirm('Yakin ingin mengosongkan keranjang?')) {
        keranjang = [];
        document.getElementById('jumlahBayar').value = '';
        tampilkanKeranjang();
    }
}

function hitungTotal() {
    let total = 0;
    keranjang.forEach(item => { total += item.harga * item.qty; });

    document.getElementById('subtotal').innerText = 'Rp ' + formatRupiah(total);
    document.getElementById('total').innerText = 'Rp ' + formatRupiah(total);
    hitungKembalian();
}

function hitungKembalian() {
    let total = 0;
    keranjang.forEach(item => { total += item.harga * item.qty; });

    let metode = document.querySelector('input[name="pay_method"]:checked').value;
    if (metode !== 'cash') {
        document.getElementById('kembalian').innerText = 'Rp 0';
        return;
    }

    let bayar = parseInt(document.getElementById('jumlahBayar').value) || 0;
    let kembali = bayar - total;

    if (kembali < 0) {
        document.getElementById('kembalian').innerText = 'Kurang Rp ' + formatRupiah(Math.abs(kembali));
    } else {
        document.getElementById('kembalian').innerText = 'Rp ' + formatRupiah(kembali);
    }
}

function ubahMetodePembayaran() {
    let metode = document.querySelector('input[name="pay_method"]:checked').value;
    let input = document.getElementById('jumlahBayar');

    if (metode === 'cash') {
        input.disabled = false;
        input.placeholder = 'Masukkan uang pelanggan';
    } else {
        input.disabled = true;
        input.value = '';
        input.placeholder = metode === 'qris' ? 'Pembayaran QRIS' : 'Pembayaran Debit';
    }
    hitungKembalian();
}

function cariProduk() {
    let keyword = document.getElementById('searchProduk').value.toLowerCase();
    let kategori = document.getElementById('filterKategori').value;
    let produk = document.querySelectorAll('.produk-item');

    produk.forEach(item => {
        let nama = item.dataset.nama.toLowerCase();
        let barcode = item.dataset.barcode.toLowerCase();
        let kategoriProduk = item.dataset.kategori;

        let cocokNama = nama.includes(keyword) || barcode.includes(keyword);
        let cocokKategori = kategori === '' || kategoriProduk === kategori;

        if (cocokNama && cocokKategori) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

function filterProduk() { cariProduk(); }

function bayarTransaksi() {
    if (keranjang.length === 0) {
        alert('Keranjang masih kosong!');
        return;
    }

    let total = 0;
    keranjang.forEach(item => { total += item.harga * item.qty; });

    let metode = document.querySelector('input[name="pay_method"]:checked').value;
    let bayar = metode === 'cash' ? (parseInt(document.getElementById('jumlahBayar').value) || 0) : total;

    if (metode === 'cash' && bayar < total) {
        alert('Uang pembayaran masih kurang!');
        return;
    }

    let kembali = metode === 'cash' ? bayar - total : 0;

    fetch('/kasir/transaksi', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            metode_pembayaran: metode,
            total: total,
            bayar: bayar,
            kembali: kembali,
            items: keranjang
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('TRANSAKSI BERHASIL!');
            // Otomatis pindah langsung ke halaman Riwayat
            window.location.href = '/riwayat';
        } else {
            alert('Gagal menyimpan transaksi: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan koneksi server.');
    });
}

function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID').format(angka);
}
</script>

<style>
.custom-card-hover { transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease; }
.custom-card-hover:hover { transform: translateY(-4px); border-color: #7D0018 !important; box-shadow: 0 8px 20px rgba(0,0,0,.25); }
.custom-card-hover button { cursor: pointer; }
.form-control:focus, .form-select:focus { background-color: #121318 !important; color: #ffffff !important; border-color: #7D0018 !important; box-shadow: 0 0 0 .2rem rgba(125,0,24,.2); }
.btn-check:checked + .btn { background-color: #7D0018; border-color: #7D0018; color: #ffffff !important; }
</style>

@endsection