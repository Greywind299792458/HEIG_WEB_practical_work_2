<?php

use Illuminate\Http\Response;

class StairsFormController
{
    public function showForm()
    {
        include 'views/stairs_form_view.php';
    }

    public function processForm()
    {
        $stairs_name     = $_POST['stairsName'];
        $num_steps       = $_POST['numSteps'];
        $is_indoor       = $_POST['isIndoor'];
        $building_name   = $_POST['buildingName'];
        $starting_level  = $_POST['startingLevel'];
        $special_feature = $_POST['specialFeature'];
        Stairs::create([
            'stairs_name' =>  $stairs_name,
            'num_steps' => $num_steps,
            'is_indoor' => $is_indoor ? 1 : 0,
            'building_name' => $building_name ?? null,
            'starting_level' => $starting_level,
            'special_feature' => $special_feature ?? null
        ]);
        echo "Opération effectuée avec succès!";
        include 'views/stairs_form_view.php';
    }
}
