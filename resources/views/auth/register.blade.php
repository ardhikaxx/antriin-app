@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<div class="auth-card" style="max-width: 500px;">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="background: linear-gradient(to right, #00d4d4, #1976d2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">BUAT AKUN</h2>
        <p class="text-secondary">Bergabunglah dengan ANTRIIN</p>
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NAMA LENGKAP</label>
                <input type="text" name="nama_lengkap" class="form-control form-control-antriin" placeholder="Nama Lengkap" required value="{{ old('nama_lengkap') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">USERNAME</label>
                <input type="text" name="username" class="form-control form-control-antriin" placeholder="Username" required value="{{ old('username') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-secondary small fw-bold">EMAIL</label>
            <input type="email" name="email" class="form-control form-control-antriin" placeholder="Email Aktif" required value="{{ old('email') }}">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">PASSWORD</label>
                <input type="password" name="password" class="form-control form-control-antriin" placeholder="Password" required>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small fw-bold">KONFIRMASI PASSWORD</label>
                <input type="password" name="password_confirmation" class="form-control form-control-antriin" placeholder="Ulangi Password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-antriin w-100 mb-3">DAFTAR SEKARANG</button>
        
        <div class="text-center">
            <p class="text-secondary small">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: var(--accent-cyan);">Login</a></p>
        </div>
    </form>
</div>
@endsection
