<?php

$serverName = "sql12.freesqldatabase.com";
$dbUsername = "sql12623402";
$dBPassword = "7tJncHr8hJ";
$dBName = "sql12623402";

$conn = mysqli_connect($serverName, $dbUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

