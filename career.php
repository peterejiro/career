
<?php

include('connection.php');
session_start();
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
                            <h1 itemprop="headline">Career's Page</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index" title="" itemprop="url">Home</a></li>
                                <li class="breadcrumb-item active">Careers</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="spacing">
                <div class="container">
                    <div class="amzng-prjcts text-center">
                        <ul class="fltr-lnks">

                            <?php  $sql = "SELECT * FROM course";

                            $result = mysqli_query($myConn, $sql);

                            while($row=  mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                $id = $row['id'];
                                $course_name = $row['Coursename'];
                                ?>


                            <li class="active"><a data-filter="*" href="#" itemprop="url"><?php echo $course_name; ?></a></li>
                          <!--  <li><a data-filter=".fltr-itm1" href="#" itemprop="url">WEB DESIGN</a></li>
                            <li><a data-filter=".fltr-itm2" href="#" itemprop="url">BRANDING</a></li>
                            <li><a data-filter=".fltr-itm3" href="#" itemprop="url">GRAPHIC DESIGN</a></li>
                            <li><a data-filter=".fltr-itm4" href="#" itemprop="url">OTHER</a></li> -->

                         <?php    } ?>
                        </ul>
                        <div class="fltr-dta remove-ext6 text-left">
                            <div class="row msonry">
                                <?php $query = "SELECT * FROM specialization where courseid = '$id'";
                                $query_result = mysqli_query($myConn, $query);

                                while($rows = mysqli_fetch_array($query_result, MYSQLI_BOTH)){

                                    $specialization_id = $rows['id'];
                                    $specialization_name = $rows['specialization_name'];
                                    $about_specialization = $rows['about_specialization'];
                                    $specialization_picture = $rows['specialization_picture'];

                                ?>
                                <div class="col-md-4 col-sm-6 col-lg-4 fltr-itm fltr-itm1">
                                    <div class="fltr-bx">
                                        <div class="fltr-thumb hrz brd-rd4">
                                            <a href="career-detail?id=<?php echo $specialization_id; ?>" title="" itemprop="url"><img src="assets/images/<?php echo $specialization_picture; ?>" alt="fltr-img1-1.jpg" itemprop="image"></a>
                                        </div>
                                        <div class="fltr-inf">
                                            <h4 itemprop="headline"><a href="career-detail?id=<?php echo $specialization_id; ?>" itemprop="url"><?php echo $specialization_name; ?></a></h4>

                                        </div>
                                    </div>
                                </div>

                                <?php } ?>


                        </div><!-- Filter Data -->
                    </div><!-- Amazing Projects -->
                    <div class="pagi-wrp text-center">
                        <ul class="pagination">
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url"><i class="fa fa-angle-left"></i> PREVIOUS</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">1</a></li>
                            <li class="page-item active brd-rd3"><span>2</span></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">3</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">4</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">5</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">6</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">7</a></li>
                            <li class="page-item brd-rd3"><a class="page-link" href="#" title="" itemprop="url">NEXT <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div><!-- Pagination Wrap -->
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





