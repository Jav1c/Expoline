<?php
    session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "users";
    $conn = "";

    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    /*if($conn){
        echo"You are connected";
    }
    else{
        echo"Could not connect";
    }*/

?>