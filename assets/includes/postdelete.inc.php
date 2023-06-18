<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    delete_post($conn, $post_id);
} else {
    header("location: ../../profile.php?error=postiddne");
    exit();
}