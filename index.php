<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/StairsFormController.php';
require_once 'controllers/StairsListController.php';
require_once 'controllers/StatisticsController.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if ($_SERVER['REQUEST_URI'] == '/process-form') {
            $controller = new StairsFormController();
            $controller->processForm();
        }
        break;
    case 'GET':
        if ($_SERVER['REQUEST_URI'] == '/') {
            $controller = new HomeController();
            $controller->index();
        } elseif ($_SERVER['REQUEST_URI'] == '/form') {
            $controller = new HomeController();
            $controller->redirectToForm();
        } elseif ($_SERVER['REQUEST_URI'] == '/stairs-form') {
            $controller = new StairsFormController();
            $controller->showForm();
        } elseif ($_SERVER['REQUEST_URI'] == '/process-form') {
            $controller = new StairsFormController();
            $controller->processForm();
        } elseif ($_SERVER['REQUEST_URI'] == '/stairs-list') {
            $controller = new StairsListController();
            $controller->showList();
        } elseif ($_SERVER['REQUEST_URI'] == '/statistics') {
            $controller = new StatisticsController();
            $controller->showStatistics();
        } else {
            // Gérer les routes inconnues
            echo "Page non trouvée";
        }
        break;
    case 'DELETE':
        $controller = new StairsFormController();
        $controller->deleteStairs($_GET['id']);
}
