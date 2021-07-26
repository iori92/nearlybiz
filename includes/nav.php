<?php
// include 'connect.php';
// session_start();
?>
<div id="preloader">
    <img src="assets/img/logo.png" alt="">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home </a>
            </li>
            <li class="nav-item" id="searchOpen">
                <a class="nav-link" href=""><i class="fas fa-search-location"></i> Search </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-comments"></i> Chat</a>
            </li> -->
            <li class="nav-item">
                <a id="lg" class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><i
                        class="fas fa-sign-in-alt"></i> Login
                    / Register</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-user-circle"></i> <?= isset($_SESSION['name'])? $_SESSION['name'] : "My Account"; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item" href="#">My Businesses</a>
                    <a class="dropdown-item" href="#">Saved Businesses</a>
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="#">Settings</a> -->
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
            <li class="nav-item nav-cta">
                <a class="btn btn-primary" href="add-business.php"><i class="fas fa-plus"></i> Add Your Business</a>
            </li>
        </ul>

    </div>
</nav>

<div class="search-container">
    <div class="close-btn" id="searchClose">
        <i class="fas fa-times"></i>
    </div>
    <div class="search-box">
        <div>
            <form class="container">
                <h1 class="text-white">Search...</h1>
                <div class="form-row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter Keyword">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <select class="form-control select-2 select2-hidden-accessible" style="width: 100%;"
                            tabindex="-1" aria-hidden="true">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search-location"></i>
                            Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
