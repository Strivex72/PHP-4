<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPsk = '';
$dbName = "portfolio";

try {
$connection = mysqli_connect($dbHost, $dbUser, $dbPsk, $dbName);
} catch(\Exception $e){
    echo "Something went wrong!";
    exit();
}