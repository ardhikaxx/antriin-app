# 📋 ANTRIIN
## Panduan Pengembangan Sistem ANTRIIN – Booking & Antrian UMKM

---

## 🧱 STACK TEKNOLOGI

| Komponen | Teknologi |
|---|---|
| Framework Backend | Laravel 12 |
| Database | MySQL |
| Frontend Styling | Bootstrap 5 (CDN) |
| Icon | Font Awesome 6 (CDN) |
| Alert & Konfirmasi | SweetAlert2 (CDN) |
| Templating | Blade Laravel |
| Auth | Custom Auth |

### CDN yang Wajib Digunakan

```html
<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<!-- Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

---

## 🎨 DESIGN SYSTEM

### Palet Warna Utama
Berdasarkan referensi tampilan dark mode dengan aksen warna-warni:

```css
:root {
    /* Background Utama (Dark) */
    --bg-primary:     #1a1a2e;
    --bg-secondary:   #16213e;
    --bg-card:        #0f3460;
    --bg-sidebar:     #0d1117;
    --bg-surface:     #1e2a3a;

    /* Aksen Warna (dari palet ikon) */
    --accent-cyan:    #00d4d4;
    --accent-green:   #00c853;
    --accent-orange:  #ff6d00;
    --accent-red:     #e53935;
    --accent-purple:  #7c4dff;
    --accent-yellow:  #ffd600;
    --accent-pink:    #e91e8c;
    --accent-blue:    #1976d2;

    /* Warna Teks */
    --text-primary:   #ffffff;
    --text-secondary: #94a3b8;
    --text-muted:     #64748b;

    /* Warna Fungsi */
    --color-success:  #00c853;
    --color-warning:  #ffd600;
    --color-danger:   #e53935;
    --color-info:     #00d4d4;

    /* Border & Shadow */
    --border-color:   rgba(255,255,255,0.08);
    --shadow-card:    0 4px 24px rgba(0,0,0,0.4);
    --shadow-hover:   0 8px 32px rgba(0,212,212,0.15);
}
```

### Tema per Role
| Role | Warna Aksen Utama | Warna Sidebar |
|---|---|---|
| Admin | `--accent-cyan` (#00d4d4) | Dark Navy |
| Owner | `--accent-purple` (#7c4dff) | Dark Navy |
| Petugas | `--accent-green` (#00c853) | Dark Navy |
| Pelanggan (Landing) | Multi-aksen + gradient | Dark/Light kombinasi |

---

## 📁 STRUKTUR DIREKTORI LARAVEL

```
antriin/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── AuthController.php
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── UserController.php
│   │   │   │   ├── LayananController.php
│   │   │   │   ├── JadwalController.php
│   │   │   │   ├── BookingController.php
│   │   │   │   ├── AntrianController.php
│   │   │   │   └── LaporanController.php
│   │   │   ├── Owner/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── LaporanController.php
│   │   │   ├── Petugas/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── AntrianController.php
│   │   │   └── Pelanggan/
│   │   │       ├── BookingController.php
│   │   │       └── AntrianController.php
│   │   └── Middleware/
│   │       ├── RoleAdmin.php
│   │       ├── RoleOwner.php
│   │       ├── RolePetugas.php
│   │       └── RolePelanggan.php
│   └── Models/
│       ├── User.php
│       ├── Layanan.php
│       ├── JadwalOperasional.php
│       ├── Booking.php
│       ├── Antrian.php
│       └── Notifikasi.php
├── database/
│   └── migrations/
│       ├── xxxx_create_users_table.php
│       ├── xxxx_create_layanans_table.php
│       ├── xxxx_create_jadwal_operasionals_table.php
│       ├── xxxx_create_bookings_table.php
│       └── xxxx_create_antrains_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php         (layout utama admin/petugas/owner)
│       │   └── guest.blade.php       (layout landing page pelanggan)
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── admin/
│       │   ├── dashboard/
│       │   ├── users/
│       │   ├── layanan/
│       │   ├── jadwal/
│       │   ├── booking/
│       │   ├── antrian/
│       │   └── laporan/
│       ├── owner/
│       │   ├── dashboard/
│       │   └── laporan/
│       ├── petugas/
│       │   ├── dashboard/
│       │   └── antrian/
│       ├── pelanggan/
│       │   ├── landing.blade.php
│       │   ├── booking/
│       │   └── antrian/
│       └── components/
│           ├── sidebar.blade.php
│           ├── navbar.blade.php
│           └── alert.blade.php
└── routes/
    └── web.php
