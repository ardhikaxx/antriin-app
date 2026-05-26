@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            timer: 2500,
            showConfirmButton: false,
            background: '#1e2a3a',
            color: '#ffffff',
            iconColor: '#00c853'
        });
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session("error") }}',
            background: '#1e2a3a',
            color: '#ffffff',
            iconColor: '#e53935',
            confirmButtonColor: '#e53935'
        });
    });
</script>
@endif

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan Validasi!',
            html: '<ul class="text-start">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            background: '#1e2a3a',
            color: '#ffffff',
            iconColor: '#e53935',
            confirmButtonColor: '#e53935'
        });
    });
</script>
@endif
