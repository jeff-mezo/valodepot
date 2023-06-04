<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if ($agent_data = get_agents($conn)){
    $agent_name = $agent_data["agent_name"];
    $real_name = $agent_data["real_name"];
    $description = $agent_data["description"];
    $origin = $agent_data["origin"];
    $gender = $agent_data["gender"];
    $role = $agent_data["role"];
    $img = $agent_data["img"];
}