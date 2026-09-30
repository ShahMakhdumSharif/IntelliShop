<!-- Midnight Blue Header -->
<header class="site-header sticky-top">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <!-- Brand Logo & Meta -->
            <div class="d-flex align-items-center gap-3">
                <a class="text-decoration-none d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                    <span class="navbar-brand-badge">
                        <i class="bi bi-shop-window"></i>
                    </span>
                    <div>
                        <div class="brand-text d-flex align-items-center gap-2">
                            IntelliShop
                        </div>
                        <div class="brand-tagline">Super Shop Management & Decision Support</div>
                    </div>
                </a>

                <!-- Navigation Links -->
                @auth
                <nav class="d-none d-md-flex align-items-center gap-1 ms-3 ps-3 border-start border-white-50 border-opacity-25">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>

                    @if(auth()->user()->hasRole(['super-admin', 'branch-manager']))
                    <a href="{{ route('branches.index') }}" class="nav-link {{ request()->routeIs('branches.*') ? 'active' : '' }}">
                        <i class="bi bi-diagram-3-fill"></i>
                        <span>Branches</span>
                    </a>
                    @endif
                </nav>
                @endauth
            </div>

            <!-- Right Action / User Center -->
            <div class="d-flex align-items-center gap-3 ms-auto">
                @auth
                    <!-- System Status -->
                    <div class="system-pill d-none d-lg-inline-flex">
                        <span class="status-dot"></span>
                        <span>System Online</span>
                    </div>

                    <!-- Branch Badge if Assigned -->
                    @if(auth()->user()->branch)
                        <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2 py-1.5 rounded-pill d-none d-sm-inline-flex align-items-center gap-1" style="font-size: 0.72rem;">
                            <i class="bi bi-geo-alt-fill text-info"></i>
                            {{ auth()->user()->branch->name }}
                        </span>
                    @endif

                    <!-- Role Pill -->
                    <span class="badge bg-primary role-pill shadow-sm">
                        <i class="bi bi-shield-check me-1"></i>
                        {{ auth()->user()->role->name ?? 'User' }}
                    </span>

                    <!-- User Profile Info -->
                    <div class="d-flex align-items-center gap-2 text-light">
                        <div class="user-avatar-circle shadow-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="text-start d-none d-md-block" style="line-height: 1.2;">
                            <div class="fw-semibold text-white small">{{ auth()->user()->name }}</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">{{ auth()->user()->email }}</div>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm px-3 rounded-pill d-inline-flex align-items-center gap-1 shadow-sm" style="font-size: 0.78rem;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="d-none d-sm-inline">Logout</span>
                        </button>
                    </form>
                @else
                    <div class="system-pill">
                        <span class="status-dot"></span>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-3 rounded-pill fw-semibold shadow-sm d-inline-flex align-items-center gap-1">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Sign In</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
