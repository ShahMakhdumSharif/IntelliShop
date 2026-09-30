@extends('layouts.dashboard')
@section('title', 'System Analyst Intelligence Hub - IntelliShop')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Decision Support & ML Hub</h2>
        <p class="text-muted mb-0">Forecasting pipeline health, anomaly detection, rule mining, and NLQ audit logs.</p>
    </div>
    <span class="badge bg-purple-subtle text-primary border px-3 py-2 rounded-pill fw-semibold">Analytical Intelligence</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Forecast MAPE</div>
            <div class="fs-3 fw-bold text-success mt-1">8.4%</div>
            <div class="small text-success mt-1">Beats naive baseline by 4.2%</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Flagged Anomalies</div>
            <div class="fs-3 fw-bold text-danger mt-1">2 Items</div>
            <div class="small text-danger mt-1">Z-score / Isolation Forest</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">Cross-Sell Association Rules</div>
            <div class="fs-3 fw-bold text-primary mt-1">85 Rules</div>
            <div class="small text-muted mt-1">Min confidence &gt; 0.65</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat p-3 bg-white">
            <div class="text-muted small text-uppercase fw-semibold">NLQ Processed Queries</div>
            <div class="fs-3 fw-bold text-info mt-1">142</div>
            <div class="small text-muted mt-1">100% whitelisted registry matches</div>
        </div>
    </div>
</div>
@endsection