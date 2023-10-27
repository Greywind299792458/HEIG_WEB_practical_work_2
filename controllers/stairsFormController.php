<?php

class StairsFormController
{
    public function showForm()
    {
        include 'views/stairsForm_view.php';
    }

    public function processForm()
    {
        // Valider les données et effectuer le traitement
        $stairs_name     = $_POST['stairsName'];
        $num_steps       = $_POST['numSteps'];
        $is_indoor       = $_POST['isIndoor'];
        $building_name   = $_POST['buildingName'];
        $starting_level  = $_POST['startingLevel'];
        $rating          = $_POST['rating'];
        $special_feature = $_POST['specialFeature'];
        try {
            $pdo        = Database::connect();
            $sqlquery   = "INSERT INTO stairs (stairs_name,num_steps,is_indoor,building_name,starting_level,rating,special_feature)
                VALUES(:stairs_name,:num_steps,:is_indoor,:building_name,:starting_level,:rating,:special_feature)";
            $stmt       = $pdo->prepare($sqlquery);
            $stmt->bindValue(':stairs_name', $stairs_name);
            $stmt->bindValue(':num_steps', $num_steps);
            $stmt->bindValue(':is_indoor', $is_indoor ? 1 : 0);
            $stmt->bindValue(':building_name', $building_name ?? null);
            $stmt->bindValue(':starting_level', $starting_level);
            $stmt->bindValue(':rating', $rating);
            $stmt->bindValue(':special_feature', $special_feature ?? null);
            if ($stmt->execute()) {
                echo "Enregistrement inséré avec succès";
            } else {
                echo "Erreur d'insertion : " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function deleteStairs($id)
    {
        echo "here";
        try {
            $pdo        = Database::connect();
            $sqlquery   = "DELETE FROM stairs WHERE stairs_id = :id";
            $stmt       = $pdo->prepare($sqlquery);
            $stmt->bindValue(':id', $id);
            if ($stmt->execute()) {
                echo "Enregistrement supprimé avec succès";
            } else {
                echo "Erreur d'insertion : " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
