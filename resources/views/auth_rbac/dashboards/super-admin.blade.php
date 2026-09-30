@extends('layouts.dashboard')
@section('title', 'Super Admin Dashboard - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Super Administrator Console</h2>
        <p class="text-muted mb-0">System-wide monitoring, branches, user access control, and enterprise audits.</p>
    </div>
    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-semibold">Global Privilege</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Active Branches</div>
            <div class="fs-3 fw-bold text-primary mt-1">4</div>
            <div class="small text-success mt-1">&uarr; Operational across all regions</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Enterprise Users</div>
            <div class="fs-3 fw-bold text-dark mt-1">28</div>
            <div class="small text-muted mt-1">7 distinct access roles</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Daily Gross Sales</div>
            <div class="fs-3 fw-bold text-success mt-1">$48,250</div>
            <div class="small text-success mt-1">&uarr; +12.4% vs last week</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Security Status</div>
            <div class="fs-3 fw-bold text-info mt-1">Optimal</div>
            <div class="small text-muted mt-1">0 active throttle lockouts</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card card-stat p-4 bg-white">
            <h5 class="fw-bold mb-3">Enterprise Operations Quick Access</h5>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('branches.index') }}" class="btn btn-outline-primary btn-sm px-3 py-2 rounded-3 fw-semibold">
                    &rarr; Branch Management (CRUD)
                </a>
                <a href="#" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold disabled">
                    &rarr; Role & Permission Directory
                </a>
                <a href="#" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3 fw-semibold disabled">
                    &rarr; System Audit Log Explorer
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-stat p-4 bg-white">
            <h6 class="fw-bold text-uppercase small text-muted mb-2">Role Scope</h6>
            <p class="small text-muted mb-0">You possess unrestricted master access across all branch databases, analytical pipelines, and user provisioning.</p>
        </div>
    </div>
</div>
@endsection