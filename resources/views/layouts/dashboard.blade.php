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
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --accent-color: #0d6efd;
            --sidebar-bg: #0f172a;
            --sidebar-color: #94a3b8;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        .navbar-brand-badge {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
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
            font-size: 0.78rem;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                <span class="navbar-brand-badge">IS</span>
                <span class="fw-bold tracking-wide">IntelliShop</span>
            </a>

            <div class="d-flex align-items-center gap-3 ms-auto">
                <span class="badge bg-primary role-pill">
                    {{ auth()->user()->role->name ?? 'User' }}
                </span>
                <div class="text-light small text-end d-none d-md-block">
                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">{{ auth()->user()->email }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm px-3 rounded-pill">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="py-4">
        <div class="container-fluid px-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="text-center py-3 text-muted small border-top bg-white mt-5">
        IntelliShop Enterprise Decision Support &copy; 2026 — KUET CSE 3200
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>