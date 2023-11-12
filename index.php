<?php
require_once 'controllers/home_controller.php';
require_once 'controllers/Stairs_controller.php';
require_once 'controllers/statistics_controller.php';
require_once 'controllers/accidents_controller.php';

list($controller, $action, $id) = array_merge(Router::handleRequest(
    $_SERVER['REQUEST_METHOD'],
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
), [null]);

if ($action == '') {
    echo "Method not allowed";
} elseif ($action == 'notFound') {
    include 'views/404_view.php';
} else {
    if ($id != null) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
}


class Router
{
    public static function handleRequest($method, $uri)
    {
        switch ($method) {
            case 'POST':
                switch ($uri) {
                    case '/stairs/form':
                        return [new StairsController(), 'processForm'];
                    case '/accidents/form':
                        return [new AccidentsController(), 'processForm'];
                    default:
                        return [null, 'notFound'];
                }
                break;
            case 'GET':
                if (preg_match('/\/stairs\/form\/(\d+)/', $uri, $matches)) {
                    return [new StairsController(), 'showForm', $matches[1]];
                }
                switch ($uri) {
                    case '/':
                        return [new HomeController(), 'index'];
                    case '/stairs/form':
                        return [new StairsController(), 'showForm'];
                    case '/stairs/list':
                        return [new StairsController(), 'showList'];
                    case '/accidents/form':
                        return [new AccidentsController(), 'showForm'];
                    case '/statistics':
                        return [new StatisticsController(), 'showStatistics'];
                    default:
                        return [null, 'notFound'];
                }
                break;
            case 'DELETE':
                $urlSegments = explode('/', $uri);
                switch ($urlSegments[1]) {
                    case 'stairs':
                        if (isset($urlSegments[2])) {
                            return [new StairsController(), 'deleteItem', $urlSegments[2]];
                        } else {
                            return [null, ''];
                        }
                    default:
                        return [null, ''];
                }
        }
        return [null, 'notFound'];
    }
}
