<?php 

if(isset($_POST['submit'])) {
    $agentName = $_POST['agent_name'];
    if(isset($_POST['agent_id'])) { 
        $agent_id = $_POST['agent_id'];
    } else {
        header("location: ../../agents.php?name=$agentName");
        exit();
    }
    $ability_name = $_POST['ability_name'];
    $type = $_POST['type'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    add_ability($conn, $agent_id, $agentName, $ability_name, $type, $icon, $description);

    header("location: ../../agents.php?name=$agentName");
    exit();
}