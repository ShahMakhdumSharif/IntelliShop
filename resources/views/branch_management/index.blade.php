@extends('layouts.dashboard')
@section('title', 'Branch Management - IntelliShop')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 small">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Branch Management</li>
            </ol>
        </nav>
        <h3 class="fw-bold mb-0">Branch Directory</h3>
        <p class="text-muted small mb-0">Manage retail outlets, assigned managers, contact records, and operational statuses.</p>
    </div>
    @if(auth()->user()->hasRole('super-admin'))
    <a href="{{ route('branches.create') }}" class="btn btn-primary px-3 shadow-sm rounded-pill fw-semibold">
        + Create New Branch
    </a>
    @endif
</div>

<!-- Filter & Search Toolbar -->
<div class="card card-stat mb-4 bg-white p-3">
    <form method="GET" action="{{ route('branches.index') }}" class="row g-2 align-items-center">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by name, code or phone..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select form-select-sm">
                <option value="">All Operational Statuses</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-dark btn-sm px-3 rounded-pill fw-semibold">Filter</button>
            <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Reset</a>
        </div>
    </form>
</div>

<!-- Branches Table -->
<div class="card card-stat bg-white overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr class="small text-uppercase text-muted fw-bold">
                    <th class="ps-4">Code</th>
                    <th>Branch Name</th>
                    <th>Address</th>
                    <th>Contact Phone</th>
                    <th>Branch Manager</th>
                    <th>Status</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branches as $branch)
                <tr>
                    <td class="ps-4">
                        <span class="badge bg-secondary-subtle text-secondary font-monospace fw-semibold">{{ $branch->code }}</span>
                    </td>
                    <td class="fw-bold text-dark">{{ $branch->name }}</td>
                    <td class="text-muted small">{{ $branch->address ?? '—' }}</td>
                    <td class="text-muted small font-monospace">{{ $branch->phone ?? '—' }}</td>
                    <td>
                        @if($branch->manager)
                            <div class="small fw-semibold text-dark">{{ $branch->manager->name }}</div>
                            <div class="text-muted" style="font-size: 0.72rem;">{{ $branch->manager->email }}</div>
                        @else
                            <span class="text-muted small fst-italic">Unassigned</span>
                        @endif
                    </td>
                    <td>
                        @if($branch->status === 'active')
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Active</span>
                        @else
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">Inactive</span>
                        @endif
                    </td>
                    <td class="text-end pe-4">
                        @if(auth()->user()->hasRole('super-admin'))
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('branches.edit', $branch) }}" class="btn btn-outline-primary btn-sm rounded-start">
                                Edit
                            </a>
                            <form action="{{ route('branches.toggle-status', $branch) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-{{ $branch->status === 'active' ? 'warning' : 'success' }} btn-sm rounded-end">
                                    {{ $branch->status === 'active' ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </div>
                        @else
                        <span class="text-muted small">View Only</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        No branches match your query.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($branches->hasPages())
    <div class="p-3 border-top">
        {{ $branches->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection