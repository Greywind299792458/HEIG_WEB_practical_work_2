<?php
require_once 'controllers/home_controller.php';
require_once 'controllers/stairs_form_controller.php';
require_once 'controllers/stairs_list_controller.php';
require_once 'controllers/statistics_controller.php';
require_once 'controllers/accidents_form_controller.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        switch ($_SERVER['REQUEST_URI']) {
            case '/stairs/form':
                $controller = new StairsFormController();
                $controller->processForm();
                break;
            case '/accidents/form':
                $controller = new AccidentsFormController();
                $controller->processForm();
                break;
        }
        break;
    case 'GET':
        switch ($_SERVER['REQUEST_URI']) {
            case '/':
                $controller = new HomeController();
                $controller->index();
                break;
            case '/stairs/form':
                $controller = new StairsFormController();
                $controller->showForm();
                break;
            case '/accidents/form':
                $controller = new AccidentsFormController();
                $controller->showForm();
                break;
            case '/stairs/list':
                $controller = new StairsListController();
                $controller->showList();
                break;
            case '/statistics':
                $controller = new StatisticsController();
                $controller->showStatistics();
                break;
            default:
                // Routes inconnues
                echo "Page non trouvée";
        }
        break;
}
