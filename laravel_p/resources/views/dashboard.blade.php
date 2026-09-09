@extends('template.master')

@section('title', 'Dashboard Penjualan')

@section('content')

<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh;">

    <!-- HEADER -->
    <div class="pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
        <h2 class="m-0 fw-bold text-white">
            Dashboard Penjualan
        </h2>
    </div>

    <!-- 4 CARD INFO UTAMA (BERWARNA & BISA DIKLIK) -->
    <div class="row g-3">

        <!-- 1. TOTAL PENJUALAN (BIRU -> KE LAPORAN) -->
        <div class="col-md-3">
            <a href="{{ url('/laporan') }}" class="text-decoration-none">
                <div class="card p-3 border-0 rounded-4 text-white dashboard-card" style="background-color: #0d6efd;">
                    <div class="small text-uppercase fw-bold mb-1" style="opacity: 0.85; font-size: 12px; letter-spacing: 0.5px;">
                        TOTAL PENJUALAN
                    </div>
                    <h3 class="fw-bold m-0">
                        Rp {{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}
                    </h3>
                </div>
            </a>
        </div>

        <!-- 2. TRANSAKSI HARI INI (HIJAU -> KE RIWAYAT) -->
        <div class="col-md-3">
            <a href="{{ url('/riwayat') }}" class="text-decoration-none">
                <div class="card p-3 border-0 rounded-4 text-white dashboard-card" style="background-color: #198754;">
                    <div class="small text-uppercase fw-bold mb-1" style="opacity: 0.85; font-size: 12px; letter-spacing: 0.5px;">
                        TRANSAKSI HARI INI
                    </div>
                    <h3 class="fw-bold m-0">
                        {{ $transaksiHariIni ?? 0 }} Transaksi
                    </h3>
                </div>
            </a>
        </div>

        <!-- 3. TOTAL MENU (KUNING -> KE PRODUK) -->
        <div class="col-md-3">
            <a href="{{ url('/produk') }}" class="text-decoration-none">
                <div class="card p-3 border-0 rounded-4 text-dark dashboard-card" style="background-color: #ffc107;">
                    <div class="small text-uppercase fw-bold mb-1" style="opacity: 0.85; font-size: 12px; letter-spacing: 0.5px;">
                        TOTAL MENU
                    </div>
                    <h3 class="fw-bold m-0">
                        {{ $totalMenu ?? 0 }} Item
                    </h3>
                </div>
            </a>
        </div>

        <!-- 4. PRODUK TERLARIS (MERAH -> KE LAPORAN) -->
        <div class="col-md-3">
            <a href="{{ url('/laporan') }}" class="text-decoration-none">
                <div class="card p-3 border-0 rounded-4 text-white dashboard-card" style="background-color: #dc3545;">
                    <div class="small text-uppercase fw-bold mb-1" style="opacity: 0.85; font-size: 12px; letter-spacing: 0.5px;">
                        PRODUK TERLARIS
                    </div>
                    <h3 class="fw-bold m-0 text-truncate">
                        {{ $produkTerlaris ?? '-' }}
                    </h3>
                </div>
            </a>
        </div>

    </div>

</div>

<!-- CSS EFEK HOVER & KURSER KLIK -->
<style>
.dashboard-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    cursor: pointer;
}
.dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
}
</style>

@endsection