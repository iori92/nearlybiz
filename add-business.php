<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NearlyBiz - Add New Business</title>
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
    <meta name='googlebot' content=''>2
    <meta name='revisit-after' content=''>
    <meta name='language' content='en-us'>
    <link rel='canonical' href='' />
    <link rel="icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">

    <?php include 'includes/css.php';
    include 'includes/connect.php';
    ?>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <?php include 'includes/nav.php';
    ?>


    <?php

    if (isset($_POST['submit'])) {

        $shopd = mysqli_real_escape_string($con, $_POST['shopd']);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $busname = mysqli_real_escape_string($con, $_POST['busname']);
        $tagline = mysqli_real_escape_string($con, $_POST['tagline']);
        $aboutbus = mysqli_real_escape_string($con, $_POST['aboutbus']);
        $contactnum = mysqli_real_escape_string($con, $_POST['contactnum']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        $insertquery = "INSERT INTO addbus (shopd,location,img,busname,tagline,aboutbus,contactnum,email,address) VALUES('$shopd','$location','$file','$busname','$tagline','$aboutbus','$contactnum','$email','$address')";
        $iquery = mysqli_query($con, $insertquery);

        if ($iquery) {



    ?>
            <script>
                swal('Data added', 'sent!', 'success');

                var s = setTimeout(showalert, 2000);

                function showalert() {
                    location.replace("index.php");

                }
            </script>
    <?php
            // echo '<script type= "text/javascript">   swal("Data successfully added!", "data sent!", "success");
            // </script>';


        }
        if (isset($_POST['reset'])) {

            header("Location: add-business.php");
        }
    }
    $result = mysqli_query($con, "SELECT * FROM addbus");

    ?>


    <main>
        <section class="padding-y-50 bread-crumb">
            <div class="breadcrumbs_inner d-flex align-items-center p-5">
                <div class="container">
                    <div class="breadcrumbs_content text-center">
                        <div class="page_link">
                            <a href="/">Home</a>
                            &nbsp;&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;&nbsp;
                            <a href="add-business.php">Add Business</a>
                        </div>
                        <h1>Add Business</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="add-business padding-y-80">
            <div class="container">
                <div class="card shadow">
                    <form action="" role="form" id="contact-form" method="POST" enctype="multipart/form-data">

                        <a href="#" class="image-container" data-toggle="modal" data-target="#selectImage">
                            <img src="assets/img/business-img.jpg" alt="Upload Your Logo or Business Image" class="shop-img shop-logo" id="result">
                            <div class="content">
                                <p>Click to Select Image !!!</p>
                            </div>
                        </a>

                        <div class="modal fade bd-example-modal-lg" id="selectImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <div id="main-cropper"></div>
                                            <div class="custom-file actionUpload">
                                                <input type="file" class="custom-file-input" name="image" id="upload" value="Choose Image" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="showResult" class="btn btn-primary">Upload Image</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">

                                    <label for="inputEmail4">Business Name <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <input type="text" class="form-control" id="busname" name="busname" required placeholder="Enter your Shop / Business Name">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">

                                    <label for="inputEmail4">Tagline (Optional)</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Enter your Tagline (if any)">
                                </div>

                                <div class="form-group col-md-12 col-sm-12">

                                    <label for="inputEmail4">About Your Business <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <textarea class="form-control" id="aboutbus" required placeholder="Enter Some Description about Your Business" name="aboutbus" rows="6"></textarea>
                                </div>

                                <div class="col-12 mt-4">

                                </div>
                                <div class="form-group col-md-6 col-sm-12">

                                    <label for="inputEmail4">Shop detail <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <input type="text" class="form-control" id="shopd" required name="shopd" placeholder="Enter your shop type">


                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="inputEmail4">Location <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <input type="text" class="form-control" id="location" required name="location" placeholder="Enter your location eg = mumbai">
                                </div>


                                <div class="col-12 mt-4">
                                    <h4>Contact Details</h4>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">

                                    <label for="inputEmail4">Contact Number <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <input type="text" class="form-control" id="contactnum" required name="contactnum" placeholder="Enter your Contact Number">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">

                                    <label for="inputEmail4">Email Address (Optional)</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email Address">
                                </div>

                                <div class="form-group col-md-12 col-sm-12">

                                    <label for="inputEmail4">Address <sup class="text-danger" data-toggle="tooltip" data-placement="right" title="Required">*</sup></label>
                                    <textarea class="form-control" required placeholder="Enter Your Address" id="address" name="address" rows="6"></textarea>
                                </div>


                                <div class="col-md-12 text-center">

                                    <button type="submit" name="submit" id="btn" class="btn btn-primary mt-4">Submit</button>
                                    <button type="reset" name="reset" id="btn" class="btn btn-secondary mt-4">Reset</button>


                                </div>

                            </div>
                        </div>
                    </form>
                </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        $('#selectImage').on('shown.bs.modal', function(e) {
            var width = $('.modal-body').width();
            var bscWidth = width - 5;

            // Calculating Aspect Ratio
            var initialWidth = 21,
                initialHeight = 9,
                newWidth = bscWidth,
                newHeight;

            initialWidth = initialWidth;
            initialHeight = initialHeight;
            newWidth = newWidth;
            newHeight = newHeight;

            aspectRatio = initialWidth / initialHeight;

            newHeight = Math.round(newWidth / aspectRatio);

            var Height = newHeight;

            newWidth = Math.round(newHeight * aspectRatio);

            var Width = newWidth;

            var basic = $("#main-cropper").croppie({
                viewport: {
                    width: Width,
                    height: Height,
                },
                boundary: {
                    width: Width,
                    height: Height,
                },
                showZoomer: true,
                url: "assets/img/business-img.jpg",
                enableExif: true
            });

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#main-cropper").croppie("bind", {
                            url: e.target.result
                        });
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                var label = $(this).siblings(".custom-file-label");
                label.html(fileName);
            });

            $(".actionUpload input").on("change", function() {
                readFile(this);
            });

            $("#showResult").click(function() {
                $("#main-cropper").croppie("result", {
                    type: "base64",
                    size: {
                        width: 1080,
                        height: 463,
                    },
                }).then(function(resp) {
                    $("#result").attr("src", resp);
                });
                $('#selectImage').modal('hide');
            });
        });
    </script>



    <!-- success msg of form submission by dheeraj  -->
    <!-- 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) { //Don't foget to change the id form
                $.ajax({
                    url: 'add-business.php', //===PHP file name====
                    // data: $(this).serialize(),
                    // type: 'POST',             
                    success: function(data) {
                        console.log(data);
                        //Success Message == 'Title', 'Message body', Last one leave as it is
                        swal("Data successfully added!", "data sent!", "success");
                    },
                    error: function(data) {
                        //Error Message == 'Title', 'Message body', Last one leave as it is
                        swal("Oops...", "Something went wrong :(", "error");
                    }
                });
                e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
            });
        });
    </script> -->
    <!-- this msg for reset button by dheeraj -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#contact-form').on('reset', function(e) { //Don't foget to change the id form
                $.ajax({
                    url: 'add-business.php', //===PHP file name====
                    // data: $(this).serialize(),
                    // type: 'POST',
                    success: function(data) {

                        console.log(data);
                        //Success Message == 'Title', 'Message body', Last one leave as it is

                        swal("Data reset!", "", "success");
                    },
                    error: function(data) {
                        //Error Message == 'Title', 'Message body', Last one leave as it is
                        swal("Oops...", "Something went wrong :(", "error");
                    }
                });
                e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
            });
        });
    </script> -->

    <script>


    </script>
</body>

</html>