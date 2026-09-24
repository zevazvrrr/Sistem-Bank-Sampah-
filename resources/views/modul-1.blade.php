<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<title>Login - Bank Sampah</title>
<link rel="stylesheet" href="login.css">
</head>
<body>

  <div class="login-card">
    <div class="login-logo">
      <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="white" stroke-width="2">
        <path d="M7 3 3 7l4 4"/><path d="M3 7h11a5 5 0 0 1 5 5v1"/>
        <path d="m17 21 4-4-4-4"/><path d="M21 17H10a5 5 0 0 1-5-5v-1"/>
      </svg>
    </div>

    <h1 class="login-title">BANK SAMPAH</h1>
    <p class="login-subtitle">Layanan Bank Sampah Terpadu</p>

    @if ($errors->has('error'))
      <div class="alert-error">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="9"/><path d="M12 8v5"/><path d="M12 16h.01"/>
        </svg>
        {{ $errors->first('error') }}
      </div>
    @endif

    <form action="{{ url('/login-process') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="username">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"/></svg>
          Username
        </label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>

      <div class="form-group">
        <div class="label-row">
          <label for="password">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
            Password
          </label>
          <a href="#" class="forgot-link">Lupa Password?</a>
        </div>
        <div class="input-wrap">
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
          <button type="button" class="toggle-pass" onclick="togglePassword()">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>

      <label class="remember-row">
        <input type="checkbox" name="remember">
        Ingat saya di perangkat ini
      </label>

      <button type="submit" class="btn-login">
        Masuk ke Sistem
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="white" stroke-width="2"><path d="M14 4h6v16h-6"/><path d="M10 17l5-5-5-5"/><path d="M15 12H4"/></svg>
      </button>
    </form>

    <hr class="divider">

    <p class="signup-text">Belum memiliki akun Nasabah?</p>
    <a href="#" class="btn-register">Daftar Akun Baru</a>
  </div>

  <p class="footer-copy">&copy; 2026 Bank Sampah System</p>

<script>
function togglePassword() {
  const input = document.getElementById('password');
  input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
</body>
</html>
