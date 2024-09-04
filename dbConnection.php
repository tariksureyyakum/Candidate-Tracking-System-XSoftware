<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'xsoftware';
$con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}
?>