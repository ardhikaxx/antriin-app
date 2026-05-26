@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Edit Jadwal Operasional</h4>
    <p class="text-secondary">Perbarui jam operasional untuk hari {{ $jadwal->hari }}.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">HARI</label>
                <select name="hari" class="form-select bg-secondary text-white border-secondary" required>
                    <option value="Senin" {{ old('hari', $jadwal->hari) == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ old('hari', $jadwal->hari) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ old('hari', $jadwal->hari) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ old('hari', $jadwal->hari) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ old('hari', $jadwal->hari) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ old('hari', $jadwal->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ old('hari', $jadwal->hari) == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">JAM BUKA</label>
                <input type="time" name="jam_buka" class="form-control bg-secondary text-white border-secondary" required value="{{ old('jam_buka', \Carbon\Carbon::parse($jadwal->jam_buka)->format('H:i')) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label text-secondary small fw-bold">JAM TUTUP</label>
                <input type="time" name="jam_tutup" class="form-control bg-secondary text-white border-secondary" required value="{{ old('jam_tutup', \Carbon\Carbon::parse($jadwal->jam_tutup)->format('H:i')) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">MAKSIMAL PELANGGAN (Harian)</label>
                <input type="number" name="maks_pelanggan" class="form-control bg-secondary text-white border-secondary" required value="{{ old('maks_pelanggan', $jadwal->maks_pelanggan) }}" min="1">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">KETERANGAN (Opsional)</label>
                <input type="text" name="keterangan" class="form-control bg-secondary text-white border-secondary" value="{{ old('keterangan', $jadwal->keterangan) }}">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_libur" id="is_libur" value="1" {{ old('is_libur', $jadwal->is_libur) ? 'checked' : '' }}>
                <label class="form-check-label text-secondary" for="is_libur">Tandai sebagai Hari Libur</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Perbarui</button>
            <a href="{{ route('admin.jadwal.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
