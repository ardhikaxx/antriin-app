@extends('layouts.app')

@section('title', 'Kelola Jadwal Operasional')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Jadwal Operasional</h4>
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-antriin" style="background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue)); color: white;">
        <i class="fa fa-plus me-2"></i> Tambah Jadwal
    </a>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Operasional</th>
                    <th>Maks Pelanggan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $jadwal)
                <tr>
                    <td class="fw-bold">{{ $jadwal->hari }}</td>
                    <td>
                        @if($jadwal->is_libur)
                            <span class="text-danger">Tutup</span>
                        @else
                            {{ \Carbon\Carbon::parse($jadwal->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_tutup)->format('H:i') }}
                        @endif
                    </td>
                    <td>{{ $jadwal->maks_pelanggan }} orang</td>
                    <td>
                        @if($jadwal->is_libur)
                            <span class="badge bg-danger">Libur</span>
                        @else
                            <span class="badge bg-success">Buka</span>
                        @endif
                    </td>
                    <td>{{ $jadwal->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline" id="delete-form-{{ $jadwal->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $jadwal->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data jadwal operasional.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            icon: 'question',
            title: 'Konfirmasi Hapus',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-trash"></i> Ya, Hapus',
            cancelButtonText: '<i class="fa fa-times"></i> Batal',
            background: '#1e2a3a',
            color: '#ffffff',
            iconColor: '#e53935',
            confirmButtonColor: '#e53935',
            cancelButtonColor: '#64748b'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush
