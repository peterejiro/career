<?php include('header.php');
include('connection.php');
session_start();

$specialization_id =  $_REQUEST['id'];

$SQL = "SELECT * FROM specialization where id ='$specialization_id'";

$result = mysqli_query($myConn, $SQL);
$rows =  mysqli_fetch_array($result, MYSQLI_BOTH);
$specialization_name = $rows['specialization_name'];
$about_specialization = $rows['about_specialization'];
$specialization_picture = $rows['specialization_picture'];

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
        <?php include('header.php'); ?>
        <section>
            <div class="spacing black-layer3 opc8">
                <div class="fixed-bg" style="background-image: url(assets/images/banner1.jpg);"></div>
                <div class="container">
                    <div class="pg-tp-wrp text-center">
                        <div class="pg-tp-inr">
                            <h1 itemprop="headline"> <?php echo $specialization_name; ?> </h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" title="" itemprop="url">Home</a></li>
                                <li class="breadcrumb-item"><a href="career" title="" itemprop="url">Careers</a></li>
                                <li class="breadcrumb-item active"> <?php echo $specialization_name; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="spacing no-spacing">
                <div class="prtfl-dtl-wrp">
                    <div class="prtfl-imgs">
                        <div class="row mrg">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <a href="assets/images/<?php echo $specialization_picture; ?>" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/<?php echo $specialization_picture; ?>" alt="prtfl-dtl-img1-1.jpg" itemprop="image"></a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <p itemprop="description">



                                 <?php echo $about_specialization; ?>


                                </p></div>
                        </div>
                    </div>
                    <div class="prtfl-dtl-innr">
                        <div class="container">
                            <div class="prtfl-dtl">
                                <div class="row">
                               <!--     <div class="col-md-7 col-sm-12 col-lg-7">
                                        <div class="prtfl-dtl-inf">
                                            <h1 itemprop="headline">Creative Magezine</h1>
                                            <ul class="prtfl-dtl-lst">
                                                <li><strong>CLIENT</strong> Ipsum dolor sit consectetur</li>
                                                <li><strong>DATE</strong> October 26th, 2017</li>
                                                <li><strong>PROJECT TYPE</strong> Marketing online, Brand Marketing</li>
                                            </ul>
                                            <div class="scl-btns">
                                                <a class="brd-rd50" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="brd-rd50" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="brd-rd50" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                <a class="brd-rd50" href="#" title="Instagram" itemprop="url" target="_blank"><i class="fa fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>

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