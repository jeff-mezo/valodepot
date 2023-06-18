<?php 

session_start();

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

// $post_data = get_posts($conn);

$posts = get_posts($conn); // Retrieve posts from the data source
$shownPostsCount = $_POST['shownPostsCount']; // Get the shown posts count from AJAX request
$nextPosts = array_slice($posts, $shownPostsCount, 7); // Retrieve the next set of posts

// Generate HTML for the next set of posts
$html = '';
foreach ($nextPosts as $row) {
    $html .= "<div class='forum'>";
    $html .=    "<div class='prof' style='position: relative;'>";
    $html .=        "<img class='img-fluid prof-pic' src='https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg' alt='Astra'>";
    $html .=        "<div class='prof-info'>";
    $html .=            "<h4 class='color-valo m-0'>@" . $row['username'] . "</h4>";
    $html .=            "<p>" . $row['date'] . "</p>";
    $html .=        "</div>";
    $html .=        "<p class='content' id='" . $row['post_id'] . "'>" . $row['content'] . "</p>";
    
        if($_SESSION['user_id'] == $row['user_id']) {
                        
            $html .=        "<div class='btn-group' style='position: absolute; bottom: 0; right: 0;'>";
            $html .=            "<button type='button' class='btn btn-secondary' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background: none; border: none; border-radius: 3px;'>";
            $html .=                "<i class='fa-solid fa-ellipsis-vertical' style='color: #ff4655;'></i>";
            $html .=            "</button>";
            $html .=            "<div class='dropdown-menu dropdown-menu-right'>";
            $html .=                "<button class='edit-button dropdown-item' name='" . $row['post_id'] . "' type='button'>Edit</button>";
            $html .=                "<button class='delete-button dropdown-item' type='button' data-post-id='" . $row['post_id'] . "'>Delete</button>";
            $html .=             "</div>";
            $html .=        "</div>";

        }

    $html .=    "</div> ";
    $html .= "</div>";

} 


echo $html; // Return the HTML response 

?>


