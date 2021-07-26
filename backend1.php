<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NearlyBiz - Discover Near You !!!</title>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <!-- Facebook og -->
    <meta property='og:title' content=''>
    <meta property='og:description' content=''>
    <meta property='og:url' content=''>
    <!--  Non-Essential, But Recommended -->
    <meta property='og:site_name' content=''>
    <meta property='og:image' content=''>
    <meta property='og:type' content='website' />
    <meta name='Distribution' content='Global'>
    <meta name='robots' content=''>
    <meta name='googlebot' content=''>
    <meta name='revisit-after' content=''>
    <meta name='language' content='en-us'>
    <link rel='canonical' href='' />
    <link rel="icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
    <?php include 'includes/css.php'; ?>

</head>

<body>






    <!-- <div class="swiper-container">  -->
    <div class='swiper-wrapper'>

        <?php
        include 'db.inc.php';
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $search = "%$search%";
            if (strlen($search) > 2) {
                $sql = "SELECT * FROM addbus WHERE address LIKE :s || busname LIKE :s || shopd LIKE :s || aboutbus LIKE :s";
                $stmt = $db->prepare($sql);
                $stmt->bindParam('s', $search);
                $stmt->execute();
                


                if($stmt->rowCount() !== 0){

                ?>
                    <div class='swiper-wrapper'>

                <?php
                while ($row = $stmt->fetch()) {
                    $img = $row['img'];
                    $busname = $row['busname'];
                    $shopd = $row['shopd'];
                    $contactnum = $row['contactnum'];
                    $address = $row['address'];
                    $aboutbus = $row['aboutbus'];
        echo "
  <div class='swiper-slide'>
  "."

                        <div class='biz-card'>"."


                            <div class='biz-img-container'>"."
                                <!-- image called here from database -->
                                <img src='data:image/jpeg;base64,". base64_encode($row['img'])."' heigh='200px' width='200px' class='img-thumbnail' alt='no image'>"."
                                <div class=' fav'>"."
                                    <i class='far fa-heart'></i>"."
                                    <input type='checkbox' id='favCheck'>"."
                                </div>"."
                            </div>"."
                            <div class='biz-info-container'>"."
                                <a href='#'>"."
                                    <h4> ".$row['busname']."</h4>"."
                                </a>"."
                                <p><span class='text-success'>(Open)</span> Closes on 9:00 PM</p>"."
                                <div class='d-flex align-items-center justify-content-between mb-2 mt-1'>"."
                                    <p>".$row['shopd'] ." </p>"."
                                    <p class='rattings'><i class='fas fa-star'></i> 3.0 (155)</p>"."
                                </div>"."
                                <a href='#'><i class='fas fa-phone-alt'></i> ". $row['contactnum'] ."</a><br>"."
                                <a href='#'><i class='fas fa-map-marker-alt'></i> ". $row['address'] ."</a>"."
                                <!-- business details -->
                                <div class='d-flex'>"."
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'>
                                        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z' />"."
                                    </svg>"."
                                    <p><i class='bi bi-info-circle-fill'>&nbsp;</i> ". $row['aboutbus'] ." </p>"."
                                </div>"."
                            </div>"."
    </div>
    "."

                    </div>"."
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ";  } 
            }else{
                echo "<h5>sorry no data found</h5>";
            }
        }
        }
?>
        
    </div>
    <div class="btn-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="btn-next"><i class="fas fa-chevron-right"></i></div>

    <!-- <div class="btn-prev"><i class="fas fa-chevron-left"></i></div>
        <div class="btn-next"><i class="fas fa-chevron-right"></i></div> -->



</body>

</html>