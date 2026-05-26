@extends('layouts.app')

@section('title', 'Buat Booking')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Buat Booking Layanan</h4>
    <p class="text-secondary">Silakan pilih layanan dan jadwal yang Anda inginkan.</p>
</div>

<div class="card-custom">
    <form action="{{ route('pelanggan.booking.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="form-label text-secondary small fw-bold">PILIH LAYANAN</label>
            <select name="layanan_id" class="form-select bg-secondary text-white border-secondary" required>
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanans as $layanan)
                    <option value="{{ $layanan->id }}" {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                        {{ $layanan->nama }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }} ({{ $layanan->durasi }} Menit)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small fw-bold">TANGGAL BOOKING</label>
                <input type="date" name="tanggal" class="form-control bg-secondary text-white border-secondary" required min="{{ date('Y-m-d') }}" value="{{ old('tanggal') }}">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label text-secondary small fw-bold">JAM BOOKING</label>
                <input type="time" name="jam_booking" class="form-control bg-secondary text-white border-secondary" required value="{{ old('jam_booking') }}">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label text-secondary small fw-bold">CATATAN (Opsional)</label>
            <textarea name="catatan" rows="3" class="form-control bg-secondary text-white border-secondary" placeholder="Tuliskan catatan tambahan jika ada">{{ old('catatan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-antriin w-100">Kirim Booking</button>
    </form>
</div>
@endsection
