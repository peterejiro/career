<?php
session_start();
include('connection.php');



//error_reporting(0);
if (isset($_SESSION['username'])){
    $course_id = $_REQUEST['courseid'];
    $questionanswered = $_POST['question'];
    $questionanswer = $_POST['questionanswer'];
    $score= 0;
    $select_specialization = "SELECT MAX(specialization_id) AS specialization_id FROM question";
    $queryselect = mysqli_query($myConn, $select_specialization);
    $rows = mysqli_fetch_array($queryselect,MYSQLI_BOTH);
    $max_specilization = $rows['specialization_id'];
    for ($x = 1; $x<=$max_specilization; $x++) {
        $SQL = "SELECT * FROM specialization where id ='$x'";
        $results = mysqli_query($myConn, $SQL);
        $rowss = mysqli_fetch_array($results, MYSQLI_BOTH);
        $specialization_name = $rowss['specialization_name'];
        $get_questions = "SELECT * FROM question where course_id ='$course_id' AND specialization_id ='$x'";
        $result_getquestions = mysqli_query($myConn, $get_questions);

        while ($fetchquestions = mysqli_fetch_array($result_getquestions, MYSQLI_BOTH)) {
            $question_id = $fetchquestions['id'];
            if((array_key_exists($question_id, $questionanswered)) && (array_key_exists($question_id, $questionanswered))){
                $questionArray = $fetchquestions['question'];
                $answer = $fetchquestions['answer'];
                $givenanswer = $questionanswer[$question_id];

                if($answer === $givenanswer){
                    $score = 5;

                }
                else{
                    $score = 0;
                }
                $scorearray[$question_id] = $score;

            }

        }


    }


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
                        <h1 itemprop="headline">Result/Comments page</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index" title="" itemprop="url">Home</a></li>
                            <li class="breadcrumb-item active">Results/Comments Page</li>
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

                    <div class="fltr-dta remove-ext6 text-left">
                        <div class="row msonry">

                            <div class="col-md-12 col-sm-6 col-lg-12 fltr-itm fltr-itm1">
                                <div class="fltr-bx">
                                    <?php
                                    $realfinalscorearray = array();
                                    $specialization_name_array = array();
                                    for ($x = 1; $x<=$max_specilization; $x++) {
                                       $SQL = "SELECT * FROM specialization where id ='$x'";
                                        $results = mysqli_query($myConn, $SQL);
                                        $rowss = mysqli_fetch_array($results, MYSQLI_BOTH);
                                        $specialization_name = $rowss['specialization_name'];
                                        $specialization_name_array[$x] = $rowss['specialization_name'];

                                        $get_questions = "SELECT * FROM question where course_id ='$course_id' AND specialization_id ='$x'";
                                        $result_getquestions = mysqli_query($myConn, $get_questions);
                                        $count = 0;
                                        $arrayscore = array();
                                        while ($fetchquestions = mysqli_fetch_array($result_getquestions, MYSQLI_BOTH)) {
                                            $question_id = $fetchquestions['id'];
                                            if(array_key_exists($question_id, $scorearray)){
                                                $arrayscore[$count] = $scorearray[$question_id];
                                            }

                                            $count++;
                                        }


                                        $finalscore = array_sum($arrayscore);
                                        $divider = count($arrayscore);
                                        $realdivider = 5 * $divider;
                                        $realfinalscore = ($finalscore / $realdivider) * 100;
                                        $realfinalscorearray[$x] = $realfinalscore;


?>                                        <div class="fltr-thumb hrz brd-rd4">
                                           <h4 itemprop="headline">

                                               <?php echo $specialization_name;
                                        echo ":-    ";
                                        echo $realfinalscore."%";

                                        ?>

                                           </h4>

                                        </div>

                                        <?php



                                    }


                                    ?>

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-lg-12 fltr-itm fltr-itm1">
                                <div class="fltr-bx">
                                      <div class="fltr-thumb hrz brd-rd4">
                                            <h4 itemprop="headline">

                                               <?php


                                               $maxs = array_keys($realfinalscorearray, max($realfinalscorearray));
                                                $number_maxs = count($maxs);

                                             if (max($realfinalscorearray)>=50) {
                                                 echo "From your assessment, recommended specialization(s):";
                                                 if ($number_maxs > 1) {
                                                     $t = 0;
                                                     while ($t < $number_maxs) {
                                                         echo $specialization_name_array[$maxs[$t]] . ",";
                                                         $t++;
                                                     }
                                                 }
                                                elseif ($number_maxs == 1) {

                                                    echo "From your assessment, recommended specialization(s):";
                                                        echo $specialization_name_array[$maxs[0]] . ",";

                                                    }
                                                }

                                             elseif (max($realfinalscorearray)<50){
                                                 echo "It is recommended that you retake the test";
                                             }


                                                ?>

                                            </h4>

                                        </div>


                                    <?php


                                    ?>

                                </div>
                            </div>



                        </div><!-- Filter Data -->
                    </div><!-- Amazing Projects -->
                    <!-- <div class="pagi-wrp text-center">
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
<?php }

else {
    header("location:login");
    exit;
} ?>

























