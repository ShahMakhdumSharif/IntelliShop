@extends('layouts.dashboard')
@section('title', 'Sales Floor Assistant - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Floor Sales & Customer Service</h2>
        <p class="text-muted mb-0">Live stock inquiries, active promotions, and customer assistance.</p>
    </div>
    <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-3 py-2 rounded-pill fw-semibold">Floor Assistance</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Branch Stock Search</div>
            <div class="fs-3 fw-bold text-primary mt-1">Live</div>
            <div class="small text-muted mt-1">Instant barcode/SKU lookup</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Active Promotions</div>
            <div class="fs-3 fw-bold text-warning-emphasis mt-1">5 Campaigns</div>
            <div class="small text-muted mt-1">Category & bundle discounts</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Loyalty Signups</div>
            <div class="fs-3 fw-bold text-success mt-1">12</div>
            <div class="small text-muted mt-1">New members today</div>
        </div>
    </div>
</div>
@endsection