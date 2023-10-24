<?php
class StairsController {
    public function displayForm() {
        // Affiche le formulaire initial
        include 'views/stairsForm_view.php';
    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stairsName = $_POST["stairsName"];
            $numSteps = $_POST["numSteps"];


            echo $stairsName;
            echo$numSteps;
            // Validez les données, effectuez des opérations nécessaires
            // Redirigez ou affichez la vue appropriée en fonction des résultats
        }
    }
}
?>