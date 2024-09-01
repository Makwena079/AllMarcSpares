<?php
// DB Connect
include('./db-connect.php');
//include('./adminload.php');

// POST data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$id_number = $_POST['id_number'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$emp_code = $_POST['emp_code'];
$password = $_POST['password'];
$r_password = $_POST['r_password'];
$profile_picture = $_POST['profile_picture'];

if ($password === $r_password) {
    // Hash the new password (for security)
    $hashedPassword = md5($password);
 

    // Check existing records
    $querycheck = "SELECT * FROM users WHERE email_address='$email_address'";
    $result = mysqli_query($conn, $querycheck);

    if ($result) {
        // Prepare the update query
        $queryupdate = "UPDATE users 
        SET 
            first_name = '$first_name', 
            last_name = '$last_name',
            email_address = '$email_address', 
            id_number = '$id_number', 
            phone_number = '$phone_number',  
            emp_code = '$emp_code',
            password = '$hashedPassword',
            profile_picture = '$profile_picture',
            date_modified = NOW()
        WHERE email_address = '$email_address'";

        $result = mysqli_query($conn,  $queryupdate);

        if ( $result) {
            header('Location: ./profile.php?profile-modified=true&email_address=' . urlencode($email_address));
        } else {
            header('Location: ./profile.php?profile-modified=false&email_address=' . urlencode($email_address));
        }
    } else {
        header('Location: ./profile.php?connection=failed&email_address=' . urlencode($email_address));
    }
} else {
    echo "<script type=\"text/javascript\">
        window.location.href = \"./profile.php?password-not-matching=true&email_address=" . urlencode($email_address) . "\";
    </script>";
}

mysqli_close($conn);
?>
