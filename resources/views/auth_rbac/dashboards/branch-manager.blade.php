@extends('layouts.dashboard')
@section('title', 'Branch Manager Dashboard - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Branch Manager Operations</h2>
        <p class="text-muted mb-0">Branch-scoped inventory control, cashiers, stock transfers, and daily receipts.</p>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">Branch Scoped</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Today's Branch Revenue</div>
            <div class="fs-3 fw-bold text-primary mt-1">$12,480</div>
            <div class="small text-muted mt-1">214 completed sales</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Low Stock Items</div>
            <div class="fs-3 fw-bold text-warning mt-1">6 SKUs</div>
            <div class="small text-danger mt-1">Requires transfer / reorder</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Inbound Transfers</div>
            <div class="fs-3 fw-bold text-info mt-1">2 Pending</div>
            <div class="small text-muted mt-1">From Central Warehouse</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Active Cash Registers</div>
            <div class="fs-3 fw-bold text-success mt-1">3 / 4</div>
            <div class="small text-muted mt-1">All shifts verified</div>
        </div>
    </div>
</div>
@endsection