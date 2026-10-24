@extends('layouts.app')

@section('title', 'Login Pengelola - Desa Jalatrang')

@section('content')
<style>
    .login-container {
        max-width: 440px;
        margin: 0 auto;
    }
    .login-card {
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 10px 25px -5px rgba(15, 52, 96, 0.1), 0 8px 10px -6px rgba(15, 52, 96, 0.05);
    }
    .login-header {
        background: linear-gradient(135deg, #0f3460, #1a1a6e);
        border-radius: 16px 16px 0 0 !important;
        padding: 25px 20px;
    }
    .form-control:focus {
        border-color: #0f3460;
        box-shadow: 0 0 0 0.25rem rgba(15, 52, 96, 0.15);
    }
    .btn-login {
        background-color: #0f3460;
        border: none;
        padding: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        background-color: #1a1a6e;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(15, 52, 96, 0.25);
    }
    .input-group-text {
        background-color: #f8fafc;
        border-right: none;
        color: #64748b;
    }
    .input-group .form-control {
        border-left: none;
    }
    .input-group .form-control:focus + .input-group-text,
    .input-group:focus-within .input-group-text {
        border-color: #0f3460;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 login-container">

            {{-- Logo & Identitas Desa --}}
            <div class="text-center mb-4">
                <img src="https://jalatrang.id/assets/images/info_desa/logo.png" alt="Logo Desa Jalatrang" style="height: 60px;" class="mb-2">
                <h5 class="fw-bold text-dark mb-0">PEMERINTAH DESA JALATRANG</h5>
                <p class="text-muted small">Sistem Informasi & Pengelolaan Portal Desa</p>
            </div>

            {{-- Card Form Login --}}
            <div class="card login-card">
                <div class="login-header text-center text-white">
                    <h5 class="fw-bold mb-1"><i class="fas fa-user-shield me-2 text-warning"></i>Login Pengelola</h5>
                    <p class="small text-white-50 mb-0">Masuk untuk mengelola data dan informasi desa</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        {{-- Input Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold text-secondary">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="nama@jalatrang.id">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Password --}}
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label small fw-semibold text-secondary">Kata Sandi</label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control" required placeholder="••••••••">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-color: #dee2e6;">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" name="ingat" class="form-check-input" id="ingat">
                                <label class="form-check-label small text-secondary" for="ingat">Ingat saya di perangkat ini</label>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary btn-login w-100 rounded-3 shadow-sm">
                            <i class="fas fa-sign-in-alt me-2"></i> Masuk ke Panel
                        </button>
                    </form>
                </div>
            </div>

            {{-- Footer Info --}}
            <div class="text-center mt-4">
                <a href="{{ route('berita.index') }}" class="text-decoration-none small text-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Utama
                </a>
            </div>

        </div>
    </div>
</div>

<script>
    // Fitur toggle show/hide password
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>
@endsection
