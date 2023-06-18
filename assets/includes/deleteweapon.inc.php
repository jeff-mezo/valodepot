<?php 

if(isset($_POST['confirm'])) {
    
    $weapon_id = $_POST['weapon_id'];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    delete_weapons($conn, $weapon_id);
    
}