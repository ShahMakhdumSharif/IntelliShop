@extends('layouts.dashboard')
@section('title', 'IntelliShop - System Login')

@section('content')
<style>
    .login-wrapper {
        min-height: calc(100vh - 380px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(16, 28, 56, 0.08), 0 1px 3px rgba(0,0,0,0.05);
        border: 1px solid rgba(226, 232, 240, 0.8);
        max-width: 480px;
        width: 100%;
        padding: 2.5rem;
    }
    .brand-badge {
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
        color: #fff;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.4rem;
        margin-bottom: 1rem;
        box-shadow: 0 8px 16px rgba(37, 99, 235, 0.25);
    }
    .quick-role-btn {
        font-size: 0.78rem;
        padding: 6px 10px;
        border-radius: 8px;
        text-align: left;
        transition: all 0.15s ease;
    }
    .quick-role-btn:hover {
        background-color: #f1f5f9;
        border-color: #94a3b8;
        transform: translateY(-1px);
    }
</style>

<div class="login-wrapper py-4">
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-badge">
                <i class="bi bi-shop-window"></i>
            </div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">IntelliShop</h3>
            <p class="text-muted small">Super Shop Management & Decision Support System</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2 small border-0 shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="emailInput" class="form-control border-start-0" placeholder="name@intellishop.com" value="admin@intellishop.com" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-key"></i></span>
                    <input type="password" name="password" id="passwordInput" class="form-control border-start-0" value="password123" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold shadow-sm mb-4 d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign In to Dashboard</span>
            </button>
        </form>

        <div class="border-top pt-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <label class="form-label small fw-bold text-muted text-uppercase m-0" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                    Quick Role Switcher (One-Click Demo Fill):
                </label>
                <span class="badge text-bg-light border text-secondary" style="font-size: 0.65rem;">7 RBAC Roles</span>
            </div>
            <div class="row g-2">
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('admin@intellishop.com')">
                        👑 <strong>Super Admin</strong>
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('manager.khulna@intellishop.com')">
                        🏢 <strong>Branch Manager</strong>
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('inventory@intellishop.com')">
                        📦 <strong>Inventory Mgr</strong>
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('cashier@intellishop.com')">
                        💳 <strong>Cashier</strong>
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('purchase@intellishop.com')">
                        🚚 <strong>Purchase Mgr</strong>
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-secondary w-100 quick-role-btn" onclick="fillCreds('analyst@intellishop.com')">
                        📊 <strong>System Analyst</strong>
                    </button>
                </div>
            </div>
            <div class="text-center mt-3">
                <span class="text-muted" style="font-size: 0.72rem;">Default demo password for all accounts: <code>password123</code></span>
            </div>
        </div>
    </div>
</div>

<script>
function fillCreds(email) {
    document.getElementById('emailInput').value = email;
    document.getElementById('passwordInput').value = 'password123';
}
</script>
@endsection