<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'form-stairs':
            include 'controllers/stairsFormController.php';
            break;
        case 'list-stairs':
            include 'controllers/stairsListController.php';
            break;
        case 'statistics':
            include 'controllers/statisticsController.php';
            break;
        default:
            include 'controllers/homeController.php';
    }
} else {
    include 'controllers/homeController.php';
}
?>