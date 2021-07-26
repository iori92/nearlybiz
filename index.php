<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>



    <?php include 'includes/css.php'; ?>
    <?php include 'includes/nav.php'; ?>
    <?php include 'includes/connect.php'; ?>
    <script>
        $(document).ready(function() {
            $("#search").keyup(function() {
                $.ajax({
                    url: 'backend.php',
                    type: 'post',
                    data: {
                        search: $(this).val()
                    },
                    success: function(result) {
                        $("#result").html(result);
                    }
                });

            });

        });
    </script>
</head>

<body>

    <main>
        <section class="hero padding-y-100">
            <h1 class=" text-center">Discover Near You</h1>
            <h5 class="mb-3 text-center">All the top Locations – from Restaurants and Hotels, to Shops, Famous Services and more..
            </h5>
            <div class="search-box mt-3">
                <div>
                    <form class="container">
                        <div class="form-row justify-content-center">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Enter Keyword">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <select class="form-control   select-2 select2-hidden-accessible" name="select1" id="select1" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">Select Location Automatically</option>
                                    <?php
                                    require 'data.php';
                                    $select1 = loadSelect1();
                                    foreach ($select1 as $select) {
                                        echo "<option id='" . $select['id'] . "' value='" . $select['location'] . "'>" . $select['location'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <select class="form-control   select-2 select2-hidden-accessible" name="select2" id="select2" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">Select Popular Categories</option>
                                    <?php
                                    
                                    $select2 = loadSelect2();
                                    foreach ($select2 as $select3) {
                                        echo "<option id='" . $select3['id'] . "' value='" . $select3['shopd'] . "'>" . $select3['shopd'] . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block"><i class="fas fa-search-location"></i> Search</button>
                            </div>
                            <!-- <div class="col-lg-2 col-md-2 col-sm-12">
                                <a href="#" class="btn btn-secondary btn-block"><i class="far fa-comments"></i> Chat</a>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="featured padding-y-80 bg-light">

            <!-- searching part -->
            <div class="container-fluid">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <span id="result">

                            </span>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- <div class="btn-prev"><i class="fas fa-chevron-left"></i></div> -->
                    <!-- <div class="btn-next"><i class="fas fa-chevron-right"></i></div> -->
                </div>

            </div>


            <div class="container-fluid">
                <div class="section-title">
                    <h2>Featured For You</h2>
                </div>




                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <!--  inserting data in card form -->
                        <?php
                        $query = "SELECT * FROM addbus ORDER BY id DESC";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="swiper-slide">
                                <div class="biz-card">
                                    <div class="biz-img-container">

                                        <!-- image called here from database -->
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" heigh="200px" width="200px" class="img-thumbnail" alt="no image">
                                        <div class=" fav">
                                            <i class="far fa-heart"></i>
                                            <input type="checkbox" id="favCheck">
                                        </div>
                                    </div>
                                    <div class="biz-info-container">
                                        <a href="#">
                                            <h4> <?php echo $row['busname'];     ?></h4>
                                        </a>
                                        <p><span class="text-success">(Open)</span> Closes on 9:00 PM</p>
                                        <div class="d-flex align-items-center justify-content-between mb-2 mt-1">
                                            <p> <?php echo $row['shopd']; ?> </p>
                                            <p class="rattings"><i class="fas fa-star"></i> 3.0 (155)</p>
                                        </div>
                                        <a href="#"><i class="fas fa-phone-alt"></i> <?php echo $row['contactnum']; ?></a><br>
                                        <a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?></a>
                                        <!-- business details -->
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                            </svg>

                                            <p><i class="bi bi-info-circle-fill">&nbsp;</i> <?php echo $row['aboutbus']; ?> </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }   ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="btn-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="btn-next"><i class="fas fa-chevron-right"></i></div>
                </div>

            </div>
        </section>

        <section class="categories-home padding-y-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Popular Categories</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            <a href="#" class="category">Gym / Fitness Centres</a>
                            <a href="#" class="category">Stationary Shops</a>
                            <a href="#" class="category">Advocate Office</a>
                            <a href="#" class="category">Medical Stores</a>
                            <a href="#" class="category">Software Companies</a>
                            <a href="#" class="category">General Stores</a>
                            <a href="#" class="category">Kirana Stores</a>
                            <a href="#" class="category">Restaurants</a>
                            <a href="#" class="category">Juice Centres</a>
                            <a href="#" class="category">Cafe</a>
                            <a href="#" class="category">Lounge</a>
                            <a href="#" class="category">Fashion Stores</a>
                            <a href="#" class="category">Mobile Stores</a>
                            <a href="#" class="category">Electronics Shops</a>
                            <a href="#" class="category">Banks</a>
                            <a href="#" class="category">Hospitals</a>
                            <a href="#" class="category">Clinic Centres</a>
                            <a href="#" class="category">Schools</a>
                            <a href="#" class="category">Colleges</a>
                            <a href="#" class="category">Traning Institutes</a>
                            <a href="#" class="category">Transport Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="padding-y-80 recommended">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Recommended For You</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <?php
                                $query = "SELECT * FROM addbus ORDER BY id DESC";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="swiper-slide">
                                        <div class="biz-card">
                                            <div class="biz-img-container">
                                                <!-- image called here from database -->
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" heigh="200px" width="200px" class="img-thumbnail" alt="no image">
                                                <div class=" fav">
                                                    <i class="far fa-heart"></i>
                                                    <input type="checkbox" id="favCheck">
                                                </div>
                                            </div>
                                            <div class="biz-info-container">
                                                <a href="#">
                                                    <h4> <?php echo $row['busname'];     ?></h4>
                                                </a>
                                                <p><span class="text-success">(Open)</span> Closes on 9:00 PM</p>
                                                <div class="d-flex align-items-center justify-content-between mb-2 mt-1">
                                                    <p> <?php echo $row['shopd']; ?> </p>
                                                    <p class="rattings"><i class="fas fa-star"></i> 3.0 (155)</p>
                                                </div>
                                                <a href="#"><i class="fas fa-phone-alt"></i> <?php echo $row['contactnum']; ?></a><br>
                                                <a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?></a>
                                                <!-- business details -->
                                                <div class="d-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                                    </svg>

                                                    <p><i class="bi bi-info-circle-fill">&nbsp;</i> <?php echo $row['aboutbus']; ?> </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }   ?>





                            </div>
                            <!-- Add Arrows -->
                            <div class="btn-prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="btn-next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-primary">View All Recommendations</a>
                </div>
                <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="biz-card">
                            <div class="biz-img-container">
                                <img src="assets/img/business-img.jpg" alt="">
                                <div class="fav">
                                    <i class="far fa-heart"></i>
                                    <input type="checkbox" id="favCheck">
                                </div>
                            </div>
                            <div class="biz-info-container">
                                <a href="#">
                                    <h4>Hertzsoft Technologies Pvt. Ltd.</h4>
                                </a>
                                <p><span class="text-success">(Open)</span> Closes on 9:00 PM</p>
                                <div class="d-flex align-items-center justify-content-between mb-2 mt-1">
                                    <p>Stationary Shop</p>
                                    <p class="rattings"><i class="fas fa-star"></i> 3.0 (155)</p>
                                </div>
                                <a href="#"><i class="fas fa-phone-alt"></i> +91 9765456789</a><br>
                                <a href="#"><i class="fas fa-map-marker-alt"></i> Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Deleniti, atque.</a>
                            </div>
                        </div>
                    </div> -->
            </div>
            </div>
        </section>

        <section class="padding-y-80 cta">
            <div class="container text-center">
                <h3>Spend More Time Running Your Business.</h3>
                <h4>And, less time obsessing about your local presence.</h4><br>
                <a href="add-business.php" class="btn btn-primary">Add Your Business, it's Free !</a>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#select1").on('change', function() {
                var value = $(this).val();
                // alert(value);
                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    data: 'request=' + value,
                    beforeSend: function() {
                        $("#result").html("<span>working..</span>");
                    },
                    success: function(data) {
                        $("#result").html(data);
                    }



                })


            });
        });

        $(document).ready(function() {

            $("#select2").on('change', function() {
                var value = $(this).val();
                // alert(value);
                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    data: 'request1=' + value,
                    beforeSend: function() {
                        $("#result").html("<span>working..</span>");
                    },
                    success: function(data) {
                        $("#result").html(data);
                    }



                })


            });
        });
    </script>
</body>

</html>