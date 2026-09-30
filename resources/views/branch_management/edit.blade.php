@extends('layouts.dashboard')
@section('title', 'Edit Branch - IntelliShop')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 small">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('branches.index') }}" class="text-decoration-none">Branches</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $branch->code }}</li>
            </ol>
        </nav>

        <div class="card card-stat bg-white p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Edit Branch: {{ $branch->name }}</h4>
                    <p class="text-muted small mb-0">Modify configuration, manager assignments, or operational status.</p>
                </div>
                <span class="badge bg-secondary-subtle text-secondary font-monospace">{{ $branch->code }}</span>
            </div>

            <form action="{{ route('branches.update', $branch) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Branch Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" class="form-control font-monospace @error('code') is-invalid @enderror" value="{{ old('code', $branch->code) }}" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Branch Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $branch->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Contact Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $branch->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Official Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $branch->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-semibold">Physical Address</label>
                        <textarea name="address" rows="2" class="form-control @error('address') is-invalid @enderror">{{ old('address', $branch->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Assigned Branch Manager</label>
                        <select name="manager_id" class="form-select @error('manager_id') is-invalid @enderror">
                            <option value="">-- Select Manager (Optional) --</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}" {{ old('manager_id', $branch->manager_id) == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->name }} ({{ $manager->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('manager_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status', $branch->status) === 'active' ? 'selected' : '' }}>Active (Receives stock & sales)</option>
                            <option value="inactive" {{ old('status', $branch->status) === 'inactive' ? 'selected' : '' }}>Inactive (Decommissioned / Paused)</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-semibold">Update Branch</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection