<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of branches with status and manager information.
     */
    public function index(Request $request): View
    {
        $query = Branch::with('manager');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $branches = $query->latest()->paginate(10)->withQueryString();

        return view('branch_management.index', compact('branches'));
    }

    /**
     * Show the form for creating a new branch.
     */
    public function create(): View
    {
        $managers = User::whereHas('role', function ($q) {
            $q->whereIn('slug', ['branch-manager', 'super-admin']);
        })->where('status', 'active')->get();

        return view('branch_management.create', compact('managers'));
    }

    /**
     * Store a newly created branch in storage.
     */
    public function store(StoreBranchRequest $request): RedirectResponse
    {
        $branch = Branch::create($request->validated());

        return redirect()->route('branches.index')
            ->with('success', "Branch '{$branch->name}' [{$branch->code}] was created successfully.");
    }

    /**
     * Show the form for editing the specified branch.
     */
    public function edit(Branch $branch): View
    {
        $managers = User::whereHas('role', function ($q) {
            $q->whereIn('slug', ['branch-manager', 'super-admin']);
        })->where('status', 'active')->get();

        return view('branch_management.edit', compact('branch', 'managers'));
    }

    /**
     * Update the specified branch in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch): RedirectResponse
    {
        $branch->update($request->validated());

        return redirect()->route('branches.index')
            ->with('success', "Branch '{$branch->name}' [{$branch->code}] was updated successfully.");
    }

    /**
     * Toggle branch operational status between active and inactive.
     */
    public function toggleStatus(Branch $branch): RedirectResponse
    {
        $newStatus = $branch->status === 'active' ? 'inactive' : 'active';
        $branch->update(['status' => $newStatus]);

        return redirect()->route('branches.index')
            ->with('success', "Branch '{$branch->name}' status changed to {$newStatus}.");
    }
}