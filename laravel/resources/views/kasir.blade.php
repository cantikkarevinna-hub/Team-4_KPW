@extends('template.master')

@section('title', 'Transaksi Kasir')

@section('content')

<div class="p-4 rounded-4"
     style="background-color:#121318; min-height:100vh;">

    <!-- HEADER POS -->
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom"
         style="border-color:#25435D !important;">

        <h3 class="m-0 fw-bold" style="color:#ffffff;">

            <i class="bi bi-cart3 me-2"
               style="color:#B9D3E2;"></i>

            Terminal Kasir

        </h3>

        <span class="badge bg-success bg-opacity-20 text-success border border-success px-3 py-2 rounded-pill">

            <i class="bi bi-circle-fill me-1"
               style="font-size:8px;"></i>

            Kasir Active

        </span>

    </div>


    <div class="row g-3">

        <!-- ================================= -->
        <!-- KOLOM KIRI -->
        <!-- ================================= -->

        <div class="col-lg-7">

            <div class="card p-3 border-0 shadow-sm rounded-4"
                 style="background-color:#1E222D;">


                <!-- SEARCH & FILTER -->

                <div class="row g-2 mb-3">

                    <div class="col-md-7">

                        <div class="input-group">

                            <span class="input-group-text border-0"
                                  style="background-color:#121318;
                                         color:#87A4B5;">

                                <i class="bi bi-search"></i>

                            </span>

                            <input type="text"
                                   id="searchProduk"
                                   class="form-control border-0 shadow-none py-2"
                                   style="background-color:#121318;
                                          color:#ffffff;"
                                   placeholder="Cari barang / scan barcode..."
                                   onkeyup="cariProduk()">

                        </div>

                    </div>


                    <div class="col-md-5">

                        <select id="filterKategori"
                                class="form-select border-0 py-2"
                                style="background-color:#121318;
                                       color:#B9D3E2;"
                                onchange="filterProduk()">

                            <option value="">
                                Semua Kategori
                            </option>

                            <option value="minuman">
                                Minuman
                            </option>

                            <option value="makanan">
                                Makanan
                            </option>

                            <option value="snack">
                                Cemilan
                            </option>

                        </select>

                    </div>

                </div>


                <!-- GRID PRODUK -->

                <div class="row g-2 overflow-auto custom-scroll"
                     style="max-height:580px;"
                     id="produkContainer">


                    <!-- PRODUK KOPI -->

                    <div class="col-6 col-md-4 produk-item"
                         data-nama="Kopi Susu Aren"
                         data-kategori="minuman"
                         data-barcode="001">

                        <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover"
                             style="background-color:#121318;
                                    border:1px solid #25435D !important;">

                            <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center"
                                 style="background-color:rgba(76,108,129,.1);">

                                <img src="{{ asset('images/kopi-aren.png') }}"
                                     alt="Kopi Susu Aren"
                                     class="img-fluid"
                                     style="height:80px;
                                            object-fit:contain;">

                            </div>

                            <h6 class="mb-1 text-truncate fw-semibold">
                                Kopi Susu Aren
                            </h6>

                            <div class="small fw-bold mb-2"
                                 style="color:#B9D3E2;">

                                Rp 18.000

                            </div>

                            <button type="button"
                                    class="btn btn-sm w-100 fw-semibold border-0 py-1"
                                    style="background-color:#7D0018;
                                           color:#ffffff;"
                                    onclick="tambahProduk(
                                        'Kopi Susu Aren',
                                        18000,
                                        'minuman'
                                    )">

                                <i class="bi bi-plus-lg"></i>
                                Tambah

                            </button>

                        </div>

                    </div>


                    <!-- PRODUK NASI GORENG -->

                    <div class="col-6 col-md-4 produk-item"
                         data-nama="Nasi Goreng Special"
                         data-kategori="makanan"
                         data-barcode="002">

                        <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover"
                             style="background-color:#121318;
                                    border:1px solid #25435D !important;">

                            <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center"
                                 style="background-color:rgba(76,108,129,.1);">

                                <img src="{{ asset('images/nasgor-spesial.png') }}"
                                     alt="Nasi Goreng Special"
                                     class="img-fluid"
                                     style="height:80px;
                                            object-fit:contain;">

                            </div>

                            <h6 class="mb-1 text-truncate fw-semibold">
                                Nasi Goreng Special
                            </h6>

                            <div class="small fw-bold mb-2"
                                 style="color:#B9D3E2;">

                                Rp 25.000

                            </div>

                            <button type="button"
                                    class="btn btn-sm w-100 fw-semibold border-0 py-1"
                                    style="background-color:#7D0018;
                                           color:#ffffff;"
                                    onclick="tambahProduk(
                                        'Nasi Goreng Special',
                                        25000,
                                        'makanan'
                                    )">

                                <i class="bi bi-plus-lg"></i>
                                Tambah

                            </button>

                        </div>

                    </div>


                    <!-- PRODUK ES TEH -->

                    <div class="col-6 col-md-4 produk-item"
                         data-nama="Es Teh Manis"
                         data-kategori="minuman"
                         data-barcode="003">

                        <div class="card h-100 p-2 border-0 shadow-sm rounded-3 text-center text-white custom-card-hover"
                             style="background-color:#121318;
                                    border:1px solid #25435D !important;">

                            <div class="rounded-3 py-2 mb-2 d-flex align-items-center justify-content-center"
                                 style="background-color:rgba(76,108,129,.1);">

                                <img src="{{ asset('images/es-teh.png') }}"
                                     alt="Es Teh Manis"
                                     class="img-fluid"
                                     style="height:80px;
                                            object-fit:contain;">

                            </div>

                            <h6 class="mb-1 text-truncate fw-semibold">
                                Es Teh Manis
                            </h6>

                            <div class="small fw-bold mb-2"
                                 style="color:#B9D3E2;">

                                Rp 5.000

                            </div>

                            <button type="button"
                                    class="btn btn-sm w-100 fw-semibold border-0 py-1"
                                    style="background-color:#7D0018;
                                           color:#ffffff;"
                                    onclick="tambahProduk(
                                        'Es Teh Manis',
                                        5000,
                                        'minuman'
                                    )">

                                <i class="bi bi-plus-lg"></i>
                                Tambah

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================================= -->
        <!-- KOLOM KANAN -->
        <!-- ================================= -->

        <div class="col-lg-5">

            <div class="card p-3 border-0 shadow-sm rounded-4 h-100 d-flex flex-column justify-content-between"
                 style="background-color:#1E222D;">

                <div>

                    <!-- HEADER KERANJANG -->

                    <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom"
                         style="border-color:#25435D !important;">

                        <h5 class="m-0 fw-bold">

                            <i class="bi bi-receipt me-2"
                               style="color:#B9D3E2;"></i>

                            Keranjang Belanja

                        </h5>

                        <button type="button"
                                class="btn btn-sm text-danger p-0 border-0"
                                onclick="kosongkanKeranjang()">

                            <i class="bi bi-trash"></i>
                            Kosongkan

                        </button>

                    </div>


                    <!-- TABEL KERANJANG -->

                    <div class="overflow-auto mb-3 custom-scroll"
                         style="max-height:260px;">

                        <table class="table table-borderless align-middle text-white m-0 text-nowrap">

                            <tbody id="keranjangBody">

                                <tr id="keranjangKosong">

                                    <td colspan="4"
                                        class="text-center py-5"
                                        style="color:#87A4B5;">

                                        <i class="bi bi-cart-x fs-2 d-block mb-2"></i>

                                        Keranjang masih kosong

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- PEMBAYARAN -->
                <!-- ================================= -->

                <div class="pt-2 border-top"
                     style="border-color:#25435D !important;">


                    <!-- METODE PEMBAYARAN -->

                    <div class="mb-3">

                        <label class="form-label small fw-semibold"
                               style="color:#87A4B5;">

                            Metode Pembayaran

                        </label>


                        <div class="row g-2">


                            <!-- CASH -->

                            <div class="col-4">

                                <input type="radio"
                                       class="btn-check"
                                       name="pay_method"
                                       id="pay_cash"
                                       value="cash"
                                       checked
                                       onchange="ubahMetodePembayaran()">

                                <label class="btn btn-sm btn-outline-secondary w-100 text-white"
                                       for="pay_cash">

                                    <i class="bi bi-cash me-1"></i>
                                    Cash

                                </label>

                            </div>


                            <!-- QRIS -->

                            <div class="col-4">

                                <input type="radio"
                                       class="btn-check"
                                       name="pay_method"
                                       id="pay_qris"
                                       value="qris"
                                       onchange="ubahMetodePembayaran()">

                                <label class="btn btn-sm btn-outline-secondary w-100 text-white"
                                       for="pay_qris">

                                    <i class="bi bi-qr-code me-1"></i>
                                    QRIS

                                </label>

                            </div>


                            <!-- DEBIT -->

                            <div class="col-4">

                                <input type="radio"
                                       class="btn-check"
                                       name="pay_method"
                                       id="pay_debit"
                                       value="debit"
                                       onchange="ubahMetodePembayaran()">

                                <label class="btn btn-sm btn-outline-secondary w-100 text-white"
                                       for="pay_debit">

                                    <i class="bi bi-credit-card me-1"></i>
                                    Debit

                                </label>

                            </div>

                        </div>

                    </div>


                    <!-- TOTAL -->

                    <div class="p-3 rounded-3 mb-3"
                         style="background-color:#121318;
                                border:1px solid #25435D;">

                        <div class="d-flex justify-content-between mb-1 small"
                             style="color:#87A4B5;">

                            <span>
                                Subtotal
                            </span>

                            <span id="subtotal">
                                Rp 0
                            </span>

                        </div>


                        <div class="d-flex justify-content-between align-items-center fs-4 fw-bold">

                            <span style="color:#87A4B5;">
                                TOTAL
                            </span>

                            <span id="total"
                                  style="color:#B9D3E2;">

                                Rp 0

                            </span>

                        </div>

                    </div>


                    <!-- BAYAR -->

                    <div class="mb-3"
                         id="bayarContainer">

                        <label class="form-label small fw-semibold"
                               style="color:#87A4B5;">

                            Bayar (Rp)

                        </label>

                        <input type="number"
                               id="jumlahBayar"
                               class="form-control form-control-lg border-0 fw-bold fs-4 text-end"
                               style="background-color:#121318;
                                      color:#52D68A;"
                               placeholder="0"
                               oninput="hitungKembalian()">

                    </div>


                    <!-- KEMBALIAN -->

                    <div class="d-flex justify-content-between mb-3">

                        <span style="color:#87A4B5;">
                            Kembalian
                        </span>

                        <strong id="kembalian"
                                style="color:#52D68A;">

                            Rp 0

                        </strong>

                    </div>


                    <!-- BAYAR -->

                    <button type="button"
                            class="btn btn-lg w-100 fw-bold py-3 border-0 shadow"
                            style="background-color:#7D0018;
                                   color:#ffffff;"
                            onclick="bayarTransaksi()">

                        <i class="bi bi-printer me-2"></i>

                        BAYAR & CETAK STRUK

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- ================================= -->
<!-- JAVASCRIPT -->
<!-- ================================= -->

