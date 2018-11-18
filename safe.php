<?php

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

for ($x = 1; $x<=$max_specilization; $x++) {


    $SQL = "SELECT * FROM specialization where id ='$x'";
    $results = mysqli_query($myConn, $SQL);
    $rowss = mysqli_fetch_array($results, MYSQLI_BOTH);
    $specialization_name = $rowss['specialization_name'];
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
    echo $specialization_name;
    echo "=>";
    echo $realfinalscore."%";

}


?>