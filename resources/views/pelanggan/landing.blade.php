<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTRIIN – Booking & Antrian UMKM</title>
    
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --bg-primary: #1a1a2e;
            --bg-secondary: #16213e;
            --accent-cyan: #00d4d4;
            --accent-blue: #1976d2;
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
        }

        .hero-section {
            padding: 100px 0;
            background: radial-gradient(circle at top right, rgba(0, 212, 212, 0.1), transparent);
        }

        .btn-antriin {
            background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue));
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-antriin:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,212,212,0.3);
            color: white;
        }

        .navbar-landing {
            padding: 1.5rem 0;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            margin: 0 1rem;
        }

        .nav-link:hover {
            color: var(--accent-cyan) !important;
        }

        .feature-card {
            background-color: var(--bg-secondary);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 2.5rem;
            height: 100%;
            transition: all 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent-cyan);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-landing">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#" style="background: linear-gradient(to right, #00d4d4, #1976d2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ANTRIIN</a>
            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    @auth
                        <li class="nav-item">
                            <a class="btn-antriin ms-lg-3" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link me-3" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-antriin" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-4">Antri Lebih Mudah dengan <span style="color: var(--accent-cyan);">ANTRIIN</span></h1>
                    <p class="lead text-secondary mb-5">Solusi booking dan antrian online untuk UMKM. Hemat waktu pelanggan, tingkatkan efisiensi bisnis Anda.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn-antriin">Mulai Sekarang</a>
                        <a href="#" class="btn btn-outline-secondary rounded-pill px-4">Lihat Layanan</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://img.freepik.com/free-vector/isometric-time-management-concept-illustrated_52683-55734.jpg" alt="Hero" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapa Memilih Kami?</h2>
                <p class="text-secondary">Fitur unggulan untuk kemudahan bisnis Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fa fa-clock feature-icon"></i>
                        <h4>Booking Online</h4>
                        <p class="text-secondary">Pesan jadwal layanan kapan saja dan di mana saja tanpa harus datang langsung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fa fa-list-ol feature-icon"></i>
                        <h4>Antrian Real-time</h4>
                        <p class="text-secondary">Pantau status antrian Anda secara langsung dari smartphone.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fa fa-bell feature-icon"></i>
                        <h4>Notifikasi Cerdas</h4>
                        <p class="text-secondary">Dapatkan pengingat otomatis saat giliran Anda sudah dekat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 border-top border-secondary mt-5">
        <div class="container text-center">
            <p class="text-secondary mb-0">&copy; 2026 ANTRIIN System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
