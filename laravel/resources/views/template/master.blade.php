<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Aplikasi Kasir')</title>
  
  <!-- CSS Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  
  <style>
    /* ============================================================
       Definisi Variabel Warna Berdasarkan Palet yang Anda Berikan
       ============================================================ */
    :root {
      /* Deep Reds */
      --color-primary-red: #7D0018; /* Merah cerah (#1) */
      --color-deep-burgundy: #340A13; /* Burgundy gelap (#2) */
      --color-near-black: #010003; /* Hampir Hitam (#3) */

      /* Cool Grey-Blues */
      --color-blue-grey-dark: #25435D; /* Biru-abu tua (#4) */
      --color-blue-grey-mid: #4C6C81; /* Biru-abu sedang (#5) */
      --color-blue-grey-light: #87A4B5; /* Biru-abu muda (#6) */
      --color-blue-pastel-light: #B9D3E2; /* Biru pastel terang (#7) */

      /* Teks & Kontras */
      --text-color-primary: #B9D3E2; /* Teks terang utama (menggunakan #7) */
      --text-color-muted: #87A4B5; /* Teks pelengkap (menggunakan #6) */
      --text-color-on-light: #25435D; /* Teks gelap pada latar terang (menggunakan #4) */
    }

    /* -----------------------------------------------------------
       Gaya Global (Latar Belakang & Teks Utama)
    ----------------------------------------------------------- */
    body { 
      background-color: var(--color-near-black); /* Latar belakang: Hampir Hitam (#3) */
      color: var(--text-color-primary); /* Teks utama: Biru pastel terang (#7) */
      min-height: 100vh; 
      margin: 0; 
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* -----------------------------------------------------------
       Sidebar / Navigasi Kiri
    ----------------------------------------------------------- */
    .sidebar { 
      min-height: 100vh; 
      background-color: var(--color-deep-burgundy); /* Sidebar: Burgundy gelap (#2) */
      border-right: 2px solid var(--color-primary-red); /* Border: Merah cerah (#1) */
      display: flex; 
      flex-direction: column; 
    }

    /* Gaya Judul Sidebar */
    .sidebar h4 {
      color: var(--color-primary-red) !important; /* Judul sidebar: Merah cerah (#1) */
      font-weight: bold;
    }
    .sidebar h4 i {
        color: var(--color-blue-pastel-light) !important; /* Ikon judul: Biru pastel terang (#7) */
    }

    /* Menu Link Navigasi */
    .nav-link { 
      color: var(--text-color-muted) !important; /* Warna teks menu: Biru-abu muda (#6) */
      margin-bottom: 6px; 
      border-radius: 8px; 
      font-weight: 600;
      transition: all 0.2s ease-in-out;
    }
    .nav-link:hover { 
      color: var(--color-near-black) !important; /* Teks jadi gelap saat hover */
      background-color: var(--color-blue-grey-light); /* Background hover: Biru-abu muda (#6) */
    }
    .nav-link.active { 
      color: var(--color-near-black) !important; /* Teks aktif jadi gelap */
      background-color: var(--color-primary-red) !important; /* Background aktif: Merah cerah (#1) */
      box-shadow: 0 4px 10px rgba(125, 0, 24, 0.4);
    }

    /* Ikon Menu */
    .nav-link i {
        color: inherit !important; /* Warna ikon mengikuti warna teks menu */
    }

    /* -----------------------------------------------------------
       Card & Komponen Konten
    ----------------------------------------------------------- */
    .card { 
      background-color: var(--color-blue-grey-dark); /* Latar card: Biru-abu tua (#4) */
      border: 1px solid var(--color-blue-grey-mid); /* Border card: Biru-abu sedang (#5) */
      color: var(--text-color-primary); /* Teks card: Biru pastel terang (#7) */
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(1, 0, 3, 0.5); /* Shadow gelap */
    }
    .card .text-muted {
        color: var(--text-color-muted) !important; /* Teks muted dalam card: Biru-abu muda (#6) */
    }

    /* -----------------------------------------------------------
       Komponen Input & Form
    ----------------------------------------------------------- */
    .form-control, .input-group-text {
      background-color: var(--color-near-black) !important; /* Input: Hampir Hitam (#3) */
      border-color: var(--color-blue-grey-mid) !important; /* Border input: Biru-abu sedang (#5) */
      color: var(--text-color-primary) !important; /* Teks input: Biru pastel terang (#7) */
    }
    .form-control:focus {
      border-color: var(--color-primary-red) !important; /* Border focus: Merah cerah (#1) */
      box-shadow: 0 0 0 0.25rem rgba(125, 0, 24, 0.25) !important;
    }
    .form-control::placeholder {
        color: var(--text-color-muted) !important; /* Placeholder: Biru-abu muda (#6) */
        opacity: 0.7;
    }

    /* -----------------------------------------------------------
       Tabel Tema Gelap
    ----------------------------------------------------------- */
    .table {
      color: var(--text-color-primary) !important; /* Teks tabel: Biru pastel terang (#7) */
    }
    .table-dark {
      background-color: var(--color-blue-grey-dark) !important; /* Latar tabel: Biru-abu tua (#4) */
      color: var(--text-color-primary) !important;
    }
    .table-dark th {
      background-color: var(--color-deep-burgundy) !important; /* Header tabel: Burgundy gelap (#2) */
      color: var(--color-primary-red) !important; /* Teks header: Merah cerah (#1) */
      border-color: var(--color-blue-grey-mid) !important; /* Border header: Biru-abu sedang (#5) */
    }
    .table-dark td {
      background-color: var(--color-blue-grey-dark) !important; /* Baris tabel: Biru-abu tua (#4) */
      border-color: var(--color-blue-grey-mid) !important; /* Border baris: Biru-abu sedang (#5) */
      color: var(--text-color-primary) !important;
    }
    /* Hover effect pada baris tabel */
    .table-hover tbody tr:hover {
        background-color: var(--color-blue-grey-mid) !important; /* Warna hover baris: Biru-abu sedang (#5) */
        color: var(--color-near-black) !important; /* Teks jadi gelap saat hover baris */
    }

    /* -----------------------------------------------------------
       Tombol Utama Tema Merah
    ----------------------------------------------------------- */
    .btn-primary {
      background-color: var(--color-primary-red) !important; /* Tombol utama: Merah cerah (#1) */
      border-color: var(--color-primary-red) !important;
      color: var(--color-near-black) !important; /* Teks tombol: Hampir Hitam (#3) untuk kontras */
      border-radius: 8px;
      font-weight: bold;
    }
    .btn-primary:hover {
      background-color: var(--color-deep-burgundy) !important; /* Hover tombol: Burgundy gelap (#2) */
      border-color: var(--color-deep-burgundy) !important;
      color: var(--color-primary-red) !important; /* Teks hover: Merah cerah (#1) */
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row min-vh-100">
    <!-- Sidebar / Navigasi Kiri -->
    <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
      <h4 class="text-center py-2 border-bottom border-danger-subtle fw-bold">
        <i class="bi bi-shop me-1"></i> Kasir POS
      </h4>
      
      <ul class="nav nav-pills flex-column mt-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('kasir') ? 'active' : '' }}" href="{{ url('/kasir') }}">
            <i class="bi bi-cart3 me-2"></i> Transaksi Kasir
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="{{ url('/produk') }}">
            <i class="bi bi-box-seam me-2"></i> Kelola Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('riwayat') ? 'active' : '' }}" href="{{ url('/riwayat') }}">
            <i class="bi bi-receipt me-2"></i> Riwayat
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}" href="{{ url('/laporan') }}">
            <i class="bi bi-graph-up me-2"></i> Laporan
          </a>
        </li>
      </ul>

      <!-- TOMBOL LOGOUT -->
      <div class="mt-auto pt-4 border-top border-danger-subtle">
        <a href="{{ url('/logout') }}" class="nav-link text-danger fw-bold">
          <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
      </div>
    </nav>

    <!-- Area Konten Utama -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
      @yield('content')
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>