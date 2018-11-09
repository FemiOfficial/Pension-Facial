<?php
include_once("functions.php");
	class pensioner
	{
		    var $pensinerID;
			var $firstname ;
			var $lastname ;
			var $middlename;
			var $gradeLevel;
			var $ministry;
			var $stateOforigin;
			var $phone;
			var $email;
			var $dateAppointment;
			var $dateRetire;
			var $password;
			var $image;


		// function __construct($pensinerID, $firstname, $lastname, $middlename, $gradeLevel, $ministry, $stateOforigin, $phone,$email, $dateAppointment, $dateRetire, $password){
		// 	$this->$pensinerID = $pensinerID;
		// 	$this->$firstname = $firstname;
		// 	$this->$lastname= 	$lastname;
		// 	$this->$middlename = $middlename;
		// 	$this->$gradeLevel = $gradeLevel;
		// 	$this->$ministry = $ministry;
		// 	$this->$stateOforigin = $stateOforigin;
		// 	$this->$phone = $phone;
		// 	$this->$email = $email;
		// 	$this->$dateAppointment = $dateAppointment;
		// 	$this->$dateRetire = $dateRetire;
		// 	$this->$password = $password;
		// }
		function getID(){
			return $this->$pensinerID;
		}
		function setID($newPensionerID){
			$this->$pensinerID = $newPensionerID;
		}
		function getFirstname(){
			return $this->$firstname;
		}
		function setFirstname($newFirstname){
			return $this->$firstname = $newFirstname;
		}
		function getLastname(){
			return $this->$lastname;
		}
		function setLastname($newLastname){
			return $this->$lastname = $newLastname;
		}
		function getMiddlename(){
			return $this->$middlename;
		}
		function setMiddlename($newMiddlename){
			return $this->$middlename = $newMiddlename;
		}
		function gradeLevel(){
			return $this->$gradeLevel;
		}
		function setgradeLevel($newgradeLevel){
			return $this->$gradeLevel = $newgradeLevel;
		}
		function getMinistry(){
			return $this->$ministry;
		}
		function setMinistry($newMinistry){
			return $this->$ministry = $newMinistry;
		}
		function getStateofOrigin(){
			return $this->$stateOforigin;
		}
		function setStateofOrigin($newStateofOrigin){
			return $this->$stateOforigin = $newStateofOrigin;
		}
		function getPhone(){
			return $this->$phone;
		}
		function setPhone($newPhone){
			return $this->$phone = $newPhone;
		}
		function getEmail(){
			return $this->$email;
		}
		function setEmail($newEmail){
			return $this->$email = $newEmail;
		}
		function getdateAppointment(){
			return $this->$dateAppointment;
		}
		function setdateAppointment($newdateAppointment){
			return $this->$dateAppointment = $newdateAppointment;
		}
		function getdateRetire(){
			return $this->$dateRetire;
		}
		function setdateRetire($newdateRetire){
			return $this->$dateRetire = $newdateRetire;
		}
		function getPassword(){
			return $this->$password;
		}
		function setPassword($newPassword){
			return $this->$password = $newPassword;
		}
		
		function signUp($pensinerID, $firstname, $lastname, $middlename, $gradeLevel, $ministry, $stateOforigin, $phone,$email, $dateAppointment, $dateRetire, $pasword, $image)
		{
			require "connect.php";
			$sql = "INSERT INTO pensioners (id, firstname, lastname, middlename, phone, gradeLevel, stateOforigin, email, password, dateAppointment, dateRetirement, ministry, dateRegister, image)
			VALUES ('$pensinerID','$firstname', '$lastname', '$middlename', '$phone', '$gradeLevel', '$stateOforigin', '$email', '$pasword', '$dateAppointment', '$dateRetire', '$ministry', now(), '$image') ";
			
				$result = mysqli_query($conn, $sql);
				if($result){
					echo "<script>window.open('regNotifier.php', '_self')</script>";
						}
				else{
					echo "<script>alert('Unsuccessful Registration')</script>";
					
				}

		}
		function signIn($email, $pasword){
			require "connect.php";
			$sql = "SELECT * FROM pensioners WHERE email = '$email' AND password = '$pasword'";
			$result = mysqli_query($conn, $sql);
			$check_user = mysqli_num_rows($result);


			if($check_user > 0 ){
				
				$row = mysqli_fetch_array($result);
				$_SESSION['login-status'] = true;
				$_SESSION['firstname'] = $row["firstname"];
				$_SESSION['id'] = $row["id"];
				
				echo "<script>window.open('profile.php', '_self')</script>";
				}
			else{
				?>
				<script type="text/javascript">
				alert("Incorrect Username or Password");					
				</script>
	<?php
			}
		}
		function signOut(){
				session_destroy();
				header('location: index.php');
	
		}

	}
?>