@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Edit User</h4>
    <p class="text-secondary">Perbarui detail akun pengguna.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NAMA LENGKAP</label>
                <input type="text" name="nama_lengkap" class="form-control bg-secondary text-white border-secondary" required value="{{ old('nama_lengkap', $user->nama_lengkap) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">USERNAME</label>
                <input type="text" name="username" class="form-control bg-secondary text-white border-secondary" required value="{{ old('username', $user->username) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">EMAIL</label>
                <input type="email" name="email" class="form-control bg-secondary text-white border-secondary" required value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NO TELEPON</label>
                <input type="text" name="no_telepon" class="form-control bg-secondary text-white border-secondary" value="{{ old('no_telepon', $user->no_telepon) }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-secondary small fw-bold">ROLE</label>
            <select name="role" class="form-select bg-secondary text-white border-secondary" required>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="owner" {{ old('role', $user->role) == 'owner' ? 'selected' : '' }}>Owner</option>
                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="pelanggan" {{ old('role', $user->role) == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">PASSWORD (Opsional)</label>
                <input type="password" name="password" class="form-control bg-secondary text-white border-secondary" placeholder="Kosongkan jika tidak diubah">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small fw-bold">KONFIRMASI PASSWORD</label>
                <input type="password" name="password_confirmation" class="form-control bg-secondary text-white border-secondary" placeholder="Kosongkan jika tidak diubah">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_aktif" id="is_aktif" value="1" {{ old('is_aktif', $user->is_aktif) ? 'checked' : '' }}>
                <label class="form-check-label text-secondary" for="is_aktif">Akun Aktif</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Perbarui</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
