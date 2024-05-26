<?php

namespace Tests\Feature;

use App\Jobs\UpdateStatisticsJob;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testItRetrievesTasks(): void
    {
        // Arrange
        $tasks = Task::factory(10)->withAdmin()->withUser()->create();
        $user = User::query()->admin()->first();

        // Execute
        $response = $this->actingAs($user)->get(route('tasks.index'));

        // Assert
        $response->assertStatus(200);
        $response->assertSee($tasks->first()->title);
    }

    use RefreshDatabase;

    public function test_task_update_statistics(): void
    {
        // Arrange
        Bus::fake();
        $task = Task::factory()->withAdmin()->withUser()->create();
        $user = User::factory()->create();

        // Execute
        $task->update(['assigned_to_id' => $user->id]);

        // Assert
        Bus::assertDispatched(UpdateStatisticsJob::class);
        $this->assertEquals($user->id, $task->fresh()->assignedTo->id);
    }

    public function test_it_validates_request_in_create_task(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Execute
        $response = $this->actingAs($user)->post(route('tasks.store'), []);

        // Assert
        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }
}
