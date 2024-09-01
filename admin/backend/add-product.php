<?php
    // DB Connect
    include ('./db-connect.php');
    //adminload
    include ('./adminload.php');

    // POST data
    //$users_email = $_SESSION['email_address'];
    $p_name = $_POST['p_name'];
    $p_code = $_POST['p_code'];
    $brand_name = $_POST['brand_name'];
    $c_type = $_POST['c_type'];
    $p_price = $_POST['p_price'];
    $p_picture = $_POST['p_picture'];
    $p_description = $_POST['p_description'];
 
 

  
    //Insert Agent data
    $queryProduct = "INSERT INTO products (p_name, p_code, brand_name, c_type, p_price, p_picture, p_description, date_created, created_by) 
    VALUES ('$p_name', '$p_code', '$brand_name', '$c_type', '$p_price', '$p_picture', '$p_description', NOW(), '$users_email_address')";


    $dbconnect; // declared in ./db-connect.php
    $resultAcc = mysqli_query($conn, $queryProduct);
    if ($resultAcc) {
       
        header('Location: ./page-add-product.php?category-added=true&email_address=' . $users_email_address . '');
    } else {
        header('Location: ./page-add-product.php?error=' . mysqli_error($conn) . '');
    }

   
?>
