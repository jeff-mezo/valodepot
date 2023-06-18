    <?php 
        include_once 'header.php';
        require_once 'assets/includes/getagents.php';
        require_once 'assets/includes/getweapons.inc.php';
        require_once 'assets/includes/getpostsindex.php';

        if(isset($_POST['timeZoneOffset'])){
            $clientTimezoneOffset = $_POST['timeZoneOffset'];
            echo 'DATE DEBUG 01';
        } else {
            
            $clientTimezoneOffset = 948;
        }

        if(isset($_SESSION['user_id'])){
            $session_id = isset($_SESSION['user_id']);
        } else {
            $session_id = -1;
        }
    ?>

    <div class="container-fluid p-0">

        <div class="section-1">
            <h4 class="text-white my-4">LET'S GET STARTED!</h1>
            <h1 class="text-white">VALORANT GUIDES</h1>
            <img class="image-fluid valo-logo my-5" src="./images/logo_valo.png" alt="Valorant Logo">
            <a href="#section"><i class="fas fa-solid fa-chevron-down fa-beat-fade fa-2xl mt-5" style="color: #ffffff;"></i></a>
        </div>

        <div id="section" class="m-0 p-2 bg-dark">
            <p class="text-white m-0 text-center">VALORANT LIBRARY</p>
        </div>

        <div class="row w-auto bg-gray">
            <div class="col-lg-6 px-5 py-4">
                <h2 class="color-valo sub-size">AGENTS</h2>
                <div class="agent-container bg-dark pt-3 mx-auto" style="overflow-y: scroll;">

                        <?php
                            foreach ($agent_data as $row) {
                        ?>
                        <div class="agent">
                            <a href="agents.php?name=<?php echo $row["agent_name"]; ?>" class="agent-link"><img class="agent-img mx-auto" src="<?php echo $row["img"];?>"  alt="<?php echo $row["agent_name"]; ?>"><p class="text-center w-100"><?php echo $row["agent_name"]; ?></p></a>
                        </div>
                        <?php 
                            }
                     ?>   
                                
               
                    
                </div>
            </div>

            <div class="col-lg-6 px-5 py-4">
                <h2 class="color-valo sub-size">WEAPONS</h2>
                <div class="agent-container bg-dark pt-3 mx-auto" style="overflow-y: scroll;">
                    <!-- <div class="row card-body"> -->
                        <?php
                            foreach ($weapon_data as $row) {
                        ?>
                        <div class="weapon-index mx-3 my-3">
                            <a href="weapons.php?name=<?php echo $row["weapon_name"]; ?>" class="agent-link"><img class="img-fluid" src="<?php echo $row["img"]; ?>" alt="Weapon"><p class="text-center w-100"><?php echo $row["weapon_name"]; ?></p></a>
                        </div>
                        <?php } ?>
                    <!-- </div> -->
                </div>
            </div>

            <div class="col-lg-12 px-5 py-4">
                <h2 class="color-valo sub-size">FORUMS</h2>
                    <div class="card bg-dark" style="border-radius: 25px!important;">
                        
                            <div id="post-container">
                                        
                                <?php 
                                    
                                    foreach ($post_data as $row) {            
                                        //$desiredTimeZone = new DateTimeZone('Asia/Manila');
                                        // Create a DateTime object using the timestamp value
                                        $timestamp = new DateTime($row['date']);
                                        // Convert the timestamp to the desired time zone
                                        //$timestamp->setTimezone($desiredTimeZone);
                                        $timestamp->modify($clientTimezoneOffset . ' minutes');
                                        // Format the timestamp as per your requirement (e.g., using 'Y-m-d H:i:s' format)
                                        $formattedTimestamp = $timestamp->format('Y-m-d H:i:s');
                                    
                                ?>

                                <div class="forum">
                                    <div class="prof" style="position: relative;">
                                        <img class="img-fluid prof-pic" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="Astra">
                                        <div class="prof-info">
                                            <h4 class="color-valo m-0">@<?php echo $row['username']; ?></h4>
                                            <p>
                                                <?php echo $formattedTimestamp; ?>
                                            </p>
                                        </div>
                                        <p class="content" id="<?php echo $row['post_id'];?>"><?php echo $row['content']; ?></p>

                                    </div>                     
                                </div>

                    <?php } ?>
                            
                                
                            </div>
                            <?php if($session_id >= 0) { ?>  
                                <button class="btn btn-primary mt-2 mb-4 mx-auto" id="showMoreButton" onclick="loadMorePosts()" style="width: 150px;">Show More</button>
                            <?php }  else { ?>
                                <button class="open-button btn btn-primary my-2 mx-auto" style="width: 150px;">Show More</button>
                            <?php } ?>                                      
                                             
                    </div>
            </div>
        </div>
    </div>
    
<?php 
    include_once 'footer.php'; 
?>

    