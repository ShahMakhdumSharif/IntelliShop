<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Role;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAndPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_seven_system_roles_are_seeded(): void
    {
        $this->seed(RoleSeeder::class);

        $expectedRoles = [
            'Super Admin',
            'Branch Manager',
            'Inventory Manager',
            'Cashier',
            'Sales Employee',
            'Purchase Manager',
            'System Analyst',
        ];

        foreach ($expectedRoles as $roleName) {
            $this->assertDatabaseHas('roles', ['name' => $roleName]);
        }

        $this->assertSame(7, Role::count());
    }

    public function test_roles_have_expected_permission_relationships(): void
    {
        $this->seed(RoleSeeder::class);

        $superAdmin = Role::where('slug', 'super-admin')->first();
        $cashier = Role::where('slug', 'cashier')->first();

        $this->assertNotNull($superAdmin);
        $this->assertNotNull($cashier);

        $this->assertTrue($superAdmin->hasPermission('manage-branches'));
        $this->assertTrue($superAdmin->hasPermission('access-pos'));

        $this->assertTrue($cashier->hasPermission('access-pos'));
        $this->assertFalse($cashier->hasPermission('manage-branches'));
    }

    public function test_seeder_is_idempotent(): void
    {
        $this->seed(RoleSeeder::class);
        $this->seed(RoleSeeder::class); // Run second time

        $this->assertSame(7, Role::count());
    }
}
