<?php 

session_start();

if(isset($_POST["submit"])){

    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $content = $_POST["message"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    add_post($conn, $user_id, $username, $content);
} elseif (isset($_POST["update"])) {
    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $content = $_POST["message"];
    $post_id = $_POST["post_id"];
    
    if(!isset($_POST["post_id"])) {
        header("location: ../../profile.php?error=posterror");
        exit();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    delete_post($conn, $post_id);
    add_post($conn, $user_id, $username, $content);
} else {
    header("location: ../../profile.php");
    exit();
}