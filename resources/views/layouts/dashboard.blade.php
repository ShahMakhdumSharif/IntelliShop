<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'IntelliShop - Super Shop Management & Decision Support')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --midnight-blue: #101c38;
            --midnight-blue-gradient: linear-gradient(135deg, #0b1428 0%, #101c38 55%, #16254a 100%);
            --header-border: rgba(255, 255, 255, 0.12);
            --footer-bg: #000000;
            --footer-border: #1e293b;
            --footer-text: #94a3b8;
            --footer-text-light: #cbd5e1;
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --accent-color: #0d6efd;
            --sidebar-bg: #0f172a;
            --sidebar-color: #94a3b8;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Professional Midnight Blue Header */
        .site-header {
            background: var(--midnight-blue-gradient) !important;
            border-top: 3px solid #2563eb;
            border-bottom: 1px solid var(--header-border);
            box-shadow: 0 4px 20px rgba(10, 20, 45, 0.25);
            padding-top: 0.65rem;
            padding-bottom: 0.65rem;
        }
        .site-header .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 0.45rem 0.85rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .site-header .nav-link:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }
        .site-header .nav-link.active {
            color: #ffffff !important;
            background: rgba(37, 99, 235, 0.35);
            border: 1px solid rgba(96, 165, 250, 0.3);
            font-weight: 600;
        }
        .navbar-brand-badge {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 1.05rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }
        .brand-text {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.3px;
            color: #ffffff;
        }
        .brand-tagline {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.65);
            letter-spacing: 0.4px;
            line-height: 1;
            margin-top: 2px;
        }
        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: #22c55e;
            box-shadow: 0 0 8px #22c55e;
            display: inline-block;
        }
        .card-stat {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-stat:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }
        .role-pill {
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .user-avatar-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.82rem;
            border: 2px solid rgba(255, 255, 255, 0.25);
        }

        /* Professional Black Footer */
        .site-footer {
            background-color: var(--footer-bg) !important;
            color: var(--footer-text);
            border-top: 1px solid var(--footer-border);
            margin-top: auto;
            font-size: 0.85rem;
        }
        .site-footer .footer-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 0.88rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 1.1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        .site-footer .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 24px;
            height: 2px;
            background: #2563eb;
            border-radius: 2px;
        }
        .site-footer a {
            color: var(--footer-text);
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .site-footer a:hover {
            color: #ffffff;
            text-decoration: none;
        }
        .site-footer .footer-link-item {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .site-footer .footer-link-item i {
            font-size: 0.75rem;
            color: #3b82f6;
        }
        .site-footer .sub-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
            font-size: 0.78rem;
        }
        .system-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: var(--footer-text-light);
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.72rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
    </style>
</head>
<body>
    <!-- Shared Midnight Blue Header -->
    @include('layouts.partials.header')

    <!-- Main Content Area -->
    <main class="py-4 flex-grow-1">
        <div class="container-fluid px-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Shared Professional Black Footer -->
    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>