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

function create_user($conn, $username, $email, $password, $isAdmin){
    $sql = "INSERT INTO users (username, email, password, isAdmin) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 

    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashed_pwd, $isAdmin);
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
        $_SESSION["user_id"] = $cred["user_id"];
        $_SESSION["username"] = $cred["username"];
        $_SESSION["email"] = $cred["email"];
        $_SESSION['isAdmin'] = $cred['isAdmin'];
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

function get_abilities($conn){ 
    $sql = "SELECT * FROM abilities;";

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

function add_post($conn, $user_id, $username, $content){
    $sql = "INSERT INTO posts (user_id, username, content) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "sss", $user_id, $username, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../profile.php?error=none");
    exit();
}

function get_posts($conn){ 
    $sql = "SELECT * FROM posts ORDER BY date DESC;";

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

function delete_post($conn, $post_id) {
    // Prepare and execute the SQL query to delete the record
    $stmt = $conn->prepare("DELETE FROM posts WHERE post_id = ?");
    $stmt->execute([$post_id]);

    // if ($stmt->rowCount() < 1) {        
    //     header("location: ../../index.php?error=postdne");
    //     exit();
    // }
}

function update_agent($conn, $agent_id, $agent_name, $real_name, $description, $origin, $gender, $role, $img) {
    $sql = "UPDATE agents SET agent_name =?, real_name =?, description =?, origin =?, gender =?, role =?, img =? WHERE agent_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../index.php?error=sqlerror");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "sssssssi", $agent_name, $real_name, $description, $origin, $gender, $role, $img, $agent_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../agents.php?name=$agent_name");
    exit();
}

function add_agent($conn, $agentName, $realName, $description, $origin, $gender, $role, $img) {
    $stmt = $conn->prepare("INSERT INTO agents (agent_name, real_name, description, origin, gender, role, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $agentName, $realName, $description, $origin, $gender, $role, $img);
    $stmt->execute();

    header("location: ../../profile.php?error=none");
    exit();
}

function delete_agent($conn, $agent_id) {
    $stmt = $conn->prepare("DELETE FROM agents WHERE agent_id = ?");
    $stmt->bind_param("i", $agent_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("location: ../../agents.php?name=Astra");
        exit();
    } else {
        header("location: ../../index.php?error=dataerror");
        exit();
    }
}
// WEAPONS

function get_weapons($conn){ 
    $sql = "SELECT * FROM weapons;";

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

    
