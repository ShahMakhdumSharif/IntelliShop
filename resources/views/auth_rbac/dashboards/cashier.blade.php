@extends('layouts.dashboard')
@section('title', 'Cashier POS Station - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Point of Sale (POS) Terminal</h2>
        <p class="text-muted mb-0">Barcode checkout, discount verification, and customer receipt printing.</p>
    </div>
    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">Register Active</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Today's Transactions</div>
            <div class="fs-3 fw-bold text-primary mt-1">78</div>
            <div class="small text-muted mt-1">Current register session</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Shift Total</div>
            <div class="fs-3 fw-bold text-success mt-1">$4,180.50</div>
            <div class="small text-muted mt-1">Cash, Card, Mobile Payments</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Scanner Status</div>
            <div class="fs-3 fw-bold text-info mt-1">Ready</div>
            <div class="small text-success mt-1">Optical scan listener online</div>
        </div>
    </div>
</div>
@endsection