<?php 
session_start();
#DB Call
include('./db-connect.php');

//Gather POST data
$email_address = $_POST['email_address'];
$password = $_POST['password'];
$confirm_password = $_POST['r_password'];

if(empty($email_address) || empty($password)){
    header('Location: ./auth-new-password.php?missing=true me');
    exit;
} else {
    if($password == $confirm_password) {
        // Hash the new password (for security)
        $hashedPassword = md5($password);
        $email = $email_address; // Use the posted email address

        // Check existing records
        $querycheck = "SELECT * FROM users WHERE email_address='$email'";
        $result = mysqli_query($conn, $querycheck);

        if($result) {
            $usersdata = mysqli_fetch_array($result);

            // Update the password in the database
            $queryupdate = "UPDATE users SET password = '$hashedPassword' WHERE email_address = '$email'";
            $resultUpdate = mysqli_query($conn, $queryupdate);

            if ($resultUpdate) {
                header('Location: ./auth-sign-in.php?reset-password=true&email_address='.$email_address.'&otpR='.$usersdata['first_name']);
                exit;
            } else {
                header('Location: ./auth-new-password.php?reset-password=false fault&email_address='.$email_address.'&otpR='.$usersdata['first_name']);
                exit;
            }
        } else {
            header('Location: ./auth-new-password.php?resetpassword=false fault');
            exit;
        }
    } else {
        header('Location: ./auth-new-password.php?resetpassword=false fault-to-retrieve');
        exit;
    }
}
?>
