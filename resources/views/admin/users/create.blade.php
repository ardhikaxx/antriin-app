@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Tambah User Baru</h4>
    <p class="text-secondary">Buat akun pengguna baru dengan role spesifik.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NAMA LENGKAP</label>
                <input type="text" name="nama_lengkap" class="form-control bg-secondary text-white border-secondary" required value="{{ old('nama_lengkap') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">USERNAME</label>
                <input type="text" name="username" class="form-control bg-secondary text-white border-secondary" required value="{{ old('username') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">EMAIL</label>
                <input type="email" name="email" class="form-control bg-secondary text-white border-secondary" required value="{{ old('email') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NO TELEPON</label>
                <input type="text" name="no_telepon" class="form-control bg-secondary text-white border-secondary" value="{{ old('no_telepon') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-secondary small fw-bold">ROLE</label>
            <select name="role" class="form-select bg-secondary text-white border-secondary" required>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="pelanggan" {{ old('role', 'pelanggan') == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">PASSWORD</label>
                <input type="password" name="password" class="form-control bg-secondary text-white border-secondary" required>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small fw-bold">KONFIRMASI PASSWORD</label>
                <input type="password" name="password_confirmation" class="form-control bg-secondary text-white border-secondary" required>
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_aktif" id="is_aktif" value="1" {{ old('is_aktif', true) ? 'checked' : '' }}>
                <label class="form-check-label text-secondary" for="is_aktif">Akun Aktif</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><i class="fa fa-save me-2"></i>Simpan</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
