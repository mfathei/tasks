<?php

namespace App\Observers;

use App\Jobs\UpdateStatisticsJob;
use App\Models\Task;

class TaskObserver
{
    public function created(Task $task): void
    {
        // I'd like to use Mutex here to prevent overlapping, but I've limited time
        dispatch(new UpdateStatisticsJob());
    }

    public function updated(Task $task): void
    {
        dispatch(new UpdateStatisticsJob());
    }

    public function deleted(Task $task): void
    {
        dispatch(new UpdateStatisticsJob());
    }

    public function restored(Task $task): void
    {
        dispatch(new UpdateStatisticsJob());
    }

    public function forceDeleted(Task $task): void
    {
        dispatch(new UpdateStatisticsJob());
    }
}
