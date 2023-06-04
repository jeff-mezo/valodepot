<?php

function pwd_match($password, $password_rpt){
    if ($password == $password_rpt) {
        return true;
    } else {
        return false;
    }
}

function uid_exist($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function create_user($conn, $username, $email, $password){
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 

    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../index.php?error=none");
    exit();
}

function log_in($cred, $password){
    $pass_hash = $cred["password"];
    $verify = password_verify($password, $pass_hash);
    
    if($verify === false){
        header("location: ../../index.php?error=incorrectcred");
        exit();
    }
    else if($verify === true) {
        session_start();
        $_SESSION["user_id"] = $cred["users_id"];
        $_SESSION["username"] = $cred["username"];
        header("location: ../../index.php");
        exit();
    }
}

function get_agents($conn){ 
    $sql = "SELECT * FROM agents;";

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
        header("location: ../../index.php?error=sqlerror");
    }
    //$data = mysqli_fetch_assoc($result);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);  // Fetch all the rows from the query result and store them in an associative array
    mysqli_free_result($result);  // Free the memory associated with the query result
    return $data;
}