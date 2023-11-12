<?php

class RatingController
{
    public function showForm(int $stairsId, $id = null)
    {
        $success = isset($_GET['success']) ? $_GET['success'] : null;
        $error = isset($_GET['error']) ? $_GET['error'] : null;
        $stairs = Stairs::getStairsById($stairsId);
        try {
            if ($id != null) {
                $data = Stairs::getStairsById($id);
            }
        } catch (Exception $e) {
            header("Location: /rating/form?success=false&error=" . urlencode($e->getMessage()));
            exit();
        }
        include 'views/rating_form_view.php';
    }

    public function processForm()
    {
        /*  $id = isset($_POST['id']) ? $_POST['id'] : null;
        try {
            $this->validateData($_POST);
            Stairs::createStairs($_POST);
            $redirectUrl = "/stairs/form" . ($id ? "/$id?" : "?") . "success=true";
            header("Location: $redirectUrl");
            exit();
        } catch (Exception $e) {
            $redirectUrl = "/stairs/form" . ($id ? "/$id?" : "?") . "success=false&error=" . urlencode($e->getMessage());
            header("Location: $redirectUrl");
            exit();
        } */
    }

    private function validateData(array $formData)
    {
        /*   if (empty($formData['stairsName']) || empty($formData['numSteps']) || empty($formData['isIndoor']) || empty($formData['startingLevel'])) {
            throw new Exception('Certaines Informations sont manquantes.');
        }
        if ($formData['numSteps'] <= 1) {
            throw new Exception('Un escalier doit comporter au moins 2 marches.');
        }
        if ($formData['stairsName'] == "") {
            throw new Exception('Le nom de l\'escalier ne peut pas être vide.');
        }
        if ($formData['startingLevel'] == "") {
            throw new Exception('Le nom de l\'étage de départ ne peut pas être vide.');
        } */
    }

    public function deleteItem(int $id)
    {
        /*  try {
            Stairs::deleteStairs($id);
            $response = [
                'success' => true
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'escalier: ' . $e->getMessage()
            ];
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode($response);
            exit();
        } */
    }
}
