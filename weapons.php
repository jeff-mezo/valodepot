<?php 
    include_once 'header.php';
    require_once 'assets/includes/getweapons.inc.php';
    if(isset($_SESSION['isAdmin'])) {
        $session_admin = $_SESSION['isAdmin'];
    } else {
        $session_admin = 0;
    }
    $i = 0;
?>

<div class="profile-container pt-5 bg-gray" style="min-height: 100vh !important;">
    <div class=" container-fluid pt-5">
        <div class="row w-auto">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" style="min-height: 80vh !important;">
                <div class="carousel-indicators">
                    <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button> -->
                    <?php foreach ($weapon_data as $row) { ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" <?php if($i == 0){ ?> class="active" aria-current="true" <?php } ?>aria-label="Slide <?php echo $i+1;?>"></button>
                    <?php $i++; } ?>
                </div>
                <div class="carousel-inner d-lg-flex justify-content-center h-100">


                <?php foreach ($weapon_data as $row) { ?>
                    <div class="carousel-item container <?php if($row["weapon_name"] == $_GET['name']) {?> active <?php } ?>mx-auto">
                        <div class="row">
                            <div class="col-lg-9 mx-auto">
                                <h1 class="color-valo"><?php echo $row["weapon_name"]; ?></h1>
                                <div class="weapon col-lg-3 my-4 mx-auto">
                                    <img src="<?php echo $row["img"];?>" class="weapon-img img-fluid position-relative" alt="...">
                                </div>

                                <div class="agent-container bg-dark p-3 row" style="max-height: 320px; overflow-y: hidden !important;">
                                    <?php if($session_admin == 1) {?>
                                        <span class="edit-agent" data-agent-id="<?php echo $row["weapon_name"]; ?>"><i class="fa-solid fa-pencil" style="width: 20px;color: #ff4655; position: absolute; top: 15px; right: 15px;"></i></span>
                                        <span class="delete-agent" data-agent-id="<?php echo $row["weapon_name"]; ?>"><i class="fa-solid fa-trash-can" style="width: 20px; color: #ff4655; position: absolute; top: 15px; right: 42px;"></i></span>
                                    <?php } ?>

                                    <dl class="agent-desc col-4 my-3">
                                        <dt>Weapon Type: </dt>
                                        <dd><?php echo $row["weapon_type"];?></dd>
                                        <dt>Credits: </dt>
                                        <dd><?php echo $row["credits"];?></dd>
                                        <dt>Fire Mode: </dt>
                                        <dd><?php echo $row["fire_mode"];?></dd>
                                        <dt>Fire Rate: </dt>
                                        <dd><?php echo $row["fire_rate"];?></dd>
                                        <dt>Mobility: </dt>
                                        <dd><?php echo $row["mobility"];?></dd>
                                    </dl>
                                    
                                    <div class="agent-desc col-8 my-3">
                                        <p class="color-valo">Damage To Enemy</p>
                                        <div class="d-flex flex-wrap">

                                        <div class="skill-card d-flex flex-column align-items-center" style="margin-left: 4rem;">
                                        <img src="https://cdn2.iconfinder.com/data/icons/rpg-fantasy-game-skill-ui/512/game_skill_ui_gun_bullet_shot-256.png" alt="" style="max-width: 60px; filter: brightness(0) invert(1);";>
                                            <p class="m-0">Reload</p>
                                            <p class="m-0" style="font-size: 12px; margin-top: -3px !important;"><?php echo $row["reload"];?></p>
                                        </div>

                                        <div class="skill-card d-flex flex-column align-items-center" style="margin-left: 4rem;">
                                        <img src="https://cdn4.iconfinder.com/data/icons/warzone-battle-royale/48/headshot-head-skeleton-512.png" alt="" style="max-width: 60px; filter: brightness(0) invert(1)">
                                            <p class="m-0">Head</p>
                                            <p class="m-0" style="font-size: 12px; margin-top: -3px !important;"><?php echo $row["dam_head"];?></p>
                                        </div>

                                        <div class="skill-card d-flex flex-column align-items-center" style="margin-left: 4rem;">
                                            <img src="https://cdn2.iconfinder.com/data/icons/rpg-fantasy-game-basic-ui/512/equipment_costume_armor_body_warrior_metal_knight_protection-256.png" alt="" style="max-width: 60px; filter: brightness(0) invert(1)">
                                            <p class="m-0">Body</p>
                                            <p class="m-0" style="font-size: 12px; margin-top: -3px !important;"><?php echo $row["dam_body"];?></p>
                                        </div>

                                        <div class="skill-card d-flex flex-column align-items-center" style="margin-left: 4rem;">
                                        <img src="https://cdn2.iconfinder.com/data/icons/rpg-fantasy-game-basic-ui/512/equipment_costume_armor_boot_foot_metal_knight_warrior_protection_leg_2-256.png" alt="" style="max-width: 60px; filter: brightness(0) invert(1)">
                                            <p class="m-0">Leg</p>
                                            <p class="m-0" style="font-size: 12px; margin-top: -3px !important;"><?php echo $row["dam_leg"];?></p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- EDIT AND DELETE -->
                    <?php if($session_admin == 1) {?>

                        <!-- DELETE -->
                        <div class="weapon-delete-card" id="agent-delete-<?php echo $row["weapon_name"];?>" style="display: none;">
                            <div class="bg-fade"></div>
                            <span class="agent-delete-close delete-card-close" data-agent-id="<?php echo $row["weapon_name"];?>"><i class="fas fa-times" style="color: #ffffff"></i></span>
                            <h5 class="color-valo">Delete Weapons</h5>
                            <p>Are you sure you want to delete <?php echo $row["weapon_name"]; ?>?</p>

                            <form action="" method="post">
                                <input type="hidden" name="weapon_name" value="<?php echo $row["weapon_name"];?>">
                                <button class="btn btn-primary mt-2 delete-card-close" type="button" name="deny" style="width: 60px;" data-agent-id="<?php echo $row["weapon_name"];?>">No</button>
                                <button class="btn btn-primary mt-2" type="submit" name="confirm" >Confirm</button>
                            </form>
                        </div>


                        <!-- EDIT -->
                        <div class="weapon-editor-card" id="agent-<?php echo $row["weapon_name"];?>" style="display: none;">
                            <div class="bg-fade"></div>
                            <span class="agent-edit-close" data-agent-id="<?php echo $row["weapon_name"];?>"><i class="fas fa-times" style="color: #ffffff"></i></span>
                            <h4 class="color-valo">Edit Weapons</h4>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-8 row">
                                        <div class="col-6 form-group">
                                            <label class="font-p" for="agent_name">Agent Name:</label>
                                            <input type="text" id="agent_name_<?php echo $row["weapon_name"];?>" name="agent_name" class="form-control" value="<?php echo $row["weapon_name"];?>" required>                  
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="font-p" for="real_name">Real Name:</label>
                                            <input type="text" id="real_name_<?php echo $row["weapon_name"];?>" name="real_name" class="form-control"  value="" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label class="font-p" for="description">Description:</label>
                                            <textarea type="text" id="description_<?php echo $row["weapon_name"];?>" name="description" class="form-control" rows="4" required style="resize: vertical; max-height: 200px;"></textarea>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="origin">Origin:</label>
                                            <input type="text" id="origin_<?php echo $row["weapon_name"];?>" name="origin" class="form-control" value="" required>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="gender">Gender:</label>
                                            <input type="text" id="gender_" name="gender" class="form-control" value="" required>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="font-p" for="role">Role:</label>
                                            <input type="text" id="role_" name="role" class="form-control" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-4 row">
                                        <div class="col-12 image-preview">
                                            <img class="weapon-preview-img mx-auto" src="<?php echo $row["img"];?>" alt="">
                                            <span id="preview-img" style="position: absolute; right:10px; bottom:10px;"><i class="fa-solid fa-eye fa-lg" style="color: #ff4555;" style="width: 20px;"></i></span>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label class="font-p" for="img">Image URL:</label>
                                            <input type="text" id="img_<?php echo $row["weapon_name"];?>" name="img" class="form-control" value="<?php echo $row["img"];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="weapon_name" value="<?php echo $row["weapon_name"];?>">
                                <button name="submit" type="submit" class="btn btn-primary mt-2">Save</button>
                            </form>
                        </div>

                        <?php } } ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>
    </div>          
</div>

<?php 
    include_once 'footer.php'; 
?>