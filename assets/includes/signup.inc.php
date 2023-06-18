<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_rpt = $_POST["password_rpt"];
    $isAdmin = $_POST['isAdmin'];
    # $isAdmin = 1;

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (pwd_match($password, $password_rpt) === false) {
        header("location: ../../index.php?error=pwdnotmatch");
        exit();
    }

    if (uid_exist($conn, $username, $email) !== false) {
        header("location: ../../index.php?error=usernametaken");
        exit();
    }

    create_user($conn, $username, $email, $password, $isAdmin);

} else {
    header("location: ../../index.php");
    exit();
}