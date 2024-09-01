<?php
    session_start();
    #DB Call
    include('./db-connect.php');
    if(isset($_SESSION['email_address'])){

        $users_email = $_SESSION['email_address'];
        $querycheck = "SELECT * FROM users WHERE email_address='$users_email'";
		$dbconnect; //declared in ../account/db-connect.php
		$result = mysqli_query($conn, $querycheck);
		if ($result) {
            //Fetch data from users table
			$usersdata = mysqli_fetch_array($result);
            $user_id = $usersdata['id'];
            $users_fname = $usersdata['first_name'];
            $users_lname = $usersdata['last_name'];
            $users_user_role = $usersdata['user_role'];
            $users_email_address = $usersdata['email_address'];
            $users_id_number = $usersdata['id_number'];
            $users_gender= $usersdata['gender'];
            $users_phone_number=$usersdata['phone_number'];
            $users_emp_code= $usersdata['emp_code'];
            $users_password = $usersdata['password'];
            $users_profile_picture = $usersdata['profile_picture'];
           

            $queryrole = "SELECT * FROM user_role WHERE id='$users_user_role'";
            $dbconnect; //declared in ../account/db-connect.php
            $resultrole = mysqli_query($conn, $queryrole);
            if ($resultrole) {
                //Fetch data from users table
                $roledata = mysqli_fetch_array($resultrole);
                $users_role_name = $roledata['user_description'];
            }
        }
    }else{
        header('Location: ./auth-sign-in.php?unauthorised=true session expired');
        exit;
    }

?>