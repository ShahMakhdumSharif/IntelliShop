<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Authentication & Users
            ['name' => 'view-users', 'module' => 'auth', 'description' => 'View system users'],
            ['name' => 'manage-users', 'module' => 'auth', 'description' => 'Create, edit, and deactivate users'],
            
            // Branch Management
            ['name' => 'view-branches', 'module' => 'branch', 'description' => 'View branch details'],
            ['name' => 'manage-branches', 'module' => 'branch', 'description' => 'Create and modify branches'],
            
            // Products & Catalog
            ['name' => 'view-products', 'module' => 'catalog', 'description' => 'View product catalog'],
            ['name' => 'manage-products', 'module' => 'catalog', 'description' => 'Create and update products/units/brands'],
            
            // Inventory & Stock
            ['name' => 'view-inventory', 'module' => 'inventory', 'description' => 'View branch stock levels'],
            ['name' => 'manage-stock-transfers', 'module' => 'inventory', 'description' => 'Initiate and approve stock transfers'],
            ['name' => 'adjust-inventory', 'module' => 'inventory', 'description' => 'Make manual stock adjustments'],
            
            // POS & Sales
            ['name' => 'access-pos', 'module' => 'pos', 'description' => 'Operate barcode POS cash register'],
            ['name' => 'apply-discounts', 'module' => 'pos', 'description' => 'Apply discounts to sales'],
            
            // Purchases & Suppliers
            ['name' => 'view-purchases', 'module' => 'purchase', 'description' => 'View purchase orders and goods received'],
            ['name' => 'manage-purchase-orders', 'module' => 'purchase', 'description' => 'Create and approve purchase orders'],
            ['name' => 'receive-goods', 'module' => 'purchase', 'description' => 'Receive and inspect incoming shipments'],
            ['name' => 'manage-suppliers', 'module' => 'supplier', 'description' => 'Manage supplier directory and terms'],
            
            // Reports & Dashboards
            ['name' => 'view-reports', 'module' => 'reports', 'description' => 'View financial and operational reports'],
            ['name' => 'view-analytics', 'module' => 'analytics', 'description' => 'View ML forecasts and decision metrics'],
            ['name' => 'query-nlq', 'module' => 'nlq', 'description' => 'Query system via natural language'],
        ];

        foreach ($permissions as $permData) {
            Permission::firstOrCreate(['name' => $permData['name']], $permData);
        }

        $rolesWithPermissions = [
            'Super Admin' => [
                'slug' => 'super-admin',
                'description' => 'Complete enterprise system control across all branches',
                'permissions' => array_column($permissions, 'name'),
            ],
            'Branch Manager' => [
                'slug' => 'branch-manager',
                'description' => 'Supervises branch-scoped sales, transfers, inventory, and staff',
                'permissions' => [
                    'view-branches', 'view-products', 'view-inventory', 
                    'manage-stock-transfers', 'view-purchases', 'view-reports', 
                    'view-analytics', 'query-nlq'
                ],
            ],
            'Inventory Manager' => [
                'slug' => 'inventory-manager',
                'description' => 'Controls catalog, stock replenishment, adjustments, and receiving',
                'permissions' => [
                    'view-products', 'manage-products', 'view-inventory', 
                    'adjust-inventory', 'manage-stock-transfers', 'receive-goods'
                ],
            ],
            'Cashier' => [
                'slug' => 'cashier',
                'description' => 'Operates POS barcode counter and generates customer invoices',
                'permissions' => ['access-pos', 'apply-discounts', 'view-products'],
            ],
            'Sales Employee' => [
                'slug' => 'sales-employee',
                'description' => 'Assists branch sales, registers customers, and checks product availability',
                'permissions' => ['view-products', 'view-inventory'],
            ],
            'Purchase Manager' => [
                'slug' => 'purchase-manager',
                'description' => 'Evaluates suppliers, manages purchase orders, and handles procurement',
                'permissions' => [
                    'view-products', 'manage-suppliers', 'view-purchases', 
                    'manage-purchase-orders', 'view-reports'
                ],
            ],
            'System Analyst' => [
                'slug' => 'system-analyst',
                'description' => 'Monitors forecasting pipelines, model metrics, anomalies, and NLQ queries',
                'permissions' => [
                    'view-reports', 'view-analytics', 'query-nlq', 
                    'view-products', 'view-inventory'
                ],
            ],
        ];

        foreach ($rolesWithPermissions as $roleName => $roleData) {
            $role = Role::firstOrCreate(
                ['slug' => $roleData['slug']],
                ['name' => $roleName, 'description' => $roleData['description']]
            );

            $permissionIds = Permission::whereIn('name', $roleData['permissions'])->pluck('id');
            $role->permissions()->sync($permissionIds);
        }
    }
}
