<?php
    // DB Connect 
    include ('./db-connect.php');
    //adminload
    include ('./adminload.php');

    // POST data
    //$users_email = $_SESSION['email_address'];
    $c_name = $_POST['c_name'];
    $c_picture = $_POST['c_pic'];
    $c_code = $_POST['c_code'];
 

  
    //Insert Agent data
    $queryaccount = "INSERT INTO category (c_name, c_picture, c_code, date_created, created_by) 
    VALUES ('$c_name', '$c_picture', '$c_code', NOW(), '$users_email_address')";


    $dbconnect; // declared in ./db-connect.php
    $resultAcc = mysqli_query($conn, $queryaccount);
    if ($resultAcc) {
       
        header('Location: ./page-add-category.php?category-added=true&email_address=' . $users_email_address . '');
    } else {
        header('Location: ./page-add-category.php?error=' . mysqli_error($conn) . '');
    }

   
?>
