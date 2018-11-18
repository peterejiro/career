<?php
/**
 * Created by PhpStorm.
 * User: rOKz
 * Date: 10/17/2018
 * Time: 1:43 PM
 */

/**
 * Created by PhpStorm.
 * User: Oki-Peter Ejiroghene
 * Date: 5/12/2018
 * Time: 1:59 PM
 */


	$dbUsername="root";
	$psswd = "";
	$dbName = "career";
	$hostName = "localhost";
	$myConn = mysqli_connect($hostName,$dbUsername,$psswd,$dbName);
	if(!$myConn){
        die("Could not connect at the moment because ". mysqli_connect_error());
    }
?>