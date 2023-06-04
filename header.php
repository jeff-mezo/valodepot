<?php 
    if(session_status() === PHP_SESSION_NONE){session_start();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ValoDepot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg position-absolute w-100">
        <div class="container-fluid">
             <a class="navbar-brand d-flex-center mx-md-auto" href="index.php">   
                <img src="images/logo_draft.png" alt="valodepot">
            </a>     
            <?php if(isset($_SESSION["username"])){ ?> 
                <div class="nav-links position-absolute" style="right: 10px">
                    <a class="font-p mx-1" href="profile.php"><?php echo $_SESSION["username"]; ?></a>
                    <a class="font-p mx-2" href="assets/includes/logout.inc.php">Log Out</a>
                </div>
            <?php } else {   ?>        
                <button id="open-button" class="btn btn-primary text-dark position-absolute" style="right: 10px;"><i class="fa fa-sign-in" aria-hidden="true"></i> SIGN IN</button>
            <?php } ?>
        </div>
    </nav>

    <div id="signin-card" class="signin-card bg-gray" style="display: none;">
            <div class="bg-fade"></div>
            <span class="close-button"><i class="fas fa-times" style="color: #ffffff"></i></span>
            <h4 class="color-valo">Log In</h4>
            <form action="assets/includes/login.inc.php" method="post">
                <div class="form-group">
                    <label class="font-p" for="username">Username/Email:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="font-p" for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <p class="t-muted my-2">Not Registered? <a href="#" class="sign-up-button">Create an Account</a></p>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "incorrectcred") {
                            echo("<script> $(document).ready(function(){sign_in();});</script>");
                            echo('<p class="color-valo my-2 text-center">Incorrect Credentials!<p>');
                        }
                    } 
                        
                ?>
                <button name="submit" type="submit" class="btn btn-primary mt-2">Sign In</button>
            </form>
        </div>
        

        <div id="signup-card" class="signin-card bg-gray" style="display: none;">
            <div class="bg-fade"></div>
            <span class="close-button"><i class="fas fa-times" style="color: #ffffff"></i></span>
            <h4 class="color-valo">Create an Account</h4>
            <form action="assets/includes/signup.inc.php" method="post">
                <div class="form-group">
                    <label class="font-p" for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="font-p" for="username">Email:</label>
                    <input type="email" id="username" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="font-p" for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="font-p" for="password">Re-Enter Password:</label>
                    <input type="password" id="password" name="password_rpt" class="form-control" required>
                </div>
                <p class="t-muted my-2">Existing User? <a href="#" class="sign-up-to-in">Sign In</a></p>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "pwdnotmatch") { ?>
                            <script> $(document).ready(function(){sign_up();});</script>
                            <p class="color-valo my-2 text-center">Password Does Not Match!<p>
                <?php   } elseif ($_GET["error"] == "usernametaken") { ?>
                            <script> $(document).ready(function(){sign_up();});</script>");
                            <p class="color-valo my-2 text-center">Username Already Taken!<p>
                <?php   }
                    }         
                ?>
                <button name="submit" type="submit" class="btn btn-primary mt-2">Sign In</button>
            </form>
        </div>