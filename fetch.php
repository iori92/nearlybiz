<?php

include 'includes/connect.php';
if (isset($_POST['request'])) {


    $request = $_POST['request'];

    $query = "SELECT * FROM addbus WHERE location = '$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>

    <!-- <div class="swiper-container">  -->
   

        <div class='swiper-wrapper'>

            <?php
            if ($count) {

                while ($row = mysqli_fetch_assoc($result)) {

                    $img = $row['img'];
                    $busname = $row['busname'];
                    $shopd = $row['shopd'];
                    $contactnum = $row['contactnum'];
                    $address = $row['address'];
                    $aboutbus = $row['aboutbus'];
            ?>


                    <div class='swiper-slide'>

                        <div class='biz-card'>


                            <div class='biz-img-container'>
                                <!-- image called here from database -->
                                <img src='data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>' heigh='200px' width='200px' class='img-thumbnail' alt='no image'>
                                <div class=' fav'>
                                    <i class='far fa-heart'></i>
                                    <input type='checkbox' id='favCheck'>
                                </div>
                            </div>
                            <div class='biz-info-container'>
                                <a href='#'>
                                    <h4> <?php echo $row['busname']     ?></h4>
                                </a>
                                <p><span class='text-success'>(Open)</span> Closes on 9:00 PM</p>
                                <div class='d-flex align-items-center justify-content-between mb-2 mt-1'>
                                    <p> <?php echo $row['shopd'] ?> </p>
                                    <p class='rattings'><i class='fas fa-star'></i> 3.0 (155)</p>
                                </div>
                                <a href='#'><i class='fas fa-phone-alt'></i> <?php echo $row['contactnum'] ?></a><br>
                                <a href='#'><i class='fas fa-map-marker-alt'></i> <?php echo $row['address']; ?></a>
                                <!-- business details -->
                                <div class='d-flex'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'>
                                        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z' />
                                    </svg>
                                    <p><i class='bi bi-info-circle-fill'>&nbsp;</i> <?php echo $row['aboutbus'] ?> </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                }
                ?>
        </div>
                

               


<?php
            } else {
                echo "sorry no data found!";
            }
        }
?>

<?php

include 'includes/connect.php';
if (isset($_POST['request1'])) {


    $request1 = $_POST['request1'];

    $query = "SELECT * FROM addbus WHERE shopd = '$request1'";
    $result1 = mysqli_query($con, $query);
    $count = mysqli_num_rows($result1);
?>

    <!-- <div class="swiper-container">  -->
   

        <div class='swiper-wrapper'>

            <?php
            if ($count) {

                while ($row = mysqli_fetch_assoc($result1)) {

                    $img = $row['img'];
                    $busname = $row['busname'];
                    $shopd = $row['shopd'];
                    $contactnum = $row['contactnum'];
                    $address = $row['address'];
                    $aboutbus = $row['aboutbus'];
            ?>


                    <div class='swiper-slide'>

                        <div class='biz-card'>


                            <div class='biz-img-container'>
                                <!-- image called here from database -->
                                <img src='data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>' heigh='200px' width='200px' class='img-thumbnail' alt='no image'>
                                <div class=' fav'>
                                    <i class='far fa-heart'></i>
                                    <input type='checkbox' id='favCheck'>
                                </div>
                            </div>
                            <div class='biz-info-container'>
                                <a href='#'>
                                    <h4> <?php echo $row['busname']     ?></h4>
                                </a>
                                <p><span class='text-success'>(Open)</span> Closes on 9:00 PM</p>
                                <div class='d-flex align-items-center justify-content-between mb-2 mt-1'>
                                    <p> <?php echo $row['shopd'] ?> </p>
                                    <p class='rattings'><i class='fas fa-star'></i> 3.0 (155)</p>
                                </div>
                                <a href='#'><i class='fas fa-phone-alt'></i> <?php echo $row['contactnum'] ?></a><br>
                                <a href='#'><i class='fas fa-map-marker-alt'></i> <?php echo $row['address']; ?></a>
                                <!-- business details -->
                                <div class='d-flex'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'>
                                        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z' />
                                    </svg>
                                    <p><i class='bi bi-info-circle-fill'>&nbsp;</i> <?php echo $row['aboutbus'] ?> </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                }
                ?>
        </div>
                

               


<?php
            } else {
                echo "sorry no data found!";
            }
        }
?>
