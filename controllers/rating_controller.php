<?php

class RatingController
{
    public function showForm(int $stairsId, $id = null)
    {
        $success = isset($_GET['success']) ? $_GET['success'] : null;
        $error = isset($_GET['error']) ? $_GET['error'] : null;
        $stairs = Stairs::getById($stairsId);
        try {
            if ($id != null) {
                $data = Rating::getById($id);
            }
        } catch (Exception $e) {
            header("Location: /rating/form?success=false&error=" . urlencode($e->getMessage()));
            exit();
        }
        include 'views/rating_form_view.php';
    }

    public function processForm()
    {
        $ratingId = isset($_POST['ratingId']) ? $_POST['ratingId'] : null;
        $stairsId = $_POST['stairsId'];
        try {
            $this->validateData($_POST);
            Rating::createItem($_POST);
            $redirectUrl = "/stairs/list?success=true";
            header("Location: $redirectUrl");
            exit();
        } catch (Exception $e) {
            $redirectUrl = "/rating/form/$stairsId" . ($ratingId ? "/$ratingId?" : "?") . "success=false&error=" . urlencode($e->getMessage());
            echo $redirectUrl;
            header("Location: $redirectUrl");
            exit();
        }
    }

    private function validateData(array $formData)
    {
        if (empty($formData['stairsId']) || empty($formData['rating'])) {
            throw new Exception('Certaines Informations sont manquantes.');
        }
    }

    public function deleteItem(int $id)
    {
        try {
            Rating::deleteItem($id);
            $response = [
                'success' => true
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'avis: ' . $e->getMessage()
            ];
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode($response);
            exit();
        }
    }
}
