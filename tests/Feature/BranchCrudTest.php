<?php

namespace Tests\Feature;

use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BranchCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private User $cashier;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RoleSeeder::class);

        $adminRole = Role::where('slug', 'super-admin')->firstOrFail();
        $cashierRole = Role::where('slug', 'cashier')->firstOrFail();

        $this->admin = User::factory()->create([
            'role_id' => $adminRole->id,
            'status' => 'active',
        ]);

        $this->cashier = User::factory()->create([
            'role_id' => $cashierRole->id,
            'status' => 'active',
        ]);
    }

    public function test_super_admin_can_view_branch_list(): void
    {
        Branch::create([
            'code' => 'BR-TEST-01',
            'name' => 'Test Outlet',
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->admin)->get('/branches');
        $response->assertStatus(200);
        $response->assertSee('Test Outlet');
        $response->assertSee('BR-TEST-01');
    }

    public function test_super_admin_can_create_a_new_branch(): void
    {
        $payload = [
            'code' => 'BR-NEW-99',
            'name' => 'Mirpur Super Outlet',
            'address' => 'Mirpur 10 Circle, Dhaka',
            'phone' => '+880 1711-999999',
            'email' => 'mirpur@intellishop.com',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->admin)->post('/branches', $payload);
        $response->assertRedirect('/branches');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('branches', [
            'code' => 'BR-NEW-99',
            'name' => 'Mirpur Super Outlet',
            'status' => 'active',
        ]);
    }

    public function test_branch_code_must_be_unique(): void
    {
        Branch::create([
            'code' => 'BR-DUPE-01',
            'name' => 'Original Branch',
            'status' => 'active',
        ]);

        $payload = [
            'code' => 'BR-DUPE-01',
            'name' => 'Duplicate Attempt Branch',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->admin)->post('/branches', $payload);
        $response->assertSessionHasErrors(['code']);
    }

    public function test_super_admin_can_update_an_existing_branch(): void
    {
        $branch = Branch::create([
            'code' => 'BR-EDIT-01',
            'name' => 'Before Edit Name',
            'status' => 'active',
        ]);

        $payload = [
            'code' => 'BR-EDIT-01',
            'name' => 'Updated Branch Name',
            'address' => 'New Facility Address',
            'phone' => '+880 1888-000000',
            'email' => 'updated@intellishop.com',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->admin)->put("/branches/{$branch->id}", $payload);
        $response->assertRedirect('/branches');

        $this->assertDatabaseHas('branches', [
            'id' => $branch->id,
            'name' => 'Updated Branch Name',
            'address' => 'New Facility Address',
        ]);
    }

    public function test_super_admin_can_toggle_branch_status(): void
    {
        $branch = Branch::create([
            'code' => 'BR-TOGGLE-01',
            'name' => 'Active Branch',
            'status' => 'active',
        ]);

        // Toggle to inactive
        $response = $this->actingAs($this->admin)->patch("/branches/{$branch->id}/toggle-status");
        $response->assertRedirect('/branches');
        $this->assertDatabaseHas('branches', [
            'id' => $branch->id,
            'status' => 'inactive',
        ]);

        // Toggle back to active
        $response2 = $this->actingAs($this->admin)->patch("/branches/{$branch->id}/toggle-status");
        $response2->assertRedirect('/branches');
        $this->assertDatabaseHas('branches', [
            'id' => $branch->id,
            'status' => 'active',
        ]);
    }

    public function test_unauthorized_user_cannot_access_branch_crud(): void
    {
        $response = $this->actingAs($this->cashier)->get('/branches');
        $response->assertStatus(403);

        $postResponse = $this->actingAs($this->cashier)->post('/branches', [
            'code' => 'BR-HACK',
            'name' => 'Unauthorized Branch',
            'status' => 'active',
        ]);
        $postResponse->assertStatus(403);
    }
}