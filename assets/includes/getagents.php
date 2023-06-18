<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$agent_data = get_agents($conn);
$abilities_data = get_abilities($conn);