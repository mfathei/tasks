<?php

namespace App\Jobs;

use App\Models\Statistic;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateStatisticsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $timeout = 3000;

    public function handle(): void
    {
        Task::query()
        ->groupBy('assigned_to_id')
        ->select(['assigned_to_id', DB::raw('count(tasks.id) as tasks')])
        ->get()->each(function (Task $task) {
            Statistic::updateOrCreate([
                'user_id' => $task->assigned_to_id,
            ], [
                'total_tasks' => $task->tasks,
            ]);
        });
    }
}
