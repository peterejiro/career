<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['user'])){
    header("location:assessment");
}
else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Dana  - Ultimate Multi-Purpose Corporate Business and Agency HTML Template</title>

    <link rel="stylesheet" href="assets/css/webfonts.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body itemscope>
    <main>
       <?php include('header.php') ?>
        <section>
            <div class="spacing black-layer3 opc8">
                <div class="fixed-bg" style="background-image: url(assets/images/banner1.jpg);"></div>
                <div class="container">
                    <div class="pg-tp-wrp text-center">
                        <div class="pg-tp-inr">
                            <h1 itemprop="headline">Log in Page</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" title="" itemprop="url">Home</a></li>
                                <li class="breadcrumb-item active">Log in</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="spacing gray-bg bottom-spac70 top-spac70">
                <div class="container">
                    <div class="cnt-frm-dta">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-lg-4">
                                <div class="cnt-inf">
                                    <h2 itemprop="headline">Log In</h2>
                                    <p itemprop="description">Log in to take Career assessment </p>

                                    <p itemprop="description">Don't have an account? <a class="theme-bg hrz theme-btn brd-rd3" href="register"> Register</a> </p>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-lg-8">
                                <div class="cnt-frm">
                                    <form action="script" method="post">
                                        <div class="row mrg10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="brd-rd3" type="text" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="brd-rd3" type="password" name="password" placeholder="Password" required>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <button class="theme-bg hrz theme-btn brd-rd3" name="login" type="submit">LOG IN</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Contact From Data -->
                </div>
            </div>
        </section>
       <?php include('footer.php'); ?>
    </main><!-- Main Wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/part-int.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
</body>	
</html>
<?php } ?>