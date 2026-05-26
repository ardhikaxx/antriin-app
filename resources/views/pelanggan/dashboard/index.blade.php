@extends('layouts.app')

@section('title', 'Dashboard Pelanggan')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3 class="fw-bold">Halo, {{ auth()->user()->nama_lengkap }}!</h3>
        <p class="text-secondary">Siap untuk booking layanan hari ini?</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card-custom">
            <h5 class="fw-bold mb-4">Booking Aktif</h5>
            <div class="text-center py-5">
                <i class="fa fa-calendar-times fa-4x text-muted mb-3"></i>
                <p class="text-secondary">Anda belum memiliki booking aktif.</p>
                <a href="#" class="btn btn-antriin mt-2">Buat Booking Sekarang</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card-custom">
            <h5 class="fw-bold mb-4">Notifikasi Terbaru</h5>
            <ul class="list-group list-group-flush bg-transparent">
                <li class="list-group-item bg-transparent text-secondary border-secondary px-0 py-3 text-center">
                    Tidak ada notifikasi baru
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
