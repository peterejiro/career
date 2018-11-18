




<?php
//error_reporting(0);
include ("connection.php");
if(isset($_POST['login'])){
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($myConn, $sql);
    $row=  mysqli_fetch_array($result, MYSQLI_BOTH);
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $rows = mysqli_num_rows($result);

    if ($rows == 1){

        $_SESSION['username'] = $username;
        $username = $_SESSION['username'];

        ?>
        <script type="text/javascript">
                window.location = "assessment";
        </script>
        <?php
    }
    else{?>

       <script type="text/javascript">

                alert("Invalid username or Password");
                window.location = "login";


        </script>


    <?php }

}


?>


<?php
if(isset($_POST['register'])) {
    $username = mysqli_escape_string($myConn, $_POST['username']);
    $password = mysqli_escape_string($myConn, $_POST['password']);

    $first_name = mysqli_escape_string($myConn, $_POST['firstname']);
    $last_name = mysqli_escape_string($myConn, $_POST['lastname']);



    $query_code = "SELECT * FROM user WHERE username ='{$username}' ";
    $result_login = mysqli_query($myConn, $query_code);
    $anything_found = mysqli_num_rows($result_login);

    if ($anything_found > 0) { ?>
        <script type="text/javascript">
            alert("User Already Exists");
            window.location = "login";
        </script>

        <?php
        die();
        ?>
    <?php }
    else {

        $add = "INSERT INTO user (username, password, first_name, last_name)
										 VALUES('$username', '$password', '$first_name', '$last_name')";

        if ($myConn->query($add) === TRUE) { ?>

            <script type="text/javascript">
                alert("New Account Created Successfully");
                window.location = "login";
            </script>
        <?php } else {
            echo "Error: " . $add . "<br>" . $myConn->error;
        }
    }
}

?>