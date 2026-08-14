<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Kasir POS</title>
  <!-- Bootstrap 5 CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #121318;
      color: #E1E7ED;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }
    .login-card {
      background-color: #1E222D;
      border: 1px solid #25435D;
      width: 100%;
      max-width: 420px;
    }
    .form-control:focus {
      background-color: #121318 !important;
      color: #ffffff !important;
      border-color: #4C6C81 !important;
      box-shadow: 0 0 0 0.25rem rgba(76, 108, 129, 0.25) !important;
    }
    .input-group-text {
      border: 1px solid transparent;
    }
    .btn-login {
      background-color: #7D0018;
      color: #ffffff;
      transition: all 0.2s ease-in-out;
    }
    .btn-login:hover {
      background-color: #A30020;
      color: #ffffff;
      transform: translateY(-1px);
    }
    .btn-quick-fill {
      background-color: #121318;
      border: 1px solid #25435D;
      color: #87A4B5;
      font-size: 0.8rem;
      transition: all 0.2s;
    }
    .btn-quick-fill:hover {
      background-color: #25435D;
      color: #ffffff;
    }
  </style>
</head>
<body>

<div class="login-card p-4 p-sm-5 shadow-lg rounded-4 m-3">
  
  <!-- Logo & Branding Header -->
  <div class="text-center mb-4">
    <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle mb-3" style="background-color: rgba(125, 0, 24, 0.2); color: #FF4D6D;">
      <i class="bi bi-cart3 fs-1"></i>
    </div>
    <h3 class="fw-bold text-white mb-1">KASIR POS</h3>
    <p class="small m-0" style="color: #87A4B5;">Masukan akun kasir untuk memulai sesi</p>
  </div>

  <!-- Pesan Alert Notifikasi/Error -->
  @if(session('error'))
    <div class="alert border-0 py-2 px-3 small mb-4 rounded-3 d-flex align-items-center gap-2" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B; border: 1px solid #7D0018 !important;">
      <i class="bi bi-exclamation-triangle-fill fs-6"></i>
      <div>{{ session('error') }}</div>
    </div>
  @endif

  <!-- Fitur Pilih Akun Cepat (Quick Fill) -->
  <div class="mb-4">
    <label class="form-label small fw-semibold d-block mb-2" style="color: #87A4B5;">Isi Otomatis (Demo):</label>
    <div class="d-flex gap-2">
      <button type="button" class="btn btn-quick-fill w-100 rounded-2 py-1.5" onclick="fillCredentials('kasir01', 'kasir123')">
        <i class="bi bi-person-badge me-1"></i> Kasir 1
      </button>
      <button type="button" class="btn btn-quick-fill w-100 rounded-2 py-1.5" onclick="fillCredentials('admin', 'admin123')">
        <i class="bi bi-shield-lock me-1"></i> Admin
      </button>
    </div>
  </div>

  <form action="{{ url('/login-process') }}" method="POST">
    @csrf
    
    <!-- Input Username -->
    <div class="mb-3">
      <label class="form-label small fw-semibold" style="color: #87A4B5;">Username / Nama</label>
      <div class="input-group">
        <span class="input-group-text border-0" style="background-color: #121318; color: #87A4B5;">
          <i class="bi bi-person"></i>
        </span>
        <input type="text" id="usernameInput" name="username" class="form-control border-0 py-2" style="background-color: #121318; color: #ffffff;" placeholder="Ketik username Anda" required autocomplete="off">
      </div>
    </div>

    <!-- Input Password dengan Toggle Eye -->
    <div class="mb-3">
      <label class="form-label small fw-semibold" style="color: #87A4B5;">Password</label>
      <div class="input-group">
        <span class="input-group-text border-0" style="background-color: #121318; color: #87A4B5;">
          <i class="bi bi-lock"></i>
        </span>
        <input type="password" id="passwordInput" name="password" class="form-control border-0 py-2" style="background-color: #121318; color: #ffffff;" placeholder="Ketik password Anda" required>
        <button type="button" class="btn border-0 px-3" style="background-color: #121318; color: #87A4B5;" onclick="togglePassword()">
          <i class="bi bi-eye" id="toggleIcon"></i>
        </button>
      </div>
    </div>

    <!-- Remember Me & Forgot Pass -->
    <div class="d-flex justify-content-between align-items-center mb-4 small">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="rememberMe" style="background-color: #121318; border-color: #25435D;">
        <label class="form-check-label" for="rememberMe" style="color: #87A4B5;">Ingat Saya</label>
      </div>
      <a href="#" class="text-decoration-none" style="color: #B9D3E2;">Lupa password?</a>
    </div>

    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-login w-100 py-2.5 fw-bold border-0 shadow rounded-3">
      <i class="bi bi-box-arrow-in-right me-2"></i> MASUK KE SISTEM
    </button>
  </form>

  <!-- Footer Info -->
  <div class="text-center mt-4 pt-3 border-top" style="border-color: #25435D !important;">
    <small style="color: #87A4B5;">POS System v2.4 &copy; {{ date('Y') }}</small>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Fungsi untuk menyembunyikan / menampilkan password
  function togglePassword() {
    const pwdInput = document.getElementById('passwordInput');
    const icon = document.getElementById('toggleIcon');
    if (pwdInput.type === 'password') {
      pwdInput.type = 'text';
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      pwdInput.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  }

  // Fungsi untuk otomatis mengisi text box (Quick Fill)
  function fillCredentials(username, password) {
    document.getElementById('usernameInput').value = username;
    document.getElementById('passwordInput').value = password;
  }
</script>
</body>
</html>
