<?php 
    include_once 'header.php';
    require_once 'assets/includes/getagents.php';
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
                    <?php foreach ($agent_data as $row) { ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" <?php if($i == 0){ ?> class="active" aria-current="true" <?php } ?>aria-label="Slide <?php echo $i+1;?>"></button>
                    <?php $i++; } ?>
                </div>
                <div class="carousel-inner d-lg-flex justify-content-center h-100">
                <?php foreach ($agent_data as $row) { ?>
                    <div class="carousel-item container <?php if($row["agent_name"] == "Astra") {?> active <?php } ?> mx-auto">
                        <div class="row">
                            <div class="col-lg-3" >
                                <img src="<?php echo $row["img"];?>" class="image-fluid position-relative" alt="..." style="height: 70vh !important;">
                            </div>
                            <div class="col-lg-9" >
                                <h1 class="color-valo"><?php echo $row["agent_name"]; ?></h1>
                                <p> <?php echo $row["description"];?> </p>
                                <div class="agent-container bg-dark p-3 row" style="max-height: 300px; overflow-y: hidden !important;">
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
                                    
                                    <div class="agent-desc col-8 my-3">
                                        <p class="color-valo">Abilities</p>
                                        <div class="d-flex flex-wrap">

                                        <div class="skill-card d-flex flex-column align-items-center" style="margin-right: 1rem;">
                                            <img src="https://static.wikia.nocookie.net/valorant/images/4/41/Gravity_Well.png" alt="" style="max-width: 60px;">
                                            <p class="m-0">Ability Name</p>
                                            <p class="m-0" style="font-size: 12px; margin-top: -3px !important;">Ability Type</p>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>

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