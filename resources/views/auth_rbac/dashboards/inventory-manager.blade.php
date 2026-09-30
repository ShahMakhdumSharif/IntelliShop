@extends('layouts.dashboard')
@section('title', 'Inventory Manager Dashboard - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Inventory & Catalog Control</h2>
        <p class="text-muted mb-0">Product definitions, branch stock allocation, stock adjustments, and goods receiving.</p>
    </div>
    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2 rounded-pill fw-semibold">Inventory Scope</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Catalog SKUs</div>
            <div class="fs-3 fw-bold text-primary mt-1">1,420</div>
            <div class="small text-muted mt-1">Across 18 categories</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Stock Reorder Alerts</div>
            <div class="fs-3 fw-bold text-danger mt-1">14</div>
            <div class="small text-danger mt-1">Quantity &le; Reorder Point</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Inbound Goods Shipments</div>
            <div class="fs-3 fw-bold text-info mt-1">3</div>
            <div class="small text-muted mt-1">Awaiting verification</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Stock Health Index</div>
            <div class="fs-3 fw-bold text-success mt-1">94.8%</div>
            <div class="small text-muted mt-1">Zero negative variance</div>
        </div>
    </div>
</div>
@endsection