<?php

require_once 'models/accident.php';

class AccidentsFormController
{
    public function showForm()
    {
        $stairsList = Stairs::all();
        include 'views/accidents_form_view.php';
    }

    public function processForm()
    {
        $eventDate     = $_POST['eventDate'];
        $eventDescription       = $_POST['eventDescription'];
        $destroyedEgo       = $_POST['destroyedEgo'];
        $spilledDrink   = $_POST['spilledDrink'];
        $noClip  = $_POST['noClip'];
        $stairs = $_POST['stairs'];
        Accident::create([
            'event_description' =>  $eventDescription ?? "",
            'destroyed_ego' => $destroyedEgo ? 1 : 0,
            'spilled_drink' => $spilledDrink ? 1 : 0,
            'event_date' => $eventDate,
            'noclip' => $noClip ? 1 : 0,
            'stairs_id' => $stairs
        ]);
        echo "Opération effectuée avec succès!";
        include 'views/accidents_form_view.php';
    }
}
