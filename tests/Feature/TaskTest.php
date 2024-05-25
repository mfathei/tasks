<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testItRetrievesTasks(): void
    {
        // Arrange
        $tasks = Task::factory(10)->withAdmin()->withUser()->create();
        $user = User::factory()->create();

        // Execute
        $response = $this->actingAs($user)->get('/tasks');

        // Assert
        $response->assertStatus(200);
        $response->assertSee($tasks->first()->title);
    }
}
