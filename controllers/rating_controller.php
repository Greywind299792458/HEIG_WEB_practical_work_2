<?php

class RatingController
{
    public function showForm(int $stairsId, $ratingId = null)
    {
        // display form with eventually a rating object to edit + feeedbacks
        $success = isset($_GET['success']) ? $_GET['success'] : null;
        $error = isset($_GET['error']) ? $_GET['error'] : null;
        $stairs = Stairs::getById($stairsId);
        try {
            if ($ratingId != null) {
                $data = Rating::getById($ratingId);
            }
        } catch (Exception $e) {
            header(
                "Location: /rating/form?success=false&error=" .
                    urlencode($e->getMessage())
            );
            exit();
        }
        include 'views/rating_form_view.php';
    }

    public function processForm()
    {
        // receives the POST request payload and extract some id's
        $ratingId = isset($_POST['ratingId']) ? $_POST['ratingId'] : null;
        $stairsId = $_POST['stairsId'];
        try {
            // validates the payload content
            $this->_validateData($_POST);
            // creates or updates an item in the db
            Rating::createItem($_POST);
            // manages redirection
            $redirectUrl = "/stairs/list?success=true";
            header("Location: $redirectUrl");
            exit();
        } catch (Exception $e) {
            // shows feedback to user in case of error
            $redirectUrl = "/rating/form/$stairsId" . ($ratingId ? "/$ratingId?" : "?") .
                "success=false&error=" . urlencode($e->getMessage());
            header("Location: $redirectUrl");
            exit();
        }
    }

    private function _validateData(array $formData)
    {
        if (empty($formData['stairsId']) || empty($formData['rating'])) {
            throw new Exception('Certaines Informations sont manquantes.');
        }
        if ($formData['rating'] > 5 || $formData['rating'] < 1) {
            throw new Exception('La valeur de la note est invalide (1 < x < 5).');
        }
    }

    public function deleteItem(int $id)
    {
        // deletes the item matching this id in the db
        try {
            Rating::deleteItem($id);
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
                'message' => 'Erreur lors de la suppression de l\'avis: ' . 
                    $e->getMessage()
            ];
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode($response);
            exit();
        }
    }
}
