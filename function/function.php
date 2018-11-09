<?php

function signUpbuyer(){			
			require 'res/connect.php';
		
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$phone = $_POST['phone'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$con_password = $_POST['con-password'];
			
				$sql = "INSERT INTO users (firstname, lastname, middlename, , city, email, password, RegDate)
			VALUES ('$firstname', '$lastname', '$phone', '$state', '$city', '$email', '$password', now()) ";
				$result = mysqli_query($conn, $sql);

				if($result){
					echo "<script>window.open('regNotification.php', '_self')</script>";
						}
				else{
					echo "<script>alert('Unsuccessful Registration')</script>";
					
				}
			
						
		}


?>