<?php 
    session_start();
    if(isset($_SESSION["username"])) {
        include_once 'header.php';
        require_once 'assets/includes/getposts.php';

        if(isset($_POST['timeZoneOffset'])){
            $clientTimezoneOffset = $_POST['timeZoneOffset'];
            echo 'DATE DEBUG 01';
        } else {
            
            $clientTimezoneOffset = 948;
        }
?>
<div class="profile-container pt-5 bg-gray" style="min-height: 100vh;">
<div class=" container pt-5">
    <div class="row w-auto bg-gray">
        <div class="col-lg-3 px-2 py-4">
            <div class="card bg-dark" style="min-height: 300px;">
                <h4 class="color-valo mx-auto mt-3">Profile Info</h4>
                <img class="w-75 mx-auto my-3" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="">
                <div class="prof-info">
                    <h5 class="color-valo m-0">@<?php echo $_SESSION['username']; ?></h4>
                    <p><?php echo $_SESSION['email']; ?></p>
                </div>  
            </div>
            <?php if($_SESSION['isAdmin'] == 1) {?>
                <div class="card bg-dark mt-3 p-3" style="min-height: 100px;">
                    <h5 class="color-valo">Administrator Tools</h5>
                    <span class="d-flex"><p class="mb-1">Add Agent</p><i class="fa-solid fa-circle-plus ml-2 mt-1 icon" id="add-agent" style="color: #ff4655;"></i></span>
                    <span class="d-flex"><p class="mb-1">Add Weapons</p><i class="fa-solid fa-circle-plus ml-2 mt-1 icon" id="add-weapon" style="color: #ff4655;"></i></span>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-9 px-2 py-4">
            <div class="card bg-dark" id="post-container" style="min-height: 500px;">
                <h4 class="color-valo mx-3 mt-3">Forums</h4>
                <i class="add-button fa-solid fa-plus" id="add-button" style="color: #ff4655;"></i>
                <i class="add-button fa-solid fa-minus" id="minus-button" style="color: #ff4655; display: none;"></i>

                <!-- INSERT MESSAGE -->
                <div class="form-outline mx-4" id="post-box" style="display: none;">
                    <form action="assets/includes/postmessage.inc.php" method="post">
                        <!-- <label class="form-label" for="textAreaExample">Message</label> -->
                        <input type="hidden" id="post-id-val" name="post_id">
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter Message" required></textarea>
                        <button name="submit" id="submit-button" type="submit" class="btn btn-primary mt-2">Post</button>
                        <button name="update" id="update-button" type="submit" class="btn btn-primary mt-2" style="display: none;">Update</button>
                    </form>
                </div>


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

                            <?php if($_SESSION['user_id'] == $row['user_id']) { ?>
                            
                            <div class="btn-group" style="position: absolute; bottom: 0; right: 0;">
                                <button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; border-radius: 3px;">
                                    <i class="fa-solid fa-ellipsis-vertical" style="color: #ff4655;"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="edit-button dropdown-item" name="<?php echo $row['post_id']?>" type="button">Edit</button>
                                    <button class="delete-button dropdown-item" type="button" data-post-id="<?php echo $row['post_id']?>">Delete</button>
                                </div>
                            </div>

                            <?php } ?>

                        </div>                     
                    </div>

                    <?php } ?>
                </div>
                
            </div>
            <button class="btn btn-primary mt-2 " id="showMoreButton" onclick="loadMorePosts()">Show More</button>
        </div>
    </div>
</div>

<?php if($_SESSION['isAdmin'] == 1) {?>
    <div class="agent-editor-card" id="agent-editor-card" style="display: none;">
        <div class="bg-fade"></div>
        <span class=""><i class="agent-add-close fas fa-times" style="color: #ffffff"></i></span>
        <h4 class="color-valo">Add New Agent</h4>
        <form action="assets/includes/addagent.inc.php" method="post">
            <div class="row">
                <div class="col-8 row">
                    <div class="col-6 form-group">
                        <label class="font-p" for="agent_name">Agent Name:</label>
                        <input type="text" id="agent_name" name="agent_name" class="form-control" required>                  
                    </div>
                    <div class="col-6 form-group">
                        <label class="font-p" for="real_name">Real Name:</label>
                        <input type="text" id="real_name" name="real_name" class="form-control" required>
                    </div>
                    <div class="col-12 form-group">
                        <label class="font-p" for="description">Description:</label>
                        <textarea type="text" id="description" name="description" class="form-control" rows="4" required style="resize: vertical; max-height: 200px;"></textarea>
                    </div>
                    <div class="col-4 form-group">
                        <label class="font-p" for="origin">Origin:</label>
                        <input type="text" name="origin" class="form-control" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="font-p" for="gender">Gender:</label>
                        <input type="text" name="gender" class="form-control" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="font-p" for="role">Role:</label>
                        <input type="text" name="role" class="form-control" required>
                    </div>
                </div>
                <div class="col-4 row">
                    <div class="col-12 image-preview">
                        <img class="agent-preview-img mx-auto" alt="">
                        <span id="preview-img" style="position: absolute; right:10px; bottom:10px;"><i class="fa-solid fa-eye fa-lg" style="color: #ff4555;" style="width: 20px;"></i></span>
                    </div>
                    <div class="col-12 form-group">
                        <label class="font-p" for="img">Image URL:</label>
                        <input type="text" id="img" name="img" class="form-control" required>
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" class="btn btn-primary mt-2">Add</button>
        </form>
    </div>
<?php } ?>
</div>


<?php 
    include_once 'footer.php'; 
    } else { 
        header("location: ../../index.php"); 
        exit();
    }
?>

