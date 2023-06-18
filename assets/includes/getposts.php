<?php 

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

// $post_data = get_posts($conn);

$posts = get_posts($conn); // Retrieve posts from the data source
$post_data = array_slice($posts, 0, 7); // Limit the initial number of posts

// Pass $postsToShow to your HTML template for rendering
