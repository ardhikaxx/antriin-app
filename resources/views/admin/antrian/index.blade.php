@extends('layouts.app')

@section('title', 'Kelola Antrian')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Data Antrian</h4>
    <p class="text-secondary">Kelola antrian yang sedang berjalan atau sudah selesai.</p>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr>
                    <td class="fw-bold text-success fs-5">{{ $antrian->nomor_antrian }}</td>
                    <td>{{ \Carbon\Carbon::parse($antrian->tanggal)->format('d M Y') }}</td>
                    <td>{{ $antrian->user->nama_lengkap }}</td>
                    <td>{{ $antrian->layanan->nama }}</td>
                    <td>
                        @if($antrian->is_walkin)
                            <span class="badge bg-secondary">Walk-in</span>
                        @else
                            <span class="badge bg-info text-dark">Online</span>
                        @endif
                    </td>
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
                                    <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dipanggil">
                                        <button type="submit" class="dropdown-item">Dipanggil</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dilayani">
                                        <button type="submit" class="dropdown-item">Dilayani</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="dropdown-item text-success">Selesai</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST">
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
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data antrian.</td>
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
