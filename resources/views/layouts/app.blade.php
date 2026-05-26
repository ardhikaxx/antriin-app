<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANTRIIN – @yield('title')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --bg-primary: #1a1a2e;
            --bg-secondary: #16213e;
            --bg-card: #0f3460;
            --bg-sidebar: #0d1117;
            --bg-surface: #1e2a3a;
            --accent-cyan: #00d4d4;
            --accent-green: #00c853;
            --accent-orange: #ff6d00;
            --accent-red: #e53935;
            --accent-purple: #7c4dff;
            --accent-yellow: #ffd600;
            --accent-pink: #e91e8c;
            --accent-blue: #1976d2;
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --color-success: #00c853;
            --color-warning: #ffd600;
            --color-danger: #e53935;
            --color-info: #00d4d4;
            --border-color: rgba(255,255,255,0.08);
            --shadow-card: 0 4px 24px rgba(0,0,0,0.4);
            --shadow-hover: 0 8px 32px rgba(0,212,212,0.15);
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        .main-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex-grow: 1;
            transition: all 0.3s;
        }

        .content-wrapper {
            padding: 2rem;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: var(--bg-sidebar);
            min-height: 100vh;
            border-right: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
        }

        .sidebar-logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-item {
            padding: 0.5rem 1.5rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .sidebar-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .sidebar-link:hover {
            background-color: var(--bg-surface);
            color: var(--text-primary);
            box-shadow: var(--shadow-hover);
        }

        .sidebar-link.active {
            background-color: var(--bg-surface);
            color: var(--accent-cyan);
            border-left: 4px solid var(--accent-cyan);
        }

        /* Navbar Styles */
        .navbar-custom {
            background-color: var(--bg-secondary);
            padding: 0.8rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        /* Card Styles */
        .card-custom {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--shadow-card);
            padding: 1.5rem;
        }

        @stack('styles')
    </style>
</head>
<body class="antriin-body">
    <div class="main-wrapper">
        @include('components.sidebar')
        <div class="main-content">
            @include('components.navbar')
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('components.alert')
    @stack('scripts')
</body>
</html>
