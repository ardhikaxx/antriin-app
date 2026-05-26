@extends('layouts.app')

@section('title', 'Kelola Layanan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Data Layanan</h4>
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-antriin" style="background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue)); color: white;">
        <i class="fa fa-plus me-2"></i> Tambah Layanan
    </a>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Durasi (Menit)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $index => $layanan)
                <tr>
                    <td>{{ $layanans->firstItem() + $index }}</td>
                    <td>{{ $layanan->nama }}</td>
                    <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                    <td>{{ $layanan->durasi }}</td>
                    <td>
                        @if($layanan->is_aktif)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" class="d-inline" id="delete-form-{{ $layanan->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $layanan->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data layanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $layanans->links() }}
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
