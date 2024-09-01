<?php 
	session_start();
	#DB Call
	include('./db-connect.php');
	//Gather POST data
	$email = $_POST['email_address'];

	//Generate OTP (Verification code
	// Function to generate a random password
	$length = 6;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$otp_code = '';
	for ($i = 0; $i < $length; $i++) {
		$otp_code .= $characters[rand(0, strlen($characters) - 1)];
	}

	//validate email field || must not be empty
	if(empty($email)){
		header('Location: ./auth-recoverpw.php?missing=true');
	}
	else{//$email is not empty
		//Check existing records
		$querycheck = "SELECT * FROM users WHERE email_address='$email'";
		$dbconnect; //declared in ./db-connect.php
		$result = mysqli_query($conn, $querycheck);
		if($result) {
			$usersdata = mysqli_fetch_array($result);

			
			#Validate 
			//Unmatching email (Email does not Exist)
			if ($email != $usersdata['email_address']) {
				//Redirect with error
				header('Location: ./auth-recoverpw.php?invalid-email=true');
			}
			else {

				//Update Verification code in the database
				
					$sql = "UPDATE users SET OTP = '$otp_code' WHERE email_address = '$email'";
					$dbconnect; //declared in ./db-connect.php
					$results = mysqli_query($conn,  $sql);

					if($results) {
					//send email to user (Email Exist)
					// $to = $usersdata['email_address'];
					// Send users an email
					$email_subject = "Password Reset - OTP:";
					$to = $email; // add client email
					$email_body = "Dear ".$usersdata['first_name']." ".$usersdata['last_name']."\n Here is your OTP ($verification_code) to verify your account.\nplease note that this code sent to you is valid for 1 hour.\nKind Regards\nTMTD technoloies Development Team";
					$headers = "From: no-reply@baleseng.co.za"; // Add your email
					mail($to, $email_subject, $email_body, $headers); //sends email


					//Successfully verified
					//Send users whatsapp message
					$whatsapp = "https://api.whatsapp.com/send/?phone=". $usersdata['phone_number'] . "&text=Hi ".$usersdata['first_name']." ".$usersdata['last_name'].", Here is your OTP ($verification_code) to verify your account...Kind Regards TDMD technologies Development Team.";
					
					header('Location: ./auth-OTP.php?email-verified=true&email_address='.$email.'&first_name='.$usersdata['first_name'].'');
					exit;
				}else {
					header('Location: ./auth-new-password.php?error='.mysqli_error($conn));
					exit;
				}
			}
		}	
		else {
			//Return database error
			header('Location: ./auth-recoverpw.php?error=' . mysqli_error($conn));
			exit;
		}
	}
?>