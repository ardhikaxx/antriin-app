@extends('layouts.app')

@section('title', 'Owner Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3 class="fw-bold">Selamat Datang, {{ auth()->user()->nama_lengkap }}!</h3>
        <p class="text-secondary">Ringkasan performa bisnis Anda.</p>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-purple bg-opacity-10 text-purple rounded p-3" style="color: var(--accent-purple);">
                        <i class="fa fa-money-bill-wave fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Pendapatan Bulan Ini</h6>
                    <h4 class="mb-0 fw-bold">Rp 0</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-success bg-opacity-10 text-success rounded p-3">
                        <i class="fa fa-check-circle fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Total Selesai</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card-custom">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-info bg-opacity-10 text-info rounded p-3">
                        <i class="fa fa-chart-bar fa-2x"></i>
                    </div>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Rata-rata Harian</h6>
                    <h4 class="mb-0 fw-bold">0</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
