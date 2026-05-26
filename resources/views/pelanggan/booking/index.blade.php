@extends('layouts.app')

@section('title', 'Booking Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Booking Saya</h4>
    <a href="{{ route('pelanggan.booking.create') }}" class="btn btn-antriin" style="background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue)); color: white;">
        <i class="fa fa-plus me-2"></i> Buat Booking Baru
    </a>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Kode Booking</th>
                    <th>Layanan</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td class="fw-bold text-cyan" style="color: var(--accent-cyan);">{{ $booking->kode_booking }}</td>
                    <td>{{ $booking->layanan->nama }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}<br>
                        <small class="text-secondary">{{ \Carbon\Carbon::parse($booking->jam_booking)->format('H:i') }}</small>
                    </td>
                    <td>
                        @if($booking->status == 'menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($booking->status == 'dikonfirmasi')
                            <span class="badge bg-primary">Dikonfirmasi</span>
                        @elseif($booking->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-danger">Dibatalkan</span>
                        @endif
                    </td>
                    <td>
                        @if($booking->status == 'menunggu' || $booking->status == 'dikonfirmasi')
                        <form action="{{ route('pelanggan.booking.destroy', $booking->id) }}" method="POST" class="d-inline" id="cancel-form-{{ $booking->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmCancel({{ $booking->id }})">
                                Batalkan
                            </button>
                        </form>
                        @else
                        <span class="text-muted small">Tidak ada aksi</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Anda belum memiliki riwayat booking.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $bookings->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmCancel(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Batalkan Booking?',
            text: 'Apakah Anda yakin ingin membatalkan booking ini?',
            showCancelButton: true,
            confirmButtonText: 'Ya, Batalkan',
            cancelButtonText: 'Kembali',
            background: '#1e2a3a',
            color: '#ffffff',
            iconColor: '#ffd600',
            confirmButtonColor: '#e53935',
            cancelButtonColor: '#64748b'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('cancel-form-' + id).submit();
            }
        });
    }
</script>
@endpush
