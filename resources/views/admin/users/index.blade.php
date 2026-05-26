@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Data User</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-antriin" style="background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue)); color: white;">
        <i class="fa fa-plus me-2"></i> Tambah User
    </a>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->nama_lengkap }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'admin') <span class="badge bg-info text-dark">Admin</span>
                        @elseif($user->role == 'owner') <span class="badge bg-purple" style="background-color: var(--accent-purple);">Owner</span>
                        @elseif($user->role == 'petugas') <span class="badge bg-success">Petugas</span>
                        @else <span class="badge bg-secondary">Pelanggan</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_aktif)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" id="delete-form-{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $users->links() }}
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
