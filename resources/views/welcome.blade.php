@extends('layouts.dashboard')
@section('title', 'IntelliShop - Super Shop Management & Decision Support System')

@section('content')
<div class="container py-4">
    <!-- Hero Banner -->
    <div class="p-5 mb-4 rounded-4 shadow-sm text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #101c38 0%, #1e3a8a 60%, #2563eb 100%);">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-extrabold mb-3 tracking-tight">IntelliShop</h1>
                <p class="fs-5 text-light opacity-90 mb-4 pe-lg-4" style="max-width: 650px;">
                    Intelligent Super Shop Management & Decision Support System. Multi-branch real-time inventory ledger, barcode POS, supplier evaluation, and AI-powered predictive demand forecasting.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg px-4 py-2 rounded-pill fw-bold text-primary shadow-sm">
                            <i class="bi bi-speedometer2 me-2"></i> Open Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4 py-2 rounded-pill fw-bold text-primary shadow-sm">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Enter System Portal
                        </a>
                    @endauth
                    @if(auth()->check() && auth()->user()->hasRole(['super-admin', 'branch-manager']))
                        <a href="{{ route('branches.index') }}" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill fw-semibold">
                            <i class="bi bi-diagram-3 me-2"></i> Branch Directory
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="bg-white bg-opacity-10 p-4 rounded-4 border border-white border-opacity-20 shadow-lg backdrop-blur">
                    <i class="bi bi-shop display-1 text-white opacity-75"></i>
                    <div class="mt-3 fw-bold text-white fs-5">Enterprise Ready</div>
                    <div class="small text-white-50">Branch Scoped &bull; 7 RBAC Roles</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
