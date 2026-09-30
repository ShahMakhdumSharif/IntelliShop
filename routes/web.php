<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication endpoints
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Centralized Role-Based Dashboard Dispatcher
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Protected Role-Scoped Dashboards
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/super-admin', [DashboardController::class, 'superAdmin'])
        ->middleware('role:super-admin')
        ->name('super-admin');

    Route::get('/branch-manager', [DashboardController::class, 'branchManager'])
        ->middleware('role:branch-manager')
        ->name('branch-manager');

    Route::get('/inventory-manager', [DashboardController::class, 'inventoryManager'])
        ->middleware('role:inventory-manager')
        ->name('inventory-manager');

    Route::get('/cashier', [DashboardController::class, 'cashier'])
        ->middleware('role:cashier')
        ->name('cashier');

    Route::get('/sales-employee', [DashboardController::class, 'salesEmployee'])
        ->middleware('role:sales-employee')
        ->name('sales-employee');

    Route::get('/purchase-manager', [DashboardController::class, 'purchaseManager'])
        ->middleware('role:purchase-manager')
        ->name('purchase-manager');

    Route::get('/system-analyst', [DashboardController::class, 'systemAnalyst'])
        ->middleware('role:system-analyst')
        ->name('system-analyst');
});

// Branch Management (Sub-Feature #6: Branch CRUD)
Route::middleware(['auth', 'role:super-admin,branch-manager'])->group(function () {
    Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::patch('/branches/{branch}/toggle-status', [BranchController::class, 'toggleStatus'])->name('branches.toggle-status');
});