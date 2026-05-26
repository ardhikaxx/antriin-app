@extends('layouts.app')

@section('title', 'Kelola Antrian (Petugas)')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Antrian Hari Ini</h4>
    <p class="text-secondary">Daftar antrian untuk tanggal {{ date('d M Y') }}.</p>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr>
                    <td class="fw-bold text-success fs-5">{{ $antrian->nomor_antrian }}</td>
                    <td>{{ $antrian->user->nama_lengkap }}</td>
                    <td>{{ $antrian->layanan->nama }}</td>
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Ubah Status
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <form action="{{ route('petugas.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dipanggil">
                                        <button type="submit" class="dropdown-item">Dipanggil</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('petugas.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dilayani">
                                        <button type="submit" class="dropdown-item">Dilayani</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('petugas.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="dropdown-item text-success">Selesai</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('petugas.antrian.update', $antrian->id) }}" method="POST">
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
                    <td colspan="5" class="text-center text-muted py-4">Belum ada antrian hari ini.</td>
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
