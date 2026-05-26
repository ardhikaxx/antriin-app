@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="auth-card">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="background: linear-gradient(to right, #00d4d4, #1976d2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ANTRIIN</h2>
        <p class="text-secondary">Silakan login ke akun Anda</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label text-secondary small fw-bold">USERNAME</label>
            <input type="text" name="username" class="form-control form-control-antriin" placeholder="Masukkan username" required value="{{ old('username') }}">
        </div>
        <div class="mb-4">
            <label class="form-label text-secondary small fw-bold">PASSWORD</label>
            <input type="password" name="password" class="form-control form-control-antriin" placeholder="Masukkan password" required>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-secondary small" for="remember">
                    Ingat Saya
                </label>
            </div>
            <a href="#" class="text-cyan small text-decoration-none" style="color: var(--accent-cyan);">Lupa Password?</a>
        </div>

        <button type="submit" class="btn btn-antriin w-100 mb-3">LOGIN</button>
        
        <div class="text-center">
            <p class="text-secondary small">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: var(--accent-cyan);">Daftar Sekarang</a></p>
        </div>
    </form>
</div>
@endsection