```

---

## 🗃️ SKEMA DATABASE (MySQL)

### Tabel: `users`
```sql
CREATE TABLE users (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap    VARCHAR(100) NOT NULL,
    username        VARCHAR(50) NOT NULL UNIQUE,
    email           VARCHAR(100) NOT NULL UNIQUE,
    no_telepon      VARCHAR(20),
    foto_profil     VARCHAR(255) DEFAULT NULL,
    role            ENUM('admin','owner','petugas','pelanggan') DEFAULT 'pelanggan',
    password        VARCHAR(255) NOT NULL,
    is_aktif        TINYINT(1) DEFAULT 1,
    remember_token  VARCHAR(100),
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL
);
```

### Tabel: `layanans`
```sql
CREATE TABLE layanans (
    id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama        VARCHAR(100) NOT NULL,
    deskripsi   TEXT,
    harga       DECIMAL(10,2) NOT NULL,
    durasi      INT NOT NULL COMMENT 'dalam menit',
    is_aktif    TINYINT(1) DEFAULT 1,
    created_at  TIMESTAMP NULL,
    updated_at  TIMESTAMP NULL
);
```

### Tabel: `jadwal_operasionals`
```sql
CREATE TABLE jadwal_operasionals (
    id                  BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hari                ENUM('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
    jam_buka            TIME NOT NULL,
    jam_tutup           TIME NOT NULL,
    maks_pelanggan      INT NOT NULL DEFAULT 20,
    is_libur            TINYINT(1) DEFAULT 0,
    keterangan          VARCHAR(255) DEFAULT NULL,
    created_at          TIMESTAMP NULL,
    updated_at          TIMESTAMP NULL
);
```

### Tabel: `bookings`
```sql
CREATE TABLE bookings (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_booking    VARCHAR(20) NOT NULL UNIQUE,
    user_id         BIGINT UNSIGNED NOT NULL,
    layanan_id      BIGINT UNSIGNED NOT NULL,
    petugas_id      BIGINT UNSIGNED DEFAULT NULL,
    tanggal         DATE NOT NULL,
    jam_booking     TIME NOT NULL,
    catatan         TEXT DEFAULT NULL,
    status          ENUM('menunggu','dikonfirmasi','selesai','dibatalkan') DEFAULT 'menunggu',
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    FOREIGN KEY (user_id)    REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (layanan_id) REFERENCES layanans(id),
    FOREIGN KEY (petugas_id) REFERENCES users(id)
);
```

### Tabel: `antrains`
```sql
CREATE TABLE antrains (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    booking_id      BIGINT UNSIGNED DEFAULT NULL COMMENT 'null jika walk-in',
    user_id         BIGINT UNSIGNED NOT NULL,
    layanan_id      BIGINT UNSIGNED NOT NULL,
    nomor_antrian   VARCHAR(10) NOT NULL,
    tanggal         DATE NOT NULL,
    estimasi_waktu  TIME DEFAULT NULL,
    status          ENUM('menunggu','dipanggil','dilayani','selesai','dibatalkan') DEFAULT 'menunggu',
    is_walkin       TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    FOREIGN KEY (booking_id)  REFERENCES bookings(id),
    FOREIGN KEY (user_id)     REFERENCES users(id),
    FOREIGN KEY (layanan_id)  REFERENCES layanans(id)
);
```

### Tabel: `notifikasis`
```sql
CREATE TABLE notifikasis (
    id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id     BIGINT UNSIGNED NOT NULL,
    judul       VARCHAR(150) NOT NULL,
    pesan       TEXT NOT NULL,
    jenis       ENUM('booking','antrian','pengingat','umum') DEFAULT 'umum',
    is_dibaca   TINYINT(1) DEFAULT 0,
    created_at  TIMESTAMP NULL,
    updated_at  TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

---

## 🔐 ROLE & HAK AKSES

### Middleware per Role
```php
// app/Http/Middleware/RoleAdmin.php
public function handle($request, Closure $next) {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }
    abort(403, 'Akses ditolak.');
}
```
> Buat middleware serupa untuk `owner`, `petugas`, dan `pelanggan`.

### Tabel Hak Akses

| Fitur | Admin | Owner | Petugas | Pelanggan |
|---|:---:|:---:|:---:|:---:|
| Kelola User | ✅ | ❌ | ❌ | ❌ |
| Kelola Layanan | ✅ | ❌ | ❌ | ❌ |
| Kelola Jadwal Operasional | ✅ | ❌ | ❌ | ❌ |
| Kelola Booking | ✅ | 👁️ | 👁️ | ✅ (milik sendiri) |
| Kelola Antrian | ✅ | 👁️ | ✅ | 👁️ (milik sendiri) |
| Dashboard Monitoring | ✅ | ✅ | ✅ (terbatas) | ❌ |
| Laporan & Analisis | ✅ | ✅ | ❌ | ❌ |
| Booking Online | ❌ | ❌ | ❌ | ✅ |
| Profil Sendiri | ✅ | ✅ | ✅ | ✅ |

---

## 🔔 RULE SWEETALERT2

Semua alert, konfirmasi, dan notifikasi **wajib** menggunakan SweetAlert2. Dilarang menggunakan `alert()` native browser.

### Alert Sukses
```javascript
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data telah berhasil disimpan.',
    timer: 2000,
    showConfirmButton: false,
    background: '#1e2a3a',
    color: '#ffffff',
    iconColor: '#00c853'
});
```

### Alert Gagal / Error
```javascript
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: 'Terjadi kesalahan. Silakan coba lagi.',
    background: '#1e2a3a',
    color: '#ffffff',
    iconColor: '#e53935',
    confirmButtonColor: '#e53935'
});
```

### Alert Informasi
```javascript
Swal.fire({
    icon: 'info',
    title: 'Informasi',
    text: 'Pesan informasi di sini.',
    background: '#1e2a3a',
    color: '#ffffff',
    iconColor: '#00d4d4',
    confirmButtonColor: '#00d4d4'
});
```

### Alert Warning
```javascript
Swal.fire({
    icon: 'warning',
    title: 'Perhatian!',
    text: 'Mohon periksa kembali data Anda.',
    background: '#1e2a3a',
    color: '#ffffff',
    iconColor: '#ffd600',
    confirmButtonColor: '#ffd600',
    confirmButtonText: 'Mengerti'
});
```

### Alert Konfirmasi Hapus
```javascript
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
        // lanjutkan proses hapus
    }
});
```

### Alert Flash Message dari Laravel (Blade)
```blade
@if(session('success'))
<script>
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
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session("error") }}',
        background: '#1e2a3a',
        color: '#ffffff',
        iconColor: '#e53935',
        confirmButtonColor: '#e53935'
    });
</script>
@endif
```

---

## 🧩 KOMPONEN BLADE WAJIB

### Layout Utama Admin/Owner/Petugas (`layouts/app.blade.php`)

```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTRIIN – @yield('title')</title>
    <!-- CDN Bootstrap, FontAwesome, SweetAlert2 -->
    @stack('styles')
</head>
<body class="antriin-body">
    <div class="d-flex">
        @include('components.sidebar')
        <div class="main-content grow">
            @include('components.navbar')
            <div class="content-wrapper p-4">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
    @include('components.alert')
</body>
</html>
```

### Sidebar Komponen (`components/sidebar.blade.php`)
- Sidebar fixed di kiri, lebar 260px
- Background: `--bg-sidebar` (#0d1117)
- Logo ANTRIIN di atas dengan gradient cyan
- Menu item dengan ikon Font Awesome
- Active state dengan highlight warna aksen
- Menu disesuaikan berdasarkan `auth()->user()->role`

### Navbar Komponen (`components/navbar.blade.php`)
- Top bar dengan nama halaman
- Notifikasi bell (badge angka)
- Avatar + dropdown profil (Lihat Profil, Logout)

---

## 🛣️ ROUTING (web.php)

```php
// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', Admin\UserController::class);
        Route::resource('layanan', Admin\LayananController::class);
        Route::resource('jadwal', Admin\JadwalController::class);
        Route::resource('booking', Admin\BookingController::class);
        Route::resource('antrian', Admin\AntrianController::class);
        Route::get('laporan', [Admin\LaporanController::class, 'index'])->name('laporan');
    });

    // Owner Routes
    Route::prefix('owner')->name('owner.')->middleware('role:owner')->group(function () {
        Route::get('/dashboard', [Owner\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/laporan', [Owner\LaporanController::class, 'index'])->name('laporan');
    });

    // Petugas Routes
    Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {
        Route::get('/dashboard', [Petugas\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('antrian', Petugas\AntrianController::class);
    });

    // Pelanggan Routes
    Route::prefix('pelanggan')->name('pelanggan.')->middleware('role:pelanggan')->group(function () {
        Route::get('/dashboard', [Pelanggan\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('booking', Pelanggan\BookingController::class);
        Route::get('/antrian', [Pelanggan\AntrianController::class, 'index'])->name('antrian');
    });
});
```

---

## ✅ KONVENSI KODE

### Naming Convention

| Elemen | Aturan | Contoh |
|---|---|---|
| Controller | PascalCase + `Controller` | `BookingController` |
| Model | PascalCase singular | `Booking`, `Layanan` |
| Migration | snake_case dengan timestamp | `2025_01_01_create_bookings_table` |
| View Blade | snake_case | `create_booking.blade.php` |
| Route Name | dot notation by role | `admin.booking.index` |
| CSS Class Custom | kebab-case | `btn-antriin`, `sidebar-menu` |
| JS Function | camelCase | `confirmDelete()`, `showAlert()` |
| Database Kolom | snake_case | `nama_lengkap`, `jam_buka` |

### Validasi Request
- Gunakan `FormRequest` Laravel untuk setiap form
- Semua pesan error tampil menggunakan SweetAlert2, bukan default Laravel

```php
// Contoh FormRequest
class StoreBookingRequest extends FormRequest {
    public function rules(): array {
        return [
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal'    => 'required|date|after_or_equal:today',
            'jam_booking'=> 'required',
        ];
    }
    public function messages(): array {
        return [
            'layanan_id.required' => 'Pilih layanan terlebih dahulu.',
            'tanggal.after_or_equal' => 'Tanggal booking tidak boleh di masa lalu.',
        ];
    }
}
```

### Response Controller (AJAX)
```php
return response()->json([
    'status'  => 'success',
    'message' => 'Booking berhasil dibuat.',
    'data'    => $booking
]);
```

---

## 📱 RESPONSIF

- Sidebar di mobile: collapsible (toggle dengan hamburger button)
- Tabel di mobile: `table-responsive` wrapper Bootstrap
- Card grid: `col-12 col-sm-6 col-lg-3` (4 kolom di desktop, 2 di tablet, 1 di mobile)
- Font size minimum: 14px untuk body, 12px untuk teks kecil

---

## 🔢 NOMOR ANTRIAN

Format: `[Inisial Layanan][Nomor Urut]`
Contoh: `A001`, `B002`, `HCT003`

```php
// Generate nomor antrian otomatis
public static function generateNomor($layanan_id, $tanggal) {
    $layanan = Layanan::find($layanan_id);
    $prefix  = strtoupper(substr($layanan->nama, 0, 1));
    $count   = Antrain::where('layanan_id', $layanan_id)
                      ->whereDate('tanggal', $tanggal)
                      ->count() + 1;
    return $prefix . str_pad($count, 3, '0', STR_PAD_LEFT);
}
```

---

## 🔑 KODE BOOKING

Format: `ANT-[YMD]-[RANDOM5]`
Contoh: `ANT-250615-XK7P2`

```php
public static function generateKode() {
    return 'ANT-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
}
```

---

## 🚫 LARANGAN / ANTI-PATTERN

1. ❌ Jangan gunakan `alert()` native JavaScript — **wajib SweetAlert2**
2. ❌ Jangan hardcode warna di inline style — **gunakan CSS variable**
3. ❌ Jangan gunakan Bootstrap warna default untuk aksen utama — **override dengan tema ANTRIIN**
4. ❌ Jangan simpan password plain text — **wajib `bcrypt()`**
5. ❌ Jangan buat route tanpa middleware role — **setiap area wajib diproteksi**
6. ❌ Jangan gunakan `DB::statement` raw tanpa binding — **cegah SQL Injection**
7. ❌ Jangan tampilkan error detail Laravel ke user — **gunakan error page kustom**

---

*Rule ini wajib diikuti oleh seluruh anggota tim pengembang ANTRIIN.*
*Versi: 1.0 | Sistem: ANTRIIN – Booking & Antrian UMKM*
