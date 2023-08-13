<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Travel;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditorTravelTest extends TestCase
{
    use RefreshDatabase;

    public function test_updates_travel_successfully_with_valid_data(): void
    {
        $this->seed(RoleSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(Role::where('name', 'editor')->value('id'));

        $travel = Travel::factory()->create();

        $response = $this->actingAs($user)->patchJson('/api/v1/admin/travel/'.$travel->id.'/update', [
            'name' => 'Test Travel',
        ]);
        $response->assertStatus(422);

        $response = $this->actingAs($user)->patchJson('/api/v1/admin/travel/'.$travel->id.'/update', [
            'name' => 'Test Travel',
            'is_public' => 1,
            'description' => 'Travel description',
            'number_of_days' => 5,
        ]);

        $response->assertStatus(200);

        $response = $this->get('/api/v1/travels');
        $response->assertJsonFragment(['name' => 'Test Travel']);
    }
}
