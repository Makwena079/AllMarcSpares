<?php 
	session_start();
	#DB Call
	include('./db-connect.php');
	//Gather POST data
	$email = $_POST['email_address'];
	$password = md5($_POST['password']);

	if(empty($password) OR empty($email)){
		header('Location: ../?missing=true');
	}
	else{
		//Check exising records
		$querycheck = "SELECT * FROM users WHERE email_address='$email'";
		$dbconnect; //declared in ./db-connect.php
		$result = mysqli_query($conn, $querycheck);
		if ($result) {
			$usersdata = mysqli_fetch_array($result);
			#Validate 
		
			//Unmatching email
			if ($email != $usersdata['email_address']) {
				//Redirect with error
				header('Location: ./auth-sign-in.php?invalid-email=true');
			}
			else if ($password != $usersdata['password']) {
				//Return error with email
				header('Location: ./auth-sign-in.php?invalid-password=true&email_address='.$email.'');
			}
			else {
				$_SESSION['email_address'] = $email;
				echo "<script type = \"text/javascript\">
					window.location.href = \"./index.php?login-successfully=true&first_name=".$usersdata['first_name']."\";
				</script>";
			}
		
		}	
		else {
			//Return database error
			header('Location: ../?error=' . mysqli_error($conn));
		}
	}
?>