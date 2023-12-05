<?php

require_once 'models/stairs.php';
require_once 'init.php';
class StatisticsController
{
    public function showStatistics()
    {
        // fetches some data to include in the statistics page
        $oddStepsCount  = Stairs::whereRaw('num_steps % 2 <> 0')->count();
        $evenStepsCount = Stairs::whereRaw('num_steps % 2 = 0')->count();
        $sortedStairs   = Stairs::orderBy('num_steps')->get();
        $mostFrequentSteps  = $sortedStairs->first() ? $sortedStairs->first()->num_steps : 0;
        $leastFrequentSteps = $sortedStairs->last() ? $sortedStairs->last()->num_steps : 0;
        include 'views/statistics_view.php';
    }
}
