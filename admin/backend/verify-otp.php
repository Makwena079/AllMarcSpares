<?php 
// DB Connect
include('./db-connect.php');

$email_address = $_POST['email_address'];
$otp_code = $_POST['otp_code'];

// Validate OTP code field - must not be empty
if (empty($otp_code)) {
    header('Location: ./auth-otp.php?missing=true&email_address=' . urlencode($email_address));
    exit;
} else {
    // Check existing records
    $querycheck = "SELECT * FROM users WHERE email_address='$email_address'";
    $result = mysqli_query($conn, $querycheck);

    if ($result) {
        $usersdata = mysqli_fetch_array($result);

        if ($usersdata) {
            $temp_otp = $usersdata['otp'];
            $first_name = $usersdata['first_name'];

            // Validate OTP
            if ($temp_otp != $otp_code) {
                // Redirect with error
                //header('Location: ./auth-otp.php?invalid-code=true&email_address=' . urlencode($email_address) . '&otpR=' . urlencode($first_name));
                header('Location: ./auth-OTP.php?invalid-code=true&email_address='.$email_address.'&first_name='.$usersdata['first_name'].'');
                exit;
            } else {
                // OTP is correct
               // header('Location: ./auth-new-password.php?code-verified=true&email_address=' . urlencode($email_address) . '&otpR=' . urlencode($first_name));
                header('Location: ./auth-new-password.php?code-verified=true&email_address='.$email_address.'&first_name='.$usersdata['first_name'].'');
                exit;
            }
        } else {
            // No user found
            //header('Location: ./auth-otp.php?error=true&email_address=' . urlencode($email_address));
            header('Location: ./auth-OTP.php?error=true&email_address='.$email_address.'&first_name='.$usersdata['first_name'].'');
            exit;
        }
    } else {
        // Return database error
       // header('Location: ./auth-otp.php?error=true&email_address=' . urlencode($email_address) . '&dberror=' . urlencode(mysqli_error($conn)));
        header('Location: ./auth-OTP.php?error=true&email_address='.$email_address.'&first_name='.$usersdata['first_name'].'');
        exit;
    }
}

// Close the database connection
mysqli_close($conn);
?>
