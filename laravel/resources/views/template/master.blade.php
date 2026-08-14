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
    /* Base Page & Layout */
    body { 
      background-color: #121318 !important; 
      color: #E1E7ED !important; 
      min-height: 100vh; 
      margin: 0; 
    }
    
    .sidebar { 
      min-height: 100vh; 
      background-color: #1E222D !important; 
      border-right: 1px solid #25435D !important; 
      display: flex; 
      flex-direction: column; 
    }
    
    .nav-link { 
      color: #87A4B5; 
      margin-bottom: 4px; 
      border-radius: 6px; 
    }
    .nav-link:hover { 
      color: #fff; 
      background-color: rgba(255, 255, 255, 0.05); 
    }
    .nav-link.active { 
      color: #fff; 
      background-color: #0d6efd !important; 
      font-weight: bold; 
    }

    /* PAKSA SEMUA KOMPONEN MENJADI DARK MODE TOTAL */
    .card, 
    .bg-white, 
    .modal-content, 
    .list-group-item { 
      background-color: #1E222D !important; 
      border-color: #25435D !important; 
      color: #E1E7ED !important; 
    }

    /* Perbaikan Tabel Gelap */
    .table, 
    .table > :not(caption) > * > * {
      background-color: transparent !important;
      color: #B9D3E2 !important;
      border-color: rgba(37, 67, 93, 0.4) !important;
    }

    .table thead, 
    .table thead tr, 
    .table thead th {
      background-color: #1E222D !important;
      color: #ffffff !important;
      border-bottom: 2px solid #25435D !important;
    }

    /* Input Form & Select */
    .form-control, .form-select {
      background-color: #121318 !important;
      color: #ffffff !important;
      border-color: #25435D !important;
    }
    .form-control::placeholder { color: #87A4B5 !important; }

    /* Custom Scrollbar */
    .custom-scroll::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    .custom-scroll::-webkit-scrollbar-track {
      background: #121318;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
      background: #25435D;
      border-radius: 4px;
    }
    .custom-scroll::-webkit-scrollbar-thumb:hover {
      background: #3A6284;
    }

    .text-muted { color: #87A4B5 !important; }
  </style>
</head>
<body>

  <div class="d-flex">
   <!-- Sidebar Navigasi -->
    <div class="sidebar p-3" style="width: 240px;">
      <h4 class="fw-bold text-white mb-4 px-2">Kasir</h4>
      
      <ul class="nav nav-pills flex-column mb-auto">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
        </li>

        <!-- Transaksi Kasir -->
        <li>
          <a href="/kasir" class="nav-link {{ request()->is('kasir*') ? 'active' : '' }}">
            <i class="bi bi-cart3 me-2"></i> Transaksi Kasir
          </a>
        </li>

        <!-- Kelola Produk -->
        <li>
          <a href="/produk" class="nav-link {{ request()->is('produk*') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i> Kelola Produk
          </a>
        </li>

        <!-- Riwayat -->
        <li>
          <a href="/riwayat" class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
            <i class="bi bi-clock-history me-2"></i> Riwayat
          </a>
        </li>

        <!-- Laporan -->
        <li>
          <a href="/laporan" class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart me-2"></i> Laporan
          </a>
        </li>
      </ul>

      <hr style="border-color: #25435D;">

      <!-- Tombol Logout -->
      <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start px-3 py-2" style="cursor: pointer;">
          <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
      </form>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow-1">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
