<?php

require_once 'models/stairs.php';
require_once 'init.php';
class StatisticsController
{
    public function showStatistics()
    {
        $oddStepsCount = Stairs::whereRaw('num_steps % 2 <> 0')->count();
        $evenStepsCount = Stairs::whereRaw('num_steps % 2 = 0')->count();
        $sortedStairs = Stairs::orderBy('num_steps')->get();
        $mostFrequentSteps = $sortedStairs->first()->num_steps;
        $leastFrequentSteps = $sortedStairs->last()->num_steps;

        include 'views/statistics_view.php';
    }
}
