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
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --accent-cyan: #00d4d4;
            --accent-blue: #1976d2;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .auth-card {
            background-color: var(--bg-card);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.4);
            max-width: 400px;
            width: 100%;
            margin: auto;
            padding: 2.5rem;
        }

        .btn-antriin {
            background: linear-gradient(to right, var(--accent-cyan), var(--accent-blue));
            border: none;
            color: white;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-antriin:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,212,212,0.3);
        }

        .form-control-antriin {
            background-color: var(--bg-secondary);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            padding: 0.8rem;
            border-radius: 8px;
        }

        .form-control-antriin:focus {
            background-color: var(--bg-secondary);
            border-color: var(--accent-cyan);
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(0,212,212,0.1);
        }

        @stack('styles')
    </style>
</head>
<body>
    <div class="container d-flex grow-1 py-5">
        @yield('content')
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('components.alert')
    @stack('scripts')
</body>
</html>
