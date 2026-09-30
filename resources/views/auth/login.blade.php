<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntelliShop - System Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            max-width: 480px;
            width: 100%;
            padding: 2.5rem;
        }
        .brand-badge {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .quick-role-btn {
            font-size: 0.78rem;
            padding: 5px 10px;
            border-radius: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="login-card">
    <div class="text-center mb-4">
        <div class="brand-badge">IS</div>
        <h3 class="fw-bold mb-1">IntelliShop</h3>
        <p class="text-muted small">Super Shop Management & Decision Support System</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger py-2 small">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-semibold text-secondary">Email Address</label>
            <input type="email" name="email" id="emailInput" class="form-control" placeholder="name@intellishop.com" value="admin@intellishop.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold text-secondary">Password</label>
            <input type="password" name="password" id="passwordInput" class="form-control" value="password123" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold shadow-sm mb-4">
            Sign In to Dashboard
        </button>
    </form>

    <div class="border-top pt-3">
        <label class="form-label small fw-bold text-muted text-uppercase mb-2" style="font-size: 0.72rem; letter-spacing: 0.5px;">
            Quick Role Switcher (One-Click Demo Fill):
        </label>
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

<script>
function fillCreds(email) {
    document.getElementById('emailInput').value = email;
    document.getElementById('passwordInput').value = 'password123';
}
</script>
</body>
</html>