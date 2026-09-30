<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication endpoints (to be expanded in Sharif's #2 User Registration & Login)
Route::get('/login', function () {
    return response('Login page', 200);
})->name('login');

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

// Route placeholder for branch management (owned by Siyam in Sub-Feature #6)
Route::get('/branches', fn () => response('Branch Index', 200))->name('branches.index');