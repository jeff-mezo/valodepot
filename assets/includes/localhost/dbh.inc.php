<?php

$serverName = "localhost";
$dbUsername = "root";
$dBPassword = "";
$dBName = "valodepotdb";

$conn = mysqli_connect($serverName, $dbUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

