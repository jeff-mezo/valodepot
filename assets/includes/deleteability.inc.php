<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['ability_name'])) {
    $ability_name = $_POST['ability_name'];
    $agent_name = $_POST['agent_name'];

    delete_ability($conn, $ability_name, $agent_name);
} else {
    header("location: ../../index.php?error=postiddne");
    exit();
}

// echo $ability_name;
