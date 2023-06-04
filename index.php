    <?php 
        include_once 'header.php';
        require_once 'assets/includes/getagents.php';
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
                <div class="agent-container bg-dark pt-3 mx-auto">

                        <?php
                            foreach ($agent_data as $row) {
                        ?>
                        <div class="agent">
                            <a href="#" ><img class="agent-img mx-auto" src="<?php echo $row["img"];?>"  alt="<?php echo $row["agent_name"]; ?>"><p class="text-center w-100"><?php echo $row["agent_name"]; ?></p></a>
                        </div>
                        <?php 
                            }
                     ?>   
                                
               
                    
                </div>
            </div>

            <div class="col-lg-6 px-5 py-4">
                <h2 class="color-valo sub-size">WEAPONS</h2>
                <div class="card bg-dark">
                    <div class="row card-body">
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/0/07/Bulldog.png" alt="Bulldog"><p class="text-center w-100">Bulldog</p></a>
                        </div>
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/e/ec/Phantom.png" alt="Phantom"><p class="text-center w-100">Phantom</p></a>
                        </div>
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/0/07/Bulldog.png" alt="Bulldog"><p class="text-center w-100">Bulldog</p></a>
                        </div>
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/e/ec/Phantom.png" alt="Phantom"><p class="text-center w-100">Phantom</p></a>
                        </div>
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/0/07/Bulldog.png" alt="Bulldog"><p class="text-center w-100">Bulldog</p></a>
                        </div>
                        <div class="weapon">
                            <a href="#"><img class="img-fluid" src="https://static.wikia.nocookie.net/valorant/images/e/ec/Phantom.png" alt="Phantom"><p class="text-center w-100">Phantom</p></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 px-5 py-4">
                <h2 class="color-valo sub-size">FORUMS</h2>
                <div class="card bg-dark">
                    <div class="card-body">

                        <div class="forum">
                            <div class="prof">
                                <img class="img-fluid prof-pic" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="Astra">
                                <div class="prof-info">
                                    <h4 class="color-valo m-0">@bossMiming</h4>
                                    <p>May 29 2023 | 3:00AM</p>
                                </div>
                                <p class="content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                </p>
                            </div> 
                        </div>

                        <div class="forum">
                            <div class="prof">
                                <img class="img-fluid prof-pic" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="Astra">
                                <div class="prof-info">
                                    <h4 class="color-valo m-0">@deku</h4>
                                    <p>May 29 2023 | 3:00AM</p>
                                </div>
                                <p class="content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                </p>
                            </div> 
                        </div>

                        <div class="forum">
                            <div class="prof">
                                <img class="img-fluid prof-pic" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="Astra">
                                <div class="prof-info">
                                    <h4 class="color-valo m-0">@kanade</h4>
                                    <p>May 29 2023 | 3:00AM</p>
                                </div>
                                <p class="content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                    Unde praesentium, consequatur veritatis 
                                    ducimus aliquam quibusdam sed nesciunt eligendi excepturi animi.
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    include_once 'footer.php'; 
?>

    