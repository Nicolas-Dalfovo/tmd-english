<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TMD English - Escola de Inglês')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --tmd-navy: #2c3e50;
            --tmd-navy-light: #34495e;
            --tmd-navy-dark: #1a252f;
            --tmd-gold: #f39c12;
            --tmd-gold-light: #f4d03f;
            --tmd-white: #ffffff;
            --tmd-gray: #ecf0f1;
            --tmd-gray-dark: #95a5a6;
        }

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: linear-gradient(135deg, var(--tmd-gray) 0%, var(--tmd-white) 100%);
            min-height: 100vh;
        }

        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            font-size: 1.8rem;
            color: var(--tmd-navy) !important;
        }

        .navbar {
            background: var(--tmd-white) !important;
            box-shadow: 0 2px 10px rgba(44, 62, 80, 0.1);
            padding: 1rem 0;
        }

        .nav-link {
            color: var(--tmd-navy) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--tmd-gold) !important;
            transform: translateY(-2px);
        }

        .btn-tmd-primary {
            background: linear-gradient(135deg, var(--tmd-navy) 0%, var(--tmd-navy-light) 100%);
            border: none;
            color: var(--tmd-white);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.2);
        }

        .btn-tmd-primary:hover {
            background: linear-gradient(135deg, var(--tmd-navy-dark) 0%, var(--tmd-navy) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(44, 62, 80, 0.3);
            color: var(--tmd-white);
        }

        .btn-tmd-secondary {
            background: linear-gradient(135deg, var(--tmd-gold) 0%, var(--tmd-gold-light) 100%);
            border: none;
            color: var(--tmd-navy);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.2);
        }

        .btn-tmd-secondary:hover {
            background: linear-gradient(135deg, #e67e22 0%, var(--tmd-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.3);
            color: var(--tmd-white);
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(44, 62, 80, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(44, 62, 80, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--tmd-navy) 0%, var(--tmd-navy-light) 100%);
            color: var(--tmd-white);
            border: none;
            padding: 1.5rem;
        }

        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            margin-bottom: 0;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--tmd-navy) 0%, var(--tmd-navy-light) 100%);
            color: var(--tmd-white);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.03)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
        }

        .alert {
            border: none;
            border-radius: 15px;
            padding: 1rem 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: var(--tmd-white);
        }

        .alert-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: var(--tmd-white);
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.1);
        }

        .table thead th {
            background: var(--tmd-navy);
            color: var(--tmd-white);
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--tmd-gray);
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
        }

        .footer {
            background: var(--tmd-navy);
            color: var(--tmd-white);
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid var(--tmd-gray);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--tmd-navy);
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--tmd-navy);
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

