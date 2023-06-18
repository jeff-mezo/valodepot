<?php 


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$posts = get_posts($conn); // Retrieve posts from the data source

// $post_data = get_posts($conn);
if(isset($_SESSION['user_id'])){
    $post_data = array_slice($posts, 0, 7); // Limit the initial number of posts
} else {
    $post_data = array_slice($posts, 0, 3); // Limit the initial number of posts
}



// Pass $postsToShow to your HTML template for rendering
