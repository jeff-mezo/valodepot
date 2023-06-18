<?php


if(isset($_POST['submit'])) {
    
    $weapon_id = $_POST['weapon_id'];
    $weapon_name = $_POST['weapon_name']; 
    $weapon_type = $_POST['weapon_type'];
    $credits = $_POST['credits'];
    $fire_mode = $_POST['fire_mode'];
    $fire_rate = $_POST['fire_rate'];
    $mobility = $_POST['mobility'];
    $magazine = $_POST['magazine'];
    $reload = $_POST['reload'];
    $dam_head = $_POST['dam_head'];
    $dam_body = $_POST['dam_body'];
    $dam_leg = $_POST['dam_leg'];
    $img = $_POST['img'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    update_weapons($conn, $weapon_id, $weapon_name, $weapon_type, $credits, $fire_mode, $fire_rate, $mobility, $magazine, $reload, $dam_head, $dam_body, $dam_leg, $img);
    
}