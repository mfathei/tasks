<?php

namespace Database\Seeders;

use App\Jobs\UpdateStatisticsJob;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    public function run(): void
    {
        dispatch_sync(new UpdateStatisticsJob());
    }
}
