<?php 
    include_once 'header.php';
    require_once 'assets/includes/getagents.php';
    $i = 0;
    if(isset($_SESSION['isAdmin'])) {
        $session_admin = $_SESSION['isAdmin'];
    } else {
        $session_admin = 0;
    }
?>

<div class="profile-container pt-5 bg-gray" style="min-height: 100vh !important;">
    <div class=" container-fluid pt-5">
        <div class="row w-auto">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" id="agent-carousel" style="min-height: 80vh !important;">
                <div class="carousel-indicators">
                    <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button> -->
                    <?php foreach ($agent_data as $row) { ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" <?php if($i == 0){ ?> class="active" aria-current="true" <?php } ?>aria-label="Slide <?php echo $i+1;?>"></button>
                    <?php $i++; } ?>
                </div>
                <div class="carousel-inner d-lg-flex justify-content-center h-100" style="overflow-y: unset;">

                <?php foreach ($agent_data as $row) { ?>
                    <div class="carousel-item container <?php if($row["agent_name"] == $_GET['name']) {?> active <?php } ?> mx-auto">
                        <div class="row">
                            <div class="col-lg-3" >
                                <img src="<?php echo $row["img"];?>" class="image-fluid position-relative" alt="..." style="height: 70vh !important;">
                            </div>
                            <div class="col-lg-9" >
                                <h1 class="color-valo"><?php echo $row["agent_name"]; ?></h1>
                                <p> <?php echo $row["description"];?> </p>
                                <div class="agent-container bg-dark-opac p-3 row" style="max-height: 300px;">

                                    <?php if($session_admin == 1) {?>
                                        <span class="edit-agent" data-agent-id="<?php echo $row["agent_id"]; ?>"><i class="fa-solid fa-pencil" style="width: 20px;color: #ff4655; position: absolute; top: 15px; right: 15px;"></i></span>
                                        <span class="delete-agent" data-agent-id="<?php echo $row["agent_id"]; ?>"><i class="fa-solid fa-trash-can" style="width: 20px; color: #ff4655; position: absolute; top: 15px; right: 42px;"></i></span>
                                    <?php } ?>

                                
                                    <dl class="agent-desc col-4 my-3">
                                        <dt>Real Name: </dt>
                                        <dd><?php echo $row["real_name"];?></dd>
                                        <dt>Origin: </dt>
                                        <dd><?php echo $row["origin"];?></dd>
                                        <dt>Gender: </dt>
                                        <dd><?php echo $row["gender"];?></dd>
                                        <dt>Role: </dt>
                                        <dd><?php echo $row["role"];?></dd>
                                    </dl>
                                    
                                        <div class="agent-desc-abilities col-8 my-3">
                                            <p class="color-valo mb-0">Abilities</p>
                                            <p class="t-muted mt-0 mb-3">Click on the abilities to show description</p>
                                            
                                                <div class="d-flex flex-wrap">
                                                    <?php foreach ($abilities_data as $ability){ 
                                                    if($row['agent_id'] == $ability['agent_id']) {   
                                                    ?> 
                                                    <div class="ability-wrap">
                                                            <div class="skill-card d-flex flex-column align-items-center cursor-pointer" style="margin-right: 1rem;">
                                                                <img src="<?php echo $ability['icon']; ?> " alt="" style="max-width: 60px;">
                                                                <p class="m-0"><?php echo ucwords(strtolower($ability['ability_name'])); ?></p>
                                                                <p class="m-0" style="font-size: 12px; margin-top: -3px !important;"><?php echo $ability['type']; ?></p>
                                                            </div>
                                                            
                                                            <div class="ability-tooltip">
                                                                <p class="ability-tooltip-content"><?php echo $ability['description']; ?></p>
                                                            </div>
                                                        </div>
                                                    <?php } } ?>
                                                </div>
                                            
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($session_admin == 1) {?>
                        <div class="agent-delete-card" id="agent-delete-<?php echo $row["agent_id"];?>" style="display: none;">
                            <div class="bg-fade"></div>
                            <span class="agent-delete-close delete-card-close" data-agent-id="<?php echo $row["agent_id"];?>"><i class="fas fa-times" style="color: #ffffff"></i></span>
                            <h5 class="color-valo">Delete Agent</h5>
                            <p>Are you sure you want to delete <?php echo $row["agent_name"]; ?>?</p>

                            <form action="assets/includes/deleteagent.inc.php" method="post">
                                <input type="hidden" name="agent_id" value="<?php echo $row["agent_id"];?>">
                                <button class="btn btn-primary mt-2 delete-card-close" type="button" name="deny" style="width: 60px;" data-agent-id="<?php echo $row["agent_id"];?>">No</button>
                                <button class="btn btn-primary mt-2" type="submit" name="confirm" >Confirm</button>
                            </form>
                        </div>

                        <div class="agent-editor-card" id="agent-<?php echo $row["agent_id"];?>" style="display: none;">
                            <div class="bg-fade"></div>
                            <span class="agent-edit-close" data-agent-id="<?php echo $row["agent_id"];?>"><i class="fas fa-times" style="color: #ffffff"></i></span>
                            <h4 class="color-valo">Edit Agent</h4>
                            <form action="assets/includes/updateagent.inc.php" method="post">
                                <div class="row">
                                    <div class="col-8 row">
                                        <div class="col-6 form-group">
                                            <label class="font-p" for="agent_name">Agent Name:</label>
                                            <input type="text" id="agent_name_<?php echo $row["agent_id"];?>" name="agent_name" class="form-control" value="<?php echo $row["agent_name"];?>" required>                  
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="font-p" for="real_name">Real Name:</label>
                                            <input type="text" id="real_name_<?php echo $row["agent_id"];?>" name="real_name" class="form-control"  value="<?php echo $row["real_name"];?>" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label class="font-p" for="description">Description:</label>
                                            <textarea type="text" id="description_<?php echo $row["agent_id"];?>" name="description" class="form-control" rows="4" required style="resize: vertical; max-height: 200px;"><?php echo $row["description"];?></textarea>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="origin">Origin:</label>
                                            <input type="text" id="origin_<?php echo $row["agent_id"];?>" name="origin" class="form-control" value="<?php echo $row["origin"];?>" required>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="gender">Gender:</label>
                                            <input type="text" id="gender_<?php echo $row["agent_id"];?>" name="gender" class="form-control" value="<?php echo $row["gender"];?>" required>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="role">Role:</label>
                                            <input type="text" id="role_<?php echo $row["agent_id"];?>" name="role" class="form-control" value="<?php echo $row["role"];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4 row">
                                        <div class="col-12 image-preview">
                                            <img class="agent-preview-img mx-auto" src="<?php echo $row["img"];?>" alt="">
                                            <span id="preview-img" style="position: absolute; right:10px; bottom:10px;"><i class="fa-solid fa-eye fa-lg" style="color: #ff4555;" style="width: 20px;"></i></span>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label class="font-p" for="img">Image URL:</label>
                                            <input type="text" id="img_<?php echo $row["agent_id"];?>" name="img" class="form-control" value="<?php echo $row["img"];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="agent_id" value="<?php echo $row["agent_id"];?>">
                                <button name="submit" type="submit" class="btn btn-primary mt-2">Save</button>
                            </form>
                        </div>
                    
                    <?php } } ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="width: 10%;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="width: 10%;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>
    </div> 
    
    <!-- AGENT EDITOR -->
       


</div>

<?php 
    include_once 'footer.php'; 
?>