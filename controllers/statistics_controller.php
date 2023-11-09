<?php

require_once 'models/stairs.php';
require_once 'init.php';
class StatisticsController
{
    static function odd($var)
    {
        return $var['num_steps'] & 1;
    }

    static function even($var)
    {
        return !($var['num_steps'] & 1);
    }

    public function showStatistics()
    {
        $data = Stairs::all()->toArray();
        $oddOnes = count(array_filter($data, [self::class, 'odd']));
        $evenOnes = count(array_filter($data, [self::class, 'even']));
        $indoors = count(array_filter($data, function ($var) {
            return $var['is_indoor'];
        }));
        $outdoors = count($data) - $indoors;
        $stepNumbers = array_map(function ($var) {
            return $var['num_steps'];
        }, $data);
        // Incluez le fichier de vue correspondant
        include 'views/statistics_view.php';
    }
}
