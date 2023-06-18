<?php 

if(isset($_POST['submit'])) {
    $agentName = $_POST['agent_name'];
    $realName = $_POST['real_name'];
    $description = $_POST['description'];
    $origin = $_POST['origin'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $img = $_POST['img'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    add_agent($conn, $agentName, $realName, $description, $origin, $gender, $role, $img);
}