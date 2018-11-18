<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])){
    header("location:dashboard");
}
elseif(isset($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];



    $id=$_POST['id'];
    $SQL = "SELECT * FROM beneficiary WHERE user_id = '$user_id' and account_number = '$id'";
    $result = mysqli_query($myConn,$SQL);
    while($row = mysqli_fetch_assoc($result)){
        $account_number = $row['account_number'];
        ?>


        <option value ="<?php echo $account_number;?>" selected> <?php echo $account_number; ?> </option>
    <?php }

}else {
    header("location:page-404");
    exit;
} ?>
