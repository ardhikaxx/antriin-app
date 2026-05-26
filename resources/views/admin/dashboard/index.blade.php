@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3 class="fw-bold">Selamat Datang, {{ auth()->user()->nama_lengkap }}!</h3>
        <p class="text-secondary">Berikut adalah ringkasan sistem hari ini.</p>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-info bg-opacity-10 text-info rounded p-3">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Total Pelanggan</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-success bg-opacity-10 text-success rounded p-3">
                        <i class="fa fa-calendar-check fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Booking Hari Ini</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-warning bg-opacity-10 text-warning rounded p-3">
                        <i class="fa fa-clock fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Menunggu Konfirmasi</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-primary bg-opacity-10 text-primary rounded p-3">
                        <i class="fa fa-concierge-bell fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Layanan Aktif</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
