<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NearlyBiz - Forgot Password</title>
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

    <?php include 'includes/css.php';?>
</head>

<body>
    <?php include 'includes/nav.php';?>
    <main>
        <section class="padding-y-80 auth">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="auth-container card shadow">
                            <div class="card-body">
                                <h3 class="text-center mt-4">Forgot Passowrd</h3>
                                <p class="text-center mb-4">Enter your Registered Email Address to Change Password.</p>
                                <form action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                                    <hr class="w-50">
                                    <p class="text-muted text-center"><a href="login.php">Go Back to Login</a></p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php';?>
</body>

</html>