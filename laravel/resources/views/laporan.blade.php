@extends('template.master')

@section('title', 'Laporan Penjualan')

@section('content')

<div class="p-4 rounded-4"
     style="background-color:#121318; min-height:100vh; color:#E1E7ED;">

    <!-- ================= HEADER ================= -->

    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom"
         style="border-color:#25435D !important;">

        <div>

            <h2 class="fw-bold mb-1 text-white">

                <i class="bi bi-graph-up-arrow me-2"
                   style="color:#B9D3E2;"></i>

                Laporan Penjualan

            </h2>

            <p class="small mb-0"
               style="color:#87A4B5 !important;">

                Ringkasan performa penjualan dan metode pembayaran

            </p>

        </div>


        <button type="button"
                class="btn fw-semibold border-0 px-3 py-2"
                style="background-color:#7D0018;color:#ffffff;"
                onclick="exportLaporan()">

            <i class="bi bi-download me-1"></i>

            Export Laporan

        </button>

    </div>


    <!-- ================= FILTER ================= -->

    <div class="card p-3 mb-4 border-0 shadow-sm rounded-4"
         style="background-color:#1E222D;">

        <div class="row g-3 align-items-end">

            <div class="col-md-4">

                <label class="form-label small fw-semibold"
                       style="color:#87A4B5;">

                    Tanggal Mulai

                </label>

                <input type="date"
                       id="tanggalMulai"
                       class="form-control border-0"
                       style="background-color:#121318;color:#ffffff;">

            </div>


            <div class="col-md-4">

                <label class="form-label small fw-semibold"
                       style="color:#87A4B5;">

                    Tanggal Akhir

                </label>

                <input type="date"
                       id="tanggalAkhir"
                       class="form-control border-0"
                       style="background-color:#121318;color:#ffffff;">

            </div>


            <div class="col-md-4">

                <button type="button"
                        class="btn w-100 fw-semibold"
                        style="background-color:#25435D;color:#ffffff;"
                        onclick="filterLaporan()">

                    <i class="bi bi-funnel me-1"></i>

                    Terapkan Filter

                </button>

            </div>

        </div>

    </div>


    <!-- ================= TOP PRODUK + PEMBAYARAN ================= -->

    <div class="row g-4 mb-4">

        <!-- TOP PRODUK -->

        <div class="col-lg-7">

            <div class="card p-4 border-0 shadow-sm rounded-4 h-100"
                 style="background-color:#1E222D;">

                <h5 class="fw-bold text-white mb-3">

                    <i class="bi bi-trophy me-2"
                       style="color:#FFC107;"></i>

                    Top Produk Terlaris

                </h5>


                <div class="table-responsive">

                    <table class="table align-middle m-0"
                           style="background-color:#121318 !important;
                                  color:#B9D3E2 !important;">

                        <thead>

                            <tr style="background-color:#1E222D !important;
                                       color:#ffffff !important;
                                       border-bottom:2px solid #25435D;">

                                <th class="py-3 ps-3">
                                    Produk
                                </th>

                                <th class="py-3 text-center">
                                    Qty Terjual
                                </th>

                                <th class="py-3 pe-3 text-end">
                                    Total Nominal
                                </th>

                            </tr>

                        </thead>


                        <tbody id="produkTable">


                            <!-- PRODUK 1 -->

                            <tr class="produk-row"
                                onclick="detailProduk(
                                    'Kopi Susu Aren',
                                    120,
                                    1800000
                                )"
                                style="border-bottom:1px solid rgba(37,67,93,.3);cursor:pointer;">

                                <td class="py-3 ps-3 fw-semibold text-white">

                                    <i class="bi bi-cup-hot me-2"
                                       style="color:#B9D3E2;"></i>

                                    Kopi Susu Aren

                                </td>

                                <td class="py-3 text-center"
                                    style="color:#87A4B5;">

                                    120 Pcs

                                </td>

                                <td class="py-3 pe-3 text-end fw-bold"
                                    style="color:#B9D3E2;">

                                    Rp 1.800.000

                                </td>

                            </tr>


                            <!-- PRODUK 2 -->

                            <tr class="produk-row"
                                onclick="detailProduk(
                                    'Nasi Goreng Spesial',
                                    85,
                                    935000
                                )"
                                style="border-bottom:1px solid rgba(37,67,93,.3);cursor:pointer;">

                                <td class="py-3 ps-3 fw-semibold text-white">

                                    <i class="bi bi-egg-fried me-2"
                                       style="color:#B9D3E2;"></i>

                                    Nasi Goreng Spesial

                                </td>

                                <td class="py-3 text-center"
                                    style="color:#87A4B5;">

                                    85 Pcs

                                </td>

                                <td class="py-3 pe-3 text-end fw-bold"
                                    style="color:#B9D3E2;">

                                    Rp 935.000

                                </td>

                            </tr>


                            <!-- PRODUK 3 -->

                            <tr class="produk-row"
                                onclick="detailProduk(
                                    'Es Teh Manis',
                                    64,
                                    832000
                                )"
                                style="cursor:pointer;">

                                <td class="py-3 ps-3 fw-semibold text-white">

                                    <i class="bi bi-cup-straw me-2"
                                       style="color:#B9D3E2;"></i>

                                    Es Teh Manis

                                </td>

                                <td class="py-3 text-center"
                                    style="color:#87A4B5;">

                                    64 Pcs

                                </td>

                                <td class="py-3 pe-3 text-end fw-bold"
                                    style="color:#B9D3E2;">

                                    Rp 832.000

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- ================= PEMBAYARAN ================= -->

        <div class="col-lg-5">

            <div class="card p-4 border-0 shadow-sm rounded-4 h-100"
                 style="background-color:#1E222D;">

                <h5 class="fw-bold text-white mb-3">

                    <i class="bi bi-pie-chart me-2"
                       style="color:#B9D3E2;"></i>

                    Metode Pembayaran

                </h5>


                <div class="d-flex flex-column gap-3">


                    <!-- CASH -->

                    <div class="p-3 rounded-3 payment-card"
                         onclick="detailPembayaran(
                            'Tunai / Cash',
                            7200000,
                            56
                         )"
                         style="background-color:#121318;
                                border:1px solid #25435D;
                                cursor:pointer;">

                        <div class="d-flex justify-content-between mb-1">

                            <span class="fw-semibold text-white">

                                <i class="bi bi-cash me-2 text-success"></i>

                                Tunai / Cash

                            </span>

                            <span class="fw-bold"
                                  style="color:#B9D3E2;">

                                Rp 7.200.000

                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-2">

                            <small style="color:#87A4B5;">
                                56% dari total pembayaran
                            </small>

                            <small style="color:#87A4B5;">
                                56%
                            </small>

                        </div>


                        <div class="progress"
                             style="height:6px;background-color:#1E222D;">

                            <div class="progress-bar bg-success"
                                 style="width:56%;"></div>

                        </div>

                    </div>


                    <!-- QRIS -->

                    <div class="p-3 rounded-3 payment-card"
                         onclick="detailPembayaran(
                            'QRIS / E-Wallet',
                            4350000,
                            34
                         )"
                         style="background-color:#121318;
                                border:1px solid #25435D;
                                cursor:pointer;">

                        <div class="d-flex justify-content-between mb-1">

                            <span class="fw-semibold text-white">

                                <i class="bi bi-qr-code me-2 text-info"></i>

                                QRIS / E-Wallet

                            </span>

                            <span class="fw-bold"
                                  style="color:#B9D3E2;">

                                Rp 4.350.000

                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-2">

                            <small style="color:#87A4B5;">
                                34% dari total pembayaran
                            </small>

                            <small style="color:#87A4B5;">
                                34%
                            </small>

                        </div>


                        <div class="progress"
                             style="height:6px;background-color:#1E222D;">

                            <div class="progress-bar bg-info"
                                 style="width:34%;"></div>

                        </div>

                    </div>


                    <!-- DEBIT -->

                    <div class="p-3 rounded-3 payment-card"
                         onclick="detailPembayaran(
                            'Kartu Debit',
                            1300000,
                            10
                         )"
                         style="background-color:#121318;
                                border:1px solid #25435D;
                                cursor:pointer;">

                        <div class="d-flex justify-content-between mb-1">

                            <span class="fw-semibold text-white">

                                <i class="bi bi-credit-card me-2 text-warning"></i>

                                Kartu Debit

                            </span>

                            <span class="fw-bold"
                                  style="color:#B9D3E2;">

                                Rp 1.300.000

                            </span>

                        </div>


                        <div class="d-flex justify-content-between mb-2">

                            <small style="color:#87A4B5;">
                                10% dari total pembayaran
                            </small>

                            <small style="color:#87A4B5;">
                                10%
                            </small>

                        </div>


                        <div class="progress"
                             style="height:6px;background-color:#1E222D;">

                            <div class="progress-bar bg-warning"
                                 style="width:10%;"></div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>


    <!-- ================= REKAP HARIAN ================= -->

    <div class="card p-4 border-0 shadow-sm rounded-4"
         style="background-color:#1E222D;">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="fw-bold text-white mb-0">

                <i class="bi bi-calendar-check me-2"
                   style="color:#B9D3E2;"></i>

                Rekap Penjualan Harian

            </h5>


            <input type="text"
                   id="searchTanggal"
                   class="form-control form-control-sm"
                   style="background-color:#121318;
                          color:#ffffff;
                          border:1px solid #25435D;
                          max-width:200px;"
                   placeholder="Cari tanggal..."
                   onkeyup="cariTanggal()">

        </div>


        <div class="table-responsive">

            <table class="table align-middle m-0"
                   style="background-color:#121318 !important;
                          color:#B9D3E2 !important;">

                <thead>

                    <tr style="background-color:#1E222D !important;
                               color:#ffffff !important;
                               border-bottom:2px solid #25435D;">

                        <th class="py-3 ps-3">
                            Tanggal
                        </th>

                        <th class="py-3 text-center">
                            Jumlah Transaksi
                        </th>

                        <th class="py-3 text-center">
                            Produk Terjual
                        </th>

                        <th class="py-3 pe-3 text-end">
                            Total Omzet Harian
                        </th>

                    </tr>

                </thead>


                <tbody id="rekapTable">


                    <!-- 14 AGUSTUS -->

                    <tr class="rekap-row"
                        onclick="detailHarian(
                            '14 Aug 2026',
                            28,
                            62,
                            1950000
                        )"
                        style="border-bottom:1px solid rgba(37,67,93,.3);
                               cursor:pointer;">

                        <td class="py-3 ps-3 fw-semibold text-white">

                            <i class="bi bi-calendar3 me-2"
                               style="color:#B9D3E2;"></i>

                            14 Aug 2026

                        </td>

                        <td class="py-3 text-center"
                            style="color:#87A4B5;">

                            28 Nota

                        </td>

                        <td class="py-3 text-center"
                            style="color:#87A4B5;">

                            62 Items

                        </td>

                        <td class="py-3 pe-3 text-end fw-bold"
                            style="color:#B9D3E2;">

                            Rp 1.950.000

                        </td>

                    </tr>


                    <!-- 13 AGUSTUS -->

                    <tr class="rekap-row"
                        onclick="detailHarian(
                            '13 Aug 2026',
                            32,
                            78,
                            2300000
                        )"
                        style="cursor:pointer;">

                        <td class="py-3 ps-3 fw-semibold text-white">

                            <i class="bi bi-calendar3 me-2"
                               style="color:#B9D3E2;"></i>

                            13 Aug 2026

                        </td>

                        <td class="py-3 text-center"
                            style="color:#87A4B5;">

                            32 Nota

                        </td>

                        <td class="py-3 text-center"
                            style="color:#87A4B5;">

                            78 Items

                        </td>

                        <td class="py-3 pe-3 text-end fw-bold"
                            style="color:#B9D3E2;">

                            Rp 2.300.000

                        </td>

                    </tr>


                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>


// ==========================================
// DETAIL PRODUK
// ==========================================

function detailProduk(nama, qty, nominal)
{

    alert(

        'DETAIL PRODUK\n\n' +

        'Produk       : ' + nama +

        '\nQty Terjual  : ' + qty + ' Pcs' +

        '\nTotal Nominal: Rp ' +
        formatRupiah(nominal)

    );

}


// ==========================================
// DETAIL PEMBAYARAN
// ==========================================

function detailPembayaran(nama, nominal, persen)
{

    alert(

        'DETAIL METODE PEMBAYARAN\n\n' +

        'Metode : ' + nama +

        '\nNominal: Rp ' +
        formatRupiah(nominal) +

        '\nPersentase: ' + persen + '%'

    );

}


// ==========================================
// DETAIL HARIAN
// ==========================================

function detailHarian(
    tanggal,
    transaksi,
    produk,
    omzet
)
{

    alert(

        'REKAP PENJUALAN HARIAN\n\n' +

        'Tanggal      : ' + tanggal +

        '\nTransaksi    : ' + transaksi + ' Nota' +

        '\nProduk       : ' + produk + ' Items' +

        '\nTotal Omzet  : Rp ' +
        formatRupiah(omzet)

    );

}


// ==========================================
// FILTER TANGGAL
// ==========================================

