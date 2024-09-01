<?php
    // DB Connect
    include ('./db-connect.php');
    include ('./adminload.php');

    // POST data
    //$users_email = $_SESSION['email_address'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $id_number = $_POST['id_number'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $emp_code = $_POST['emp_code'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $profile_picture = "../assets/images/user/1.png";

    $password = generateRandomPassword(); // Generate a random password

    //encreption password
    $pass = md5($password);
    

  
    //Insert Agent data
    $queryaccount = "INSERT INTO users (first_name, last_name, id_number, email_address, phone_number, emp_code, gender, profile_picture, status,  password, user_role, date_created, registered_by) 
    VALUES ('$first_name', '$last_name', '$id_number', '$email_address', '$phone_number', '$emp_code',  '$gender', '$profile_picture', '$status', '$pass', '2', NOW(), '  $users_email_address')";


    $dbconnect; // declared in ./db-connect.php
    $resultAcc = mysqli_query($conn, $queryaccount);
    if ($resultAcc) {
        // Send admin an email
        $subject = "Welcome to All Marc Spares";
        $message = "Hi Admin $first_name $last_name; You are successfully registered as a user on All marc Spares as an Admin.\n\nHere are your login details in case you forget them. Use this credentials to log in. and please reset password via forgot password or login and change them under profile \nUse your email as username: $email_address\nTemporary Password: $password \n\nIf you have any queries regarding the login, kindly send an email to support@baleseng.co.za.\n\nKind Regards\n TMTD technologies Development Team";
        mail($email_address, $subject, $message);
        header('Location: ./index.php?successfully-registered=true&email_address=' . $email_address . '');
    } else {
        header('Location: ./page-add-users.php?error=' . mysqli_error($conn) . '');
    }

    // Function to generate a random password
    function generateRandomPassword($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
?>
