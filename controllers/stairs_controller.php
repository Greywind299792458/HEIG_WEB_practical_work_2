<?php

class StairsController
{
    public function showForm(int $id = null)
    {
        // display form with eventually a rating object to edit + feeedbacks
        $success = isset($_GET['success']) ? $_GET['success'] : null;
        $error   = isset($_GET['error']) ? $_GET['error'] : null;
        try {
            if ($id != null) {
                $data = Stairs::getById($id);
            }
        } catch (Exception $e) {
            header(
                "Location: /stairs/form?success=false&error=" .
                    urlencode($e->getMessage())
            );
            exit();
        }
        include 'views/stairs_form_view.php';
    }

    public function showList()
    {
        // gather the list of all stairs + feeedbacks
        $data = Stairs::getAll();
        $success = isset($_GET['success']) ? $_GET['success'] : null;
        $error = isset($_GET['error']) ? $_GET['error'] : null;
        include 'views/stairs_list_view.php';
    }

    public function processForm()
    {
        // receives the POST request payload and extract the id
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        try {
            // validates the payload content
            $this->_validateData($_POST);
            // creates or updates an item in the db
            Stairs::createItem($_POST);
            // manages redirection
            $redirectUrl = "/stairs/form" . ($id ? "/$id?" : "?") . "success=true";
            header("Location: $redirectUrl");
            exit();
        } catch (Exception $e) {
            // shows feedback to user in case of error
            $redirectUrl = "/stairs/form" . ($id ? "/$id?" : "?") .
                "success=false&error=" . urlencode($e->getMessage());
            header("Location: $redirectUrl");
            exit();
        }
    }

    private function _validateData(array $formData)
    {
        if (empty($formData['stairsName'])) {
            throw new Exception('Le nom de l\'escalier est manquant.');
        }
        if (empty($formData['numSteps'])) {
            throw new Exception('Le nombre de marches de l\'escalier est manquant.');
        }
        if (empty($formData['startingLevel'])) {
            throw new Exception('L\'étage de départ de l\'escalier est manquant.');
        }
        if ($formData['numSteps'] <= 1) {
            throw new Exception('Un escalier doit comporter au moins 2 marches.');
        }
        if ($formData['stairsName'] == "") {
            throw new Exception('Le nom de l\'escalier ne peut pas être vide.');
        }
        if ($formData['startingLevel'] == "") {
            throw new Exception(
                'Le nom de l\'étage de départ ne peut pas être vide.'
            );
        }
    }

    public function deleteItem(int $id)
    {
        // deletes the item matching this id in the db
        try {
            Stairs::deleteById($id);
            $response = [
                'success' => true
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } catch (Exception $e) {
            // shows feedback in case of error
            $response = [
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'escalier: ' .
                    $e->getMessage()
            ];
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode($response);
            exit();
        }
    }
}
