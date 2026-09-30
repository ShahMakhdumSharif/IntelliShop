<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Map authenticated user's role to their dedicated dashboard route.
     */
    public function index(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->role) {
            abort(403, 'No valid system role assigned to your account.');
        }

        return match ($user->role->slug) {
            'super-admin' => redirect()->route('dashboard.super-admin'),
            'branch-manager' => redirect()->route('dashboard.branch-manager'),
            'inventory-manager' => redirect()->route('dashboard.inventory-manager'),
            'cashier' => redirect()->route('dashboard.cashier'),
            'sales-employee' => redirect()->route('dashboard.sales-employee'),
            'purchase-manager' => redirect()->route('dashboard.purchase-manager'),
            'system-analyst' => redirect()->route('dashboard.system-analyst'),
            default => abort(403, 'Unrecognized role configuration.'),
        };
    }

    public function superAdmin(Request $request): View
    {
        return view('auth_rbac.dashboards.super-admin', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function branchManager(Request $request): View
    {
        return view('auth_rbac.dashboards.branch-manager', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function inventoryManager(Request $request): View
    {
        return view('auth_rbac.dashboards.inventory-manager', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function cashier(Request $request): View
    {
        return view('auth_rbac.dashboards.cashier', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function salesEmployee(Request $request): View
    {
        return view('auth_rbac.dashboards.sales-employee', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function purchaseManager(Request $request): View
    {
        return view('auth_rbac.dashboards.purchase-manager', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }

    public function systemAnalyst(Request $request): View
    {
        return view('auth_rbac.dashboards.system-analyst', [
            'user' => $request->user(),
            'role' => $request->user()->role,
        ]);
    }
}