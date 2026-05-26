@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Edit Layanan</h4>
    <p class="text-secondary">Perbarui detail layanan yang sudah ada.</p>
</div>

<div class="card-custom">
    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-secondary small fw-bold">NAMA LAYANAN</label>
                <input type="text" name="nama" class="form-control bg-secondary text-white border-secondary" required value="{{ old('nama', $layanan->nama) }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label text-secondary small fw-bold">HARGA (Rp)</label>
                <input type="number" name="harga" class="form-control bg-secondary text-white border-secondary" required value="{{ old('harga', intval($layanan->harga)) }}" min="0">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label text-secondary small fw-bold">DURASI (Menit)</label>
                <input type="number" name="durasi" class="form-control bg-secondary text-white border-secondary" required value="{{ old('durasi', $layanan->durasi) }}" min="1">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label text-secondary small fw-bold">DESKRIPSI</label>
            <textarea name="deskripsi" rows="4" class="form-control bg-secondary text-white border-secondary">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>
        <div class="mb-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_aktif" id="is_aktif" value="1" {{ old('is_aktif', $layanan->is_aktif) ? 'checked' : '' }}>
                <label class="form-check-label text-secondary" for="is_aktif">Layanan Aktif</label>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Perbarui</button>
            <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
