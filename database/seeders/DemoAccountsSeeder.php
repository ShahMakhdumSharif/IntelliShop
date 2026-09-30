<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoAccountsSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            ['name' => 'Super Administrator', 'email' => 'admin@intellishop.com', 'role' => 'super-admin'],
            ['name' => 'Inventory Manager', 'email' => 'inventory@intellishop.com', 'role' => 'inventory-manager'],
            ['name' => 'Counter Cashier 1', 'email' => 'cashier@intellishop.com', 'role' => 'cashier'],
            ['name' => 'Floor Sales Staff', 'email' => 'sales@intellishop.com', 'role' => 'sales-employee'],
            ['name' => 'Procurement Head', 'email' => 'purchase@intellishop.com', 'role' => 'purchase-manager'],
            ['name' => 'Lead Data Analyst', 'email' => 'analyst@intellishop.com', 'role' => 'system-analyst'],
        ];

        foreach ($accounts as $acc) {
            $role = Role::where('slug', $acc['role'])->first();
            User::firstOrCreate(
                ['email' => $acc['email']],
                [
                    'name' => $acc['name'],
                    'password' => Hash::make('password123'),
                    'role_id' => $role?->id,
                    'status' => 'active',
                ]
            );
        }
    }
}