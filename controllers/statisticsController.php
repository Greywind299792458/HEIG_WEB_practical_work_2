<?php
function odd($var)
{
    return $var['num_steps'] & 1;
}

function even($var)
{
    return !($var['num_steps'] & 1);
}

$con = mysqli_connect("localhost:3306", "mariadb", "mariadb", "mariadb");
$result = mysqli_query($con, "SELECT * FROM stairs");
$data = $result->fetch_all(MYSQLI_ASSOC);

$oddOnes = count(array_filter($data, "odd"));
$evenOnes = count(array_filter($data, "even"));

// Incluez le fichier de vue correspondant
include 'views/statistics_view.php';
