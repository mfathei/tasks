<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run(): void
    {
        Task::factory(100)->withExistsAdmin()->withExistsUser()->create();
    }
}
