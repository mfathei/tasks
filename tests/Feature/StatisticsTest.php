<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;

    public function testItRetrievesStatistics(): void
    {
        // Arrange
        $statistics = Statistic::factory(20)->create();
        $user = User::factory()->create();

        // Execute
        $response = $this->actingAs($user)->get('/statistics');

        // Assert
        $response->assertStatus(200);
        $response->assertSee($statistics->first()->title);
    }
}
