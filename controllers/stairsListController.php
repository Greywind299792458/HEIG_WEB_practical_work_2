<?php

$con = mysqli_connect("localhost:3306", "mariadb", "mariadb", "mariadb");
$result = mysqli_query($con, "SELECT * FROM stairs");
$data = $result->fetch_all(MYSQLI_ASSOC);

include 'views/stairsList_view.php';
