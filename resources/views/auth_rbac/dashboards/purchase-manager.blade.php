@extends('layouts.dashboard')
@section('title', 'Purchase Manager Console - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Procurement & Supplier Center</h2>
        <p class="text-muted mb-0">Supplier evaluations, automated purchase orders, and lead time tracking.</p>
    </div>
    <span class="badge bg-dark-subtle text-dark border border-dark-subtle px-3 py-2 rounded-pill fw-semibold">Procurement Scope</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Active Suppliers</div>
            <div class="fs-3 fw-bold text-primary mt-1">36</div>
            <div class="small text-muted mt-1">WSM/SAW evaluated</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Draft Purchase Orders</div>
            <div class="fs-3 fw-bold text-warning mt-1">4</div>
            <div class="small text-muted mt-1">2 AI-recommended reorders</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">On-Order Value</div>
            <div class="fs-3 fw-bold text-success mt-1">$62,400</div>
            <div class="small text-muted mt-1">7 shipments in transit</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Avg Supplier Reliability</div>
            <div class="fs-3 fw-bold text-info mt-1">92.3%</div>
            <div class="small text-success mt-1">Lead time compliance</div>
        </div>
    </div>
</div>
@endsection