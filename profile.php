<?php 
    session_start();
    if(isset($_SESSION["username"])) {
        include_once 'header.php';
?>
<div class="profile-container pt-5 bg-gray">
<div class=" container pt-5">
    <div class="row w-auto bg-gray">
        <div class="col-lg-3 px-2 py-4">
            <div class="card bg-dark" style="min-height: 300px;">
                <h4 class="color-valo mx-auto mt-3">Profile Info</h4>
                <img class="w-75 mx-auto my-3" src="https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg" alt="">
                <div class="prof-info">
                    <h5 class="color-valo m-0">@bossMiming</h4>
                    <p>Email Here</p>
                </div>  
            </div>
        </div>
        <div class="col-lg-9 px-2 py-4">
            <div class="card bg-dark" style="min-height: 500px;">
                <h4 class="color-valo mx-3 mt-3">Forums</h4>

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
    } else { 
        header("location: ../../index.php"); 
        exit();
    }
?>

