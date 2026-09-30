<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->hasRole(['super-admin']);
    }

    public function rules(): array
    {
        $branchId = $this->route('branch') ? $this->route('branch')->id : null;

        return [
            'code' => ['required', 'string', 'max:50', Rule::unique('branches', 'code')->ignore($branchId)],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'manager_id' => ['nullable', 'exists:users,id'],
        ];
    }
}