<script>

let keranjang = [];


// ==========================================
// TAMBAH PRODUK
// ==========================================

function tambahProduk(nama, harga, kategori)
{

    let produk = keranjang.find(
        item => item.nama === nama
    );


    if (produk)
    {

        produk.qty++;

    }
    else
    {

        keranjang.push({

            nama: nama,
            harga: harga,
            kategori: kategori,
            qty: 1

        });

    }


    tampilkanKeranjang();

}


// ==========================================
// TAMPILKAN KERANJANG
// ==========================================

function tampilkanKeranjang()
{

    const body =
        document.getElementById(
            'keranjangBody'
        );


    body.innerHTML = '';


    if (keranjang.length === 0)
    {

        body.innerHTML = `

            <tr>

                <td colspan="4"
                    class="text-center py-5"
                    style="color:#87A4B5;">

                    <i class="bi bi-cart-x fs-2 d-block mb-2"></i>

                    Keranjang masih kosong

                </td>

            </tr>

        `;

    }


    keranjang.forEach(
        (item, index) =>
        {

            let subtotal =
                item.harga * item.qty;


            body.innerHTML += `

                <tr class="border-bottom"
                    style="border-color:rgba(37,67,93,.5) !important;">

                    <td class="ps-0 py-2">

                        <div class="fw-semibold text-white small">

                            ${item.nama}

                        </div>

                        <small style="color:#87A4B5;font-size:11px;">

                            @ Rp ${formatRupiah(item.harga)}

                        </small>

                    </td>


                    <td width="60"
                        class="px-1">

                        <input type="number"
                               min="1"
                               value="${item.qty}"
                               class="form-control form-control-sm text-center border-0 fw-bold px-1 py-1"
                               style="background-color:#121318;
                                      color:#ffffff;"
                               onchange="ubahQty(${index}, this.value)">

                    </td>


                    <td class="text-end fw-bold px-1 small"
                        style="color:#B9D3E2;">

                        Rp ${formatRupiah(subtotal)}

                    </td>


                    <td width="20"
                        class="pe-0 text-end">

                        <button type="button"
                                class="btn btn-sm text-danger p-0 border-0"
                                onclick="hapusProduk(${index})">

                            <i class="bi bi-x-circle"></i>

                        </button>

                    </td>

                </tr>

            `;

        }
    );


    hitungTotal();

}


