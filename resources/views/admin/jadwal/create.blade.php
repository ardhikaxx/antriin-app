@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Tambah Jadwal Operasional</h4>
    <p class="text-secondary">Atur jam operasional untuk hari tertentu.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">HARI</label>
                <select name="hari" class="form-select bg-secondary text-white border-secondary" required>
                    <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ old('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">JAM BUKA</label>
                <input type="time" name="jam_buka" class="form-control bg-secondary text-white border-secondary" required value="{{ old('jam_buka', '08:00') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">JAM TUTUP</label>
                <input type="time" name="jam_tutup" class="form-control bg-secondary text-white border-secondary" required value="{{ old('jam_tutup', '17:00') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">MAKSIMAL PELANGGAN (Harian)</label>
                <input type="number" name="maks_pelanggan" class="form-control bg-secondary text-white border-secondary" required value="{{ old('maks_pelanggan', 20) }}" min="1">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">KETERANGAN (Opsional)</label>
                <input type="text" name="keterangan" class="form-control bg-secondary text-white border-secondary" value="{{ old('keterangan') }}">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_libur" id="is_libur" value="1" {{ old('is_libur') ? 'checked' : '' }}>
                <label class="form-check-label text-secondary" for="is_libur">Tandai sebagai Hari Libur</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success"><i class="fa fa-save me-2"></i>Simpan</button>
            <a href="{{ route('admin.jadwal.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
