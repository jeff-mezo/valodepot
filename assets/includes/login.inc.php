<?php

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        $cred = uid_exist($conn, $username, $username);

        if($cred === false) {
            header("location: ../../index.php?error=incorrectcred");
            exit();
        }

        log_in($cred, $password);
        exit();
        
    } else {
        header("location: ../../index.php");
        exit();
    }