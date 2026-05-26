@extends('layouts.app')

@section('title', 'Kelola Booking')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Data Booking</h4>
    <p class="text-secondary">Kelola semua booking layanan dari pelanggan.</p>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pelanggan</th>
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
                    <td>{{ $booking->user->nama_lengkap }}</td>
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
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Ubah Status
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dikonfirmasi">
                                        <button type="submit" class="dropdown-item">Dikonfirmasi</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="dropdown-item">Selesai</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dibatalkan">
                                        <button type="submit" class="dropdown-item text-danger">Batalkan</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data booking.</td>
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
