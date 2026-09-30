<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branchManagerRole = Role::where('slug', 'branch-manager')->first();

        // Seed a sample branch manager for initial assignment
        $managerKhulna = User::firstOrCreate(
            ['email' => 'manager.khulna@intellishop.com'],
            [
                'name' => 'Tanvir Ahmed',
                'password' => Hash::make('password123'),
                'role_id' => $branchManagerRole?->id,
                'status' => 'active',
            ]
        );

        $managerDhaka = User::firstOrCreate(
            ['email' => 'manager.dhaka@intellishop.com'],
            [
                'name' => 'Nusrat Jahan',
                'password' => Hash::make('password123'),
                'role_id' => $branchManagerRole?->id,
                'status' => 'active',
            ]
        );

        $branches = [
            [
                'code' => 'BR-KHL-01',
                'name' => 'Khulna Flagship Super Center',
                'address' => 'Shibbari More, Sonadanga, Khulna',
                'phone' => '+880 1711-000101',
                'email' => 'khulna.branch@intellishop.com',
                'status' => 'active',
                'manager_id' => $managerKhulna->id,
            ],
            [
                'code' => 'BR-DHK-01',
                'name' => 'Dhaka Central Super Mall',
                'address' => 'Road 11, Block D, Banani, Dhaka',
                'phone' => '+880 1711-000102',
                'email' => 'dhaka.branch@intellishop.com',
                'status' => 'active',
                'manager_id' => $managerDhaka->id,
            ],
            [
                'code' => 'BR-CTG-01',
                'name' => 'Chittagong Port Outlet',
                'address' => 'Agrabad Commercial Area, Chittagong',
                'phone' => '+880 1711-000103',
                'email' => 'ctg.branch@intellishop.com',
                'status' => 'active',
                'manager_id' => null,
            ],
            [
                'code' => 'BR-SYL-01',
                'name' => 'Sylhet Garden Retail',
                'address' => 'Zindabazar Point, Sylhet',
                'phone' => '+880 1711-000104',
                'email' => 'sylhet.branch@intellishop.com',
                'status' => 'active',
                'manager_id' => null,
            ],
        ];

        foreach ($branches as $branchData) {
            $branch = Branch::updateOrCreate(
                ['code' => $branchData['code']],
                $branchData
            );

            // Assign manager their branch_id
            if ($branch->manager_id) {
                User::where('id', $branch->manager_id)->update(['branch_id' => $branch->id]);
            }
        }
    }
}