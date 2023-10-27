<?php
require_once 'controllers/Database.php';

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
        $pdo = Database::connect();
        $query = "SELECT * FROM stairs";
        $stmt = $pdo->query($query);

        if ($stmt) {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $oddOnes = count(array_filter($data, [self::class, 'odd']));
            $evenOnes = count(array_filter($data, [self::class, 'even']));
            $indoors = count(array_filter($data, function ($var) {
                return $var['is_indoor'];
            }));
            $outdoors = count($data) - $indoors;
            $stepNumbers = array_map(function ($var) {
                return $var['num_steps'];
            }, $data);
        } else {
            // Gérez l'erreur de requête
            $errorInfo = $pdo->errorInfo();
            echo "Erreur de requête : " . $errorInfo[2];
        }
        // Incluez le fichier de vue correspondant
        include 'views/statistics_view.php';
    }
}
