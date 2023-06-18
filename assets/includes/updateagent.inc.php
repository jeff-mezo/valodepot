<?php


if(isset($_POST['submit'])) {
    
    $agent_id = $_POST['agent_id'];
    $agent_name = $_POST['agent_name'];
    $real_name = $_POST['real_name'];
    $description = $_POST['description'];
    $origin = $_POST['origin'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $img = $_POST['img'];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    update_agent($conn, $agent_id, $agent_name, $real_name, $description, $origin, $gender, $role, $img);
    
}