// ==========================================
// UBAH QTY
// ==========================================

function ubahQty(index, qty)
{

    qty = parseInt(qty);


    if (isNaN(qty) || qty < 1)
    {

        qty = 1;

    }


    keranjang[index].qty = qty;


    tampilkanKeranjang();

}


// ==========================================
// HAPUS PRODUK
// ==========================================

function hapusProduk(index)
{

    keranjang.splice(index, 1);


    tampilkanKeranjang();

}


// ==========================================
// KOSONGKAN KERANJANG
// ==========================================

function kosongkanKeranjang()
{

    if (keranjang.length === 0)
    {

        return;

    }


    if (
        confirm(
            'Yakin ingin mengosongkan keranjang?'
        )
    )
    {

        keranjang = [];

        document.getElementById(
            'jumlahBayar'
        ).value = '';

        tampilkanKeranjang();

    }

}


// ==========================================
// HITUNG TOTAL
// ==========================================

function hitungTotal()
{

    let total = 0;


    keranjang.forEach(
        item =>
        {

            total +=
                item.harga * item.qty;

        }
    );


    document.getElementById(
        'subtotal'
    ).innerText =
        'Rp ' + formatRupiah(total);


    document.getElementById(
        'total'
    ).innerText =
        'Rp ' + formatRupiah(total);


    hitungKembalian();

}


