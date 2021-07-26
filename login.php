<?php
session_start();
include 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NearlyBiz - Login</title>
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

    <?php include 'includes/css.php';
    include 'includes/nav.php';
    include 'includes/connect.php';



    ?>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/js/sweetalert.min.js"></script>


    <?php
    // sign up part

    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $pass = password_hash($password, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM user1 WHERE `email`='$email'";
        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if ($emailcount > 0) {
            echo "email already exists";
        } else {
            $insertquery = "insert into user1 (username,email,password) values('$username','$email','$pass')";
            $iquery = mysqli_query($con, $insertquery);

            echo '<script type= "text/javascript">                        swal("Registration successful!", "data sent!", "success");
        </script>';

            if ($con) {
            } else {

                echo "<script> alert(no connection);</script>";
            }
        }
    }
    ?><?php
        // login part 
        $errorMessage = '';
        if (isset($_POST['login'])) {

            $email1 = $_POST['email1'];
            $password1 = $_POST['password1'];

            $email_search = "select  * from user1 where email='$email1'";
            $query1 = mysqli_query($con, $email_search);

            $email1_count = mysqli_num_rows($query1);


            // remember me part here
            if ($email1_count) {
                if (!empty($_POST["customCheck1"])) {
                    setcookie("email1", $email1, time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("password1",    $password1,    time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie("email1", "");
                    setcookie("password1", "");
                }
            } else if (!empty($_POST["email1"])) {
                $errorMessage = "Enter Both user and password!";
            }





            if ($email1_count) {
                $email_pass1 = mysqli_fetch_assoc($query1);
                $db_pass1 = $email_pass1['password'];
                $pas_decode = password_verify($password1, $db_pass1);

                if ($pas_decode) {
                    $_SESSION['name'] =  $email_pass1['username'];
                    $_SESSION['email'] = $email1;

        ?>
    <script>
        swal('Login successfully!', '', 'success');

        var s = setTimeout(showalert, 1000);

        function showalert() {
            location.replace("index.php");

        }
    </script>
<?php
                    // header("location: index.php");
                    exit();
                } else {
                    echo "password incorrect";
                }
            } else {
                echo "Invalid Email";
            }
        }
?>




<main>
    <section class="padding-y-80 auth">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="auth-container card shadow">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content p-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <h3 class="text-center my-4">Login to Your Account</h3>

                                    <!-- login page here -->

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="password1" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="row m-3 justify-content-between">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                            </div>
                                            <a href="forgot-password.php">Forgot Your Password ?</a>
                                        </div>
                                        <button type="submit" name="login" id="login1" class="btn btn-primary btn-block">Login</button>
                                        <!-- <p class="my-3 font-weight-bold text-center">OR</p>
                                        <button type="submit" class="btn btn-google btn-block"><i class="fab fa-google pr-1"></i> Login with Google</button>
                                        <button type="submit" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f pr-1"></i> Login with Facebook</button> -->
                                        <div class="text-center mt-3">

                                            <hr class="w-50">
                                            <p class="text-muted">Dont Have an Account ? <span class="font-weight-bold text-dark">Switch Tab to Create New Account</span> </p>
                                        </div>
                                    </form>
                                </div>

                                <!-- sign up page -->

                                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                                    <h3 class="text-center my-4">Create Your New Account</h3>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Full Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" required name="username" aria-describedby="emailHelp" placeholder="Enter Your Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" required name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" required name="password" placeholder="Password">
                                        </div>
                                        <!-- <div class="row m-3 justify-content-between">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                                </div>
                                            </div> -->
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Create Account</button>
                                        <!-- <p class="my-3 font-weight-bold text-center">OR</p>
                                        <button type="submit" class="btn btn-google btn-block"><i class="fab fa-google pr-1"></i> Register with Google</button>
                                        <button type="submit" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f pr-1"></i> Register with Facebook</button> -->
                                        <div class="text-center mt-3">

                                            <hr class="w-50">
                                            <p class="text-muted">Already Have an Account ? <span class="font-weight-bold text-dark">Switch Tab to Login into your Account</span> </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>

</html>