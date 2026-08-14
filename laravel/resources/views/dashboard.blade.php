@extends('template.master')

@section('title', 'Dashboard - POS Kasir')

@section('content')

<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom"
         style="border-color: #25435D !important;">

        <div>
            <h3 class="m-0 fw-bold" style="color: #ffffff;">
                <i class="bi bi-speedometer2 me-2" style="color: #B9D3E2;"></i>
                Dashboard Ringkasan
            </h3>

            <small style="color: #87A4B5;">
                Selamat datang di Sistem POS Kasir
            </small>
        </div>

        <span style="color: #87A4B5;">
            <i class="bi bi-calendar3 me-1"></i>
            {{ date('d M Y') }}
        </span>

    </div>


    <!-- STAT CARDS -->
    <div class="row g-3 mb-4">

        <!-- TOTAL PENJUALAN -->
        <div class="col-md-3">

            <a href="{{ url('/laporan') }}"
               class="text-decoration-none">

                <div class="card p-3 border-0 rounded-3 dashboard-card"
                     style="background-color: #1E222D;
                            border: 1px solid #25435D !important;">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="small"
                                 style="color: #87A4B5;">
                                Total Penjualan
                            </div>

                            <h4 class="fw-bold m-0 mt-1"
                                style="color: #ffffff;">
                                Rp 1.450.000
                            </h4>

                            <small style="color: #87A4B5;">
                                Klik untuk melihat laporan
                            </small>

                        </div>

                        <div class="p-3 rounded-3"
                             style="background-color: rgba(13,110,253,.1);
                                    color:#0d6efd;">

                            <i class="bi bi-currency-dollar fs-3"></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>


        <!-- TOTAL TRANSAKSI -->
        <div class="col-md-3">

            <a href="{{ url('/transaksi') }}"
               class="text-decoration-none">

                <div class="card p-3 border-0 rounded-3 dashboard-card"
                     style="background-color:#1E222D;
                            border:1px solid #25435D !important;">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="small"
                                 style="color:#87A4B5;">
                                Total Transaksi
                            </div>

                            <h4 class="fw-bold m-0 mt-1"
                                style="color:#ffffff;">
                                48 Transaksi
                            </h4>

                            <small style="color:#87A4B5;">
                                Klik untuk melihat transaksi
                            </small>

                        </div>

                        <div class="p-3 rounded-3"
                             style="background-color:rgba(25,135,84,.1);
                                    color:#198754;">

                            <i class="bi bi-cart-check fs-3"></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>


        <!-- TOTAL PRODUK -->
        <div class="col-md-3">

            <a href="{{ url('/produk') }}"
               class="text-decoration-none">

                <div class="card p-3 border-0 rounded-3 dashboard-card"
                     style="background-color:#1E222D;
                            border:1px solid #25435D !important;">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="small"
                                 style="color:#87A4B5;">
                                Total Produk
                            </div>

                            <h4 class="fw-bold m-0 mt-1"
                                style="color:#ffffff;">
                                120 Item
                            </h4>

                            <small style="color:#87A4B5;">
                                Klik untuk mengelola produk
                            </small>

                        </div>

                        <div class="p-3 rounded-3"
                             style="background-color:rgba(255,193,7,.1);
                                    color:#ffc107;">

                            <i class="bi bi-box-seam fs-3"></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>


        <!-- PELANGGAN -->
        <div class="col-md-3">

            <a href="{{ url('/pelanggan') }}"
               class="text-decoration-none">

                <div class="card p-3 border-0 rounded-3 dashboard-card"
                     style="background-color:#1E222D;
                            border:1px solid #25435D !important;">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="small"
                                 style="color:#87A4B5;">
                                Pelanggan
                            </div>

                            <h4 class="fw-bold m-0 mt-1"
                                style="color:#ffffff;">
                                32 Orang
                            </h4>

                            <small style="color:#87A4B5;">
                                Klik untuk melihat pelanggan
                            </small>

                        </div>

                        <div class="p-3 rounded-3"
                             style="background-color:rgba(13,202,240,.1);
                                    color:#0dcaf0;">

                            <i class="bi bi-people fs-3"></i>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>


    <!-- FORM INPUT CEPAT -->
    <div class="card p-4 border-0 rounded-4 mb-4"
         style="background-color:#1E222D;
                border:1px solid #25435D !important;">

        <h5 class="fw-bold mb-3"
            style="color:#ffffff;">

            <i class="bi bi-pencil-square me-2"></i>
            Input Cepat Produk

        </h5>

        <form action="{{ url('/produk/store') }}" method="POST">

            @csrf

            <div class="row g-3">

                <!-- NAMA PRODUK -->
                <div class="col-md-4">

                    <label class="form-label"
                           style="color:#87A4B5;">
                        Nama Produk
                    </label>

                    <input type="text"
                           name="nama_produk"
                           class="form-control"
                           placeholder="Masukkan nama produk"
                           required>

                </div>


                <!-- HARGA -->
                <div class="col-md-4">

                    <label class="form-label"
                           style="color:#87A4B5;">
                        Harga
                    </label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           placeholder="Masukkan harga"
                           required>

                </div>


                <!-- STOK -->
                <div class="col-md-4">

                    <label class="form-label"
                           style="color:#87A4B5;">
                        Stok
                    </label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           placeholder="Masukkan jumlah stok"
                           required>

                </div>

            </div>


            <div class="mt-3">

                <button type="submit"
                        class="btn fw-bold px-4"
                        style="background-color:#7D0018;
                               color:#ffffff;">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Produk

                </button>

            </div>

        </form>

    </div>


    <!-- TERMINAL KASIR -->
    <div class="card p-4 border-0 rounded-4 text-center"
         style="background-color:#1E222D;
                border:1px solid #25435D !important;">

        <h5 class="fw-bold mb-2"
            style="color:#ffffff;">

            <i class="bi bi-cart-check me-2"></i>
            Mulai Transaksi Penjualan

        </h5>

        <p class="small mb-3"
           style="color:#87A4B5;">

            Klik tombol di bawah untuk membuka Terminal Kasir POS.

        </p>

        <div>

            <a href="{{ url('/kasir') }}"
               class="btn btn-lg px-4 fw-bold border-0"
               style="background-color:#7D0018;
                      color:#ffffff;">

                <i class="bi bi-cart3 me-2"></i>

                Buka Terminal Kasir

            </a>

        </div>

    </div>

</div>


<!-- CSS INTERAKTIF -->
<style>

.dashboard-card {
    transition: all 0.2s ease;
    cursor: pointer;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    border-color: #7D0018 !important;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

.dashboard-card:active {
    transform: scale(0.98);
}

.form-control {
    background-color: #121318;
    border: 1px solid #25435D;
    color: #ffffff;
}

.form-control:focus {
    background-color: #121318;
    color: #ffffff;
    border-color: #7D0018;
    box-shadow: 0 0 0 0.2rem rgba(125,0,24,.2);
}

.form-control::placeholder {
    color: #6c757d;
}

</style>

@endsection
