@extends('layouts.app')

@section('title', 'Petugas Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3 class="fw-bold">Selamat Datang, {{ auth()->user()->nama_lengkap }}!</h3>
        <p class="text-secondary">Kelola antrian hari ini dengan efisien.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card-custom text-center">
            <h6 class="text-secondary mb-3">ANTRIAN SEKARANG</h6>
            <h1 class="display-1 fw-bold text-success">--</h1>
            <p class="mb-0">Nomor Antrian</p>
        </div>
    </div>
    <div class="col-md-8 mb-4">
        <div class="card-custom">
            <h5 class="fw-bold mb-4">Antrian Berikutnya</h5>
            <div class="table-responsive">
                <table class="table table-dark table-hover border-secondary">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Tidak ada antrian menunggu</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
