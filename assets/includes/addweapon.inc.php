<?php 

if(isset($_POST['submit'])) {
    $weaponName = $_POST['weapon_name'];
    $weaponType = $_POST['weapon_type'];
    $credits = $_POST['credits'];
    $fireMode = $_POST['fire_mode'];
    $fireRate = $_POST['fire_rate'];
    $mobility = $_POST['mobility'];
    $magazine = $_POST['magazine'];
    $reload = $_POST['reload'];
    $damHead = $_POST['dam_head'];
    $damBody = $_POST['dam_body'];
    $damLeg = $_POST['dam_leg'];
    $img = $_POST['img'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    add_weapons($conn, $weaponName, $weaponType, $credits, $fireMode, $fireRate, $mobility, $magazine, $reload, $damHead, $damBody, $damLeg, $img);
}