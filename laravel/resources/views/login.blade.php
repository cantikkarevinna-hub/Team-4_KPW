<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Kasir POS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Latar Belakang: #010003 (Hampir Hitam) */
    body { background-color: #010003; color: #B9D3E2; height: 100vh; display: flex; align-items: center; justify-content: center; }
    
    /* Card: #25435D (Biru-Abu Tua) dengan Border #4C6C81 */
    .card { background-color: #25435D; border: 1px solid #4C6C81; width: 100%; max-width: 400px; border-radius: 20px; box-shadow: 0 8px 24px rgba(1, 0, 3, 0.6); }
    
    /* Tombol: #7D0018 (Merah Tua) */
    .btn-pink { background-color: #7D0018; color: #B9D3E2; font-weight: bold; border: none; }
    .btn-pink:hover { background-color: #340A13; color: #ffffff; }

    /* Input & Group Icon */
    .form-control, .input-group-text {
      background-color: #010003 !important;
      border-color: #4C6C81 !important;
      color: #B9D3E2 !important;
    }
    .form-control::placeholder {
      color: #87A4B5 !important;
      opacity: 0.7;
    }
    .form-control:focus {
      border-color: #7D0018 !important;
      box-shadow: 0 0 0 0.25rem rgba(125, 0, 24, 0.25) !important;
    }
  </style>
</head>
<body>

<div class="card p-4">
  <div class="text-center mb-4">
    <h3 class="fw-bold" style="color: #7D0018;"><i class="bi bi-cart3 me-2" style="color: #B9D3E2;"></i>KASIR POS</h3>
    <p class="small" style="color: #87A4B5;">Masukan Nama & Password untuk masuk</p>
  </div>

  @if(session('error'))
    <div class="alert alert-danger py-2 small mb-3 text-center" style="background-color: #340A13; border-color: #7D0018; color: #B9D3E2;">
      <i class="bi bi-exclamation-triangle-fill me-1" style="color: #7D0018;"></i> {{ session('error') }}
    </div>
  @endif

  <form action="{{ url('/login-process') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label small" style="color: #87A4B5;">Nama / Username</label>
      <div class="input-group">
        <span class="input-group-text border-end-0"><i class="bi bi-person" style="color: #7D0018;"></i></span>
        <input type="text" name="username" class="form-control border-start-0" placeholder="Ketik nama/username" required autocomplete="off">
      </div>
    </div>

    <div class="mb-4">
      <label class="form-label small" style="color: #87A4B5;">Password</label>
      <div class="input-group">
        <span class="input-group-text border-end-0"><i class="bi bi-lock" style="color: #7D0018;"></i></span>
        <input type="password" name="password" class="form-control border-start-0" placeholder="Ketik password" required>
      </div>
    </div>

    <button type="submit" class="btn btn-pink w-100 py-2 rounded-3">
      <i class="bi bi-box-arrow-in-right me-2"></i> LOG IN
    </button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>