<?php
require_once 'controllers/home_controller.php';
require_once 'controllers/Stairs_controller.php';
require_once 'controllers/statistics_controller.php';
require_once 'controllers/rating_controller.php';

list($controller, $action, $id, $additionalId) = array_merge(
    Router::handleRequest(
        $_SERVER['REQUEST_METHOD'],
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    ),
    [null, null]
);

if ($action == '') {
    echo "Method not allowed";
} elseif ($action == 'notFound') {
    // this route does not exist
    include 'views/404_view.php';
} else {
    // here we call the controller's method
    if ($id != null) {
        if ($additionalId != null) {
            $controller->$action($id, $additionalId);
        } else {
            $controller->$action($id);
        }
    } else {

        $controller->$action();
    }
}

class Router
{
    public static function handleRequest($method, $uri)
    {
        // here we decide which controller will handle the request and which method
        // to call within the controller based on the method and the url content
        switch ($method) {
            case 'POST':
                // Post request from the form (rating form or stairs form)
                switch ($uri) {
                    case '/stairs/form':
                        return [new StairsController(), 'processForm'];
                    case '/rating/form':
                        return [new RatingController(), 'processForm'];
                    default:
                        return [null, 'notFound'];
                }
                break;
            case 'GET':
                if (preg_match(
                        '/\/stairs\/form\/(\d+)(?:\?.*)?/',
                        $uri,
                        $matches
                    )
                ) {
                    return [new StairsController(), 'showForm', $matches[1]];
                }
                if (preg_match(
                        '/\/rating\/form\/(\d+)\/(\d+)?(?:\?.*)?/',
                        $uri,
                        $matches
                    )
                ) {
                    $escalierId = $matches[1];
                    $ratingId = isset($matches[2]) ? $matches[2] : null;
                    return [
                        new RatingController(),
                        'showForm',
                        $escalierId, $ratingId
                    ];
                }
                if (preg_match('/\/rating\/form\/(\d+)(?:\?.*)?/', $uri, $matches)) {
                    $escalierId = $matches[1];
                    return [
                        new RatingController(),
                        'showForm',
                        $escalierId
                    ];
                }
                switch ($uri) {
                    case '/':
                        return [new HomeController(), 'index'];
                    case '/stairs/form':
                        return [new StairsController(), 'showForm'];
                    case '/stairs/list':
                        return [new StairsController(), 'showList'];
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
                            return [
                                new StairsController(),
                                'deleteItem',
                                $urlSegments[2]
                            ];
                        } else {
                            return [null, ''];
                        }
                    case 'rating':
                        if (isset($urlSegments[2])) {
                            return [
                                new RatingController(),
                                'deleteItem',
                                $urlSegments[2]
                            ];
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
