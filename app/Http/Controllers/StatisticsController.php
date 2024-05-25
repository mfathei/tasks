<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticsController extends Controller
{
    public const LIMIT = 10;

    public function __invoke()
    {
        $statistics = Statistic::with('user')->orderByDesc('total_tasks')->limit(self::LIMIT)->get();

        return view('statistics.index', compact('statistics'));
    }
}
