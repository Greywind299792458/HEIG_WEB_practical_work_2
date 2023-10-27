<?php

class StairsListController
{
    public function showList()
    {
        try {
            $pdo    = Database::connect();
            $query  = "SELECT * FROM stairs";
            $stmt   = $pdo->query($query);
            if ($stmt) {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $errorInfo = $pdo->errorInfo();
                echo "Erreur de requête : " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        include 'views/stairsList_view.php';
    }
}
