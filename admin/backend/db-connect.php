<?php 
    #Server Connection 
    $server = "localhost";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($server, $user, $pass);
    #DB Connection
    
    $dbconnect = mysqli_select_db($conn, 'baleseng');
?>