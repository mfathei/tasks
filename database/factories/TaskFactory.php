<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3) . ' - ' . fake()->word(),
            'description' => fake()->sentence(20),
            'is_completed' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withUser(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'assigned_to_id' => User::factory()->create()->id,
            ];
        });
    }

    public function withAdmin(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'assigned_by_id' => User::factory()->admin()->create()->id,
            ];
        });
    }

    public function withExistsUser(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'assigned_to_id' => $this->faker->numberBetween(101, 10000),
            ];
        });
    }

    public function withExistsAdmin(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'assigned_by_id' => $this->faker->numberBetween(1, 100),
            ];
        });
    }

    public function forUser(User $user): self
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'assigned_to_id' => $user->id,
            ];
        });
    }

    public function forAdmin(User $user): self
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'assigned_by_id' => $user->id,
            ];
        });
    }
}