// ==========================================
// HITUNG KEMBALIAN
// ==========================================

function hitungKembalian()
{

    let total = 0;


    keranjang.forEach(
        item =>
        {

            total +=
                item.harga * item.qty;

        }
    );


    let metode =
        document.querySelector(
            'input[name="pay_method"]:checked'
        ).value;


    if (metode !== 'cash')
    {

        document.getElementById(
            'kembalian'
        ).innerText = 'Rp 0';

        return;

    }


    let bayar =
        parseInt(
            document.getElementById(
                'jumlahBayar'
            ).value
        ) || 0;


    let kembali =
        bayar - total;


    if (kembali < 0)
    {

        document.getElementById(
            'kembalian'
        ).innerText =
            'Kurang Rp ' +
            formatRupiah(
                Math.abs(kembali)
            );

    }
    else
    {

        document.getElementById(
            'kembalian'
        ).innerText =
            'Rp ' +
            formatRupiah(kembali);

    }

}


// ==========================================
// METODE PEMBAYARAN
// ==========================================

function ubahMetodePembayaran()
{

    let metode =
        document.querySelector(
            'input[name="pay_method"]:checked'
        ).value;


    let input =
        document.getElementById(
            'jumlahBayar'
        );


    if (metode === 'cash')
    {

        input.disabled = false;

        input.placeholder = 'Masukkan uang pelanggan';

    }
    else if (metode === 'qris')
    {

        input.disabled = true;

        input.value = '';

        input.placeholder = 'Pembayaran QRIS';

    }
    else
    {

        input.disabled = true;

        input.value = '';

        input.placeholder = 'Pembayaran Debit';

    }


    hitungKembalian();

}


