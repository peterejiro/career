<?php
session_start();
include("connection.php");
//error_reporting(0);
$course_id =  $_REQUEST['id'];
?>


    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Career Assessmet: Question Page</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/gsdk-base.css" rel="stylesheet" />

        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    </head>

    <body>
    <div class="image-container set-full-height" style="background-image: url('images/genie_wallpaper.png')">

        <form method="post" action="answer-page?courseid=<?php echo $course_id; ?>" enctype="multipart/form-data">

        <!--   Big container   -->
        <div class="container">
            <?php
            $select_specialization = "SELECT MAX(specialization_id) AS specialization_id FROM question";
            $queryselect = mysqli_query($myConn, $select_specialization);
            $rows = mysqli_fetch_array($queryselect,MYSQLI_BOTH);
            $max_specilization = $rows['specialization_id'];
            $y = 0;
            for ($x = 1; $x<=$max_specilization; $x++) {
            $SQL = "SELECT * FROM specialization where id ='$x'";
            $results = mysqli_query($myConn, $SQL);
            $rowss = mysqli_fetch_array($results, MYSQLI_BOTH);
            $specialization_namearray = array();
            $specialization_name = $rowss['specialization_name'];
            $get_questions = "SELECT * FROM question where course_id ='$course_id' AND specialization_id ='$x'";
            $result_getquestions = mysqli_query($myConn, $get_questions);
            $questionArray = array();
            $count = 0;
            while ($fetchquestions = mysqli_fetch_array($result_getquestions, MYSQLI_BOTH)) {
                $questionArray[$count] = $fetchquestions['question'];
                $question_id[$count] = $fetchquestions['id'];
                $option_a[$count] = $fetchquestions['option_a'];
                $option_b[$count] = $fetchquestions['option_b'];
                $option_c[$count] = $fetchquestions['option_c'];
                $option_d[$count] = $fetchquestions['option_d'];
                $count++;
            }

            $qxtnNo = 0;
            $totalNumderOfQuestions = $count;
            $questionsToBeDisplayed = array();
            $noOfTabs = 0;
            if ($totalNumderOfQuestions > 6) {
                //shuffle($questionArray);
                $questionsToBeDisplayed = $questionArray;
                $noOfTabs = 6;
            } elseif ($totalNumderOfQuestions < 6) {
                //shuffle($questionArray);
                $questionsToBeDisplayed = $questionArray;
                $noOfTabs = $count;
            }

           ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="wizard-container">
                        <div class="card wizard-card ct-wizard-orange" id="wizardProfile">



                                <div class="wizard-header">
                                    <h3>
                                        <b> <?php echo $specialization_name; ?></b><br>
                                        <small> Answer the following questions to the best of your knowledge</small>
                                    </h3>
                                </div>
                                <ul>


                                        <li><a href="#question" data-toggle="tab">Questions</a></li>


                                </ul>



                                <div class="tab-content">

                                    <?php

                                   $i=0;

                                    while($i < $noOfTabs) {

                                        if ($noOfTabs < 6) { ?>

                                         <h4 class="info-text" >
                                   <?php
                                   $y = $i + 1;
                                   echo $y."  .     ". $questionsToBeDisplayed[$i]; ?> <br> <br> <br>

                                             <input type="radio" id="answer<?php echo $i ?>" name="questionanswer[<?php echo $question_id[$i] ?>]" value="<?php echo $option_a[$i]; ?>" reqired> <?php echo $option_a[$i]; ?> </input>
                                             <br> <br> <br>
                                             <input type="radio" id="answer<?php echo $i ?>" name="questionanswer[<?php echo $question_id[$i] ?>]"
                                                    value="<?php echo $option_b[$i]; ?>" required> <?php echo $option_b[$i]; ?> </input>
                                             <br> <br> <br>
                                             <input type="radio" id="answer<?php echo $i ?>" name="questionanswer[<?php echo $question_id[$i] ?>]"
                                                    value="<?php echo $option_c[$i]; ?>" required> <?php echo $option_c[$i]; ?> </input>
                                             <br> <br> <br>
                                             <input type="radio" id="answer<?php echo $i ?>" name="questionanswer[<?php echo $question_id[$i] ?>]"
                                                    value="<?php echo $option_d[$i]; ?>" required> <?php echo $option_d[$i]; ?> </input>
                                             <br> <br> <br>

                                                <input type="hidden" value="<?php echo $question_id[$i];  ?>" name="question[<?php echo $question_id[$i];  ?>]" id="<?php echo $question_id[$i];  ?>" >
                                             <input type="hidden" value="<?php echo $x ?>" name="<?php echo "specialization".$x;  ?>" id="<?php echo $x;  ?>" >




                                         </h4>

                                           <?php


                                        } else { ?>
                                            <h4 class="info-text">
                                                <?php echo $questionArray[$questionsToBeDisplayed[$i]]; ?> <br> <br> <br>

                                                <input type="radio" id="answer<?php echo $i ?>" name="answer<?php echo $i ?>"
                                                       value="<?php echo $option_a[$i]; ?>"> <?php echo $option_a[$i]; ?> </input>
                                                <br> <br> <br>
                                                <input type="radio" id="answer<?php echo $i ?>" name="answer<?php echo $i ?>"
                                                       value="<?php echo $option_b[$i]; ?>"> <?php echo $option_b[$i]; ?> </input>
                                                <br> <br> <br>
                                                <input type="radio" id="answer<?php echo $i ?>" name="answer<?php echo $i ?>"
                                                       value="<?php echo $option_c[$i]; ?>"> <?php echo $option_c[$i]; ?> </input>
                                                <br> <br> <br>
                                                <input type="radio" id="answer<?php echo $i ?>" name="answer<?php echo $i ?>"
                                                       value="<?php echo $option_d[$i]; ?>"> <?php echo $option_d[$i]; ?> </input>
                                                <br> <br> <br>



                                            </h4>



                                     <?php   }
                                        $i++;  }




                                    ?>

                                </div>

                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                          <!--  <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' /> -->


                        </div>


                        <div class="clearfix"></div>
                    </div>




                </div>
            </div> <!-- wizard container -->
        </div>

    </div><!-- end row -->





    <?php



            } ?>


        </div> <!--  big container -->
            <div class="pull-right">
       <input type="submit" name="submit" value="submit" class="btn btn-finish btn-fill btn-warning btn-wd btn-lg" >
            </div>
        </form>


    </div>




    </body>

    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!--   plugins 	 -->
    <script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="js/jquery.validate.min.js"></script>

    <!--  methods for manipulating the wizard and the validation -->
    <script src="js/wizard.js"></script>

    </html>



<script type="text/javascript">
    $(document).ready(function()
    {
        $("#<?php echo $specialization_name; ?>").click(function()
        {
            var id=$(this).val();
            var dataString = 'id='+ id;

            $.ajax
            ({
                type: "POST",
                url: "ajaxaccount.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#accountnumber").html(html);
                }
            });

        });

    });
</script>


    <script type="text/javascript">
        submitForms = function() {
<?php
$select_specialization = "SELECT MAX(specialization_id) AS specialization_id FROM question";
$queryselect = mysqli_query($myConn, $select_specialization);
$rows = mysqli_fetch_array($queryselect,MYSQLI_BOTH);
$max_specilization = $rows['specialization_id'];
$y = 0;
for ($x = 1; $x<=$max_specilization; $x++) {
    $SQL = "SELECT * FROM specialization where id ='$x'";
    $results = mysqli_query($myConn, $SQL);
    $rowss = mysqli_fetch_array($results, MYSQLI_BOTH);

    $specialization_name = $rowss['specialization_name']; ?>

            document.forms["<?php echo $specialization_name; ?>"].submit();

            <?php }

?>


}


                </script>

