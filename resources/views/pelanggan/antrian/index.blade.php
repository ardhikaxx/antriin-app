@extends('layouts.app')

@section('title', 'Antrian Saya')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Antrian Saya</h4>
    <p class="text-secondary">Pantau status antrian Anda saat ini.</p>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Nomor Antrian</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Estimasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr>
                    <td class="fw-bold text-success fs-5">{{ $antrian->nomor_antrian }}</td>
                    <td>{{ $antrian->layanan->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($antrian->tanggal)->format('d M Y') }}</td>
                    <td>{{ $antrian->estimasi_waktu ? \Carbon\Carbon::parse($antrian->estimasi_waktu)->format('H:i') : '-' }}</td>
                    <td>
                        @if($antrian->status == 'menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($antrian->status == 'dipanggil')
                            <span class="badge bg-primary">Dipanggil</span>
                        @elseif($antrian->status == 'dilayani')
                            <span class="badge bg-info text-dark">Dilayani</span>
                        @elseif($antrian->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-danger">Dibatalkan</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Anda belum memiliki antrian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $antrians->links() }}
    </div>
</div>
@endsection