// ==========================================
// SEARCH PRODUK
// ==========================================

function cariProduk()
{

    let keyword =
        document.getElementById(
            'searchProduk'
        ).value.toLowerCase();


    let kategori =
        document.getElementById(
            'filterKategori'
        ).value;


    let produk =
        document.querySelectorAll(
            '.produk-item'
        );


    produk.forEach(
        item =>
        {

            let nama =
                item.dataset.nama.toLowerCase();

            let barcode =
                item.dataset.barcode.toLowerCase();

            let kategoriProduk =
                item.dataset.kategori;


            let cocokNama =
                nama.includes(keyword) ||
                barcode.includes(keyword);


            let cocokKategori =
                kategori === '' ||
                kategoriProduk === kategori;


            if (
                cocokNama &&
                cocokKategori
            )
            {

                item.style.display = '';

            }
            else
            {

                item.style.display = 'none';

            }

        }
    );

}


// ==========================================
// FILTER KATEGORI
// ==========================================

function filterProduk()
{

    cariProduk();

}


// ==========================================
// BAYAR TRANSAKSI
// ==========================================

function bayarTransaksi()
{

    if (keranjang.length === 0)
    {

        alert(
            'Keranjang masih kosong!'
        );

        return;

    }


    let total = 0;


    keranjang.forEach(
        item =>
        {

            total +=
                item.harga * item.qty;

        }
    );


    let metode =
        document.querySelector(
            'input[name="pay_method"]:checked'
        ).value;


    let bayar =
        parseInt(
            document.getElementById(
                'jumlahBayar'
            ).value
        ) || 0;


    // CASH

    if (metode === 'cash')
    {

        if (bayar < total)
        {

            alert(
                'Uang pembayaran masih kurang!'
            );

            return;

        }

    }


    let kembalian =
        metode === 'cash'
            ? bayar - total
            : 0;


    let namaMetode =
        metode.toUpperCase();


    alert(

        'TRANSAKSI BERHASIL!\n\n' +

        'Metode: ' +
        namaMetode +

        '\nTotal: Rp ' +
        formatRupiah(total) +

        (
            metode === 'cash'
                ? '\nBayar: Rp ' +
                  formatRupiah(bayar) +

                  '\nKembalian: Rp ' +
                  formatRupiah(kembalian)
                : ''
        )

    );


    // Cetak

    window.print();

}


// ==========================================
// FORMAT RUPIAH
// ==========================================

function formatRupiah(angka)
{

    return new Intl.NumberFormat(
        'id-ID'
    ).format(angka);

}

</script>


<!-- ================================= -->
<!-- CSS -->
<!-- ================================= -->

<style>

.custom-card-hover {

    transition:
        transform .2s ease,
        border-color .2s ease,
        box-shadow .2s ease;

}


.custom-card-hover:hover {

    transform:translateY(-4px);

    border-color:#7D0018 !important;

    box-shadow:
        0 8px 20px rgba(0,0,0,.25);

}


.custom-card-hover button {

    cursor:pointer;

}


.form-control:focus,
.form-select:focus {

    background-color:#121318 !important;

    color:#ffffff !important;

    border-color:#7D0018 !important;

    box-shadow:
        0 0 0 .2rem
        rgba(125,0,24,.2);

}


.btn-check:checked + .btn {

    background-color:#7D0018;

    border-color:#7D0018;

    color:#ffffff !important;

}


@media print {

    body * {

        visibility:hidden;

    }

    .col-lg-5,
    .col-lg-5 * {

        visibility:visible;

    }

    .col-lg-5 {

        position:absolute;

        left:0;

        top:0;

        width:100%;

    }

}

</style>

@endsection