function filterLaporan()
{

    let mulai =
        document.getElementById(
            'tanggalMulai'
        ).value;


    let akhir =
        document.getElementById(
            'tanggalAkhir'
        ).value;


    if (!mulai || !akhir)
    {

        alert(
            'Silakan isi tanggal mulai dan tanggal akhir.'
        );

        return;

    }


    if (mulai > akhir)
    {

        alert(
            'Tanggal mulai tidak boleh lebih besar dari tanggal akhir.'
        );

        return;

    }


    alert(

        'Filter laporan berhasil diterapkan.\n\n' +

        'Periode:\n' +

        formatTanggal(mulai) +

        ' sampai ' +

        formatTanggal(akhir)

    );

}


// ==========================================
// SEARCH TANGGAL
// ==========================================

function cariTanggal()
{

    let keyword =
        document.getElementById(
            'searchTanggal'
        ).value.toLowerCase();


    let rows =
        document.querySelectorAll(
            '.rekap-row'
        );


    rows.forEach(row =>
    {

        let text =
            row.innerText.toLowerCase();


        if (text.includes(keyword))
        {

            row.style.display = '';

        }
        else
        {

            row.style.display = 'none';

        }

    });

}


// ==========================================
// EXPORT
// ==========================================

function exportLaporan()
{

    alert(
        'Laporan berhasil disiapkan untuk export.'
    );


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


// ==========================================
// FORMAT TANGGAL
// ==========================================

function formatTanggal(tanggal)
{

    let date =
        new Date(tanggal);


    return date.toLocaleDateString(
        'id-ID',
        {
            day:'2-digit',
            month:'long',
            year:'numeric'
        }
    );

}

</script>


<!-- ================= CSS ================= -->

<style>

.produk-row,
.rekap-row,
.payment-card {

    transition:
        background-color .2s ease,
        transform .2s ease,
        border-color .2s ease;

}


.produk-row:hover,
.rekap-row:hover {

    background-color:#1E222D !important;

    transform:translateX(3px);

}


.payment-card:hover {

    background-color:#1E222D !important;

    border-color:#7D0018 !important;

    transform:translateY(-2px);

}


.form-control:focus {

    background-color:#121318 !important;

    color:#ffffff !important;

    border-color:#7D0018 !important;

    box-shadow:
        0 0 0 .2rem
        rgba(125,0,24,.15);

}


@media print {

    body * {

        visibility:hidden;

    }


    .p-4,
    .p-4 * {

        visibility:visible;

    }


    .p-4 {

        position:absolute;

        left:0;

        top:0;

        width:100%;

    }

}

</style>

@endsection
