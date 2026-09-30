<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleBasedDashboardRoutingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RoleSeeder::class);
    }

    public function test_unauthenticated_user_is_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');

        $responseSuper = $this->get('/dashboard/super-admin');
        $responseSuper->assertRedirect('/login');
    }

    public function test_each_of_the_seven_roles_lands_on_correct_dashboard_route(): void
    {
        $roleSlugs = [
            'super-admin',
            'branch-manager',
            'inventory-manager',
            'cashier',
            'sales-employee',
            'purchase-manager',
            'system-analyst',
        ];

        foreach ($roleSlugs as $slug) {
            $role = Role::where('slug', $slug)->firstOrFail();
            $user = User::factory()->create([
                'role_id' => $role->id,
                'status' => 'active',
            ]);

            // 1. Visit /dashboard dispatcher
            $response = $this->actingAs($user)->get('/dashboard');
            $response->assertRedirect("/dashboard/{$slug}");

            // 2. Follow redirect to role dashboard view
            $dashboardResponse = $this->actingAs($user)->get("/dashboard/{$slug}");
            $dashboardResponse->assertStatus(200);
            $dashboardResponse->assertSee($role->name);
        }
    }

    public function test_unauthorized_role_access_is_forbidden_with_403(): void
    {
        $cashierRole = Role::where('slug', 'cashier')->firstOrFail();
        $cashier = User::factory()->create([
            'role_id' => $cashierRole->id,
            'status' => 'active',
        ]);

        // Attempting to access Super Admin dashboard
        $response = $this->actingAs($cashier)->get('/dashboard/super-admin');
        $response->assertStatus(403);

        // Attempting to access Inventory Manager dashboard
        $response2 = $this->actingAs($cashier)->get('/dashboard/inventory-manager');
        $response2->assertStatus(403);
    }

    public function test_inactive_user_cannot_access_dashboard(): void
    {
        $role = Role::where('slug', 'cashier')->firstOrFail();
        $user = User::factory()->create([
            'role_id' => $role->id,
            'status' => 'inactive',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/cashier');
        $response->assertRedirect('/login');
    }
}