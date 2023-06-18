<?php 

if(isset($_POST['confirm'])) {
    
    $agent_id = $_POST['agent_id'];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    delete_agent($conn, $agent_id);
    
}