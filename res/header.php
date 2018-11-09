<?php
require "session/session.php";
require "res/functions.php";
require "res/pensioner_class.php";


$Pensioners = new pensioner();

if(isset($_POST['sign-in-btn'])){
 	$Pensioners->signIn($_POST['login-email'], $_POST['login-password']);
 }
 if (isset($_POST['sign-up-btn'])) {
 	require "connect.php";
 	$image = addslashes($_FILES['image']['tmp_name']);
 	$image = mysqli_real_escape_string($conn, file_get_contents($image));
 	if (getImageSiz($image) == true) {
 		$Pensioners->signUp(generateRandomString(), $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['gradLevel'], $_POST['ministry'], $_POST['stateOforigin'], $_POST['phone'], $_POST['email'], $_POST['dateAppointment'], $_POST['dateRetire'], $_POST['password'], $image);
	}else{
		?>
		<script type="text/javascript">
			alert("Please Ensure Image size is 612px by 408px before verification");
		</script>
		<?php
 	 	}
	}
if (isset($_POST['sign-out-btn'])) {
 	$Pensioners->signOut();
 	 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>National Pensioners Board </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--// css -->
	<!-- font-awesome icons -->
	<link href="css/font-awesone.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //font-awesome icons -->
	<!-- font -->
	<link href="//fonts.googleapis.com/css?family=Righteous&subset=latin-ext" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
-->
  <script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/controls.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" style="color: #fff;text-transform: uppercase;" href="#"><img src="images/logo.jpg" height="25px" width="25px" />  Kogi State Pension Board</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">

	      <ul class="nav navbar-nav navbar-right">

	      	<?php
	      		if ($_SESSION == NULL) {
	      		?>

	      		<li><button  class = "btn-reg" data-toggle ="modal" data-target="#modalReg"><i class="fa fa-user-plus" style="padding-right:8px;"></i> Register</button></li>
	        <li><button class = "btn-reg" data-toggle ="modal" data-target="#modal-login"><i class="fa fa-sign-in" style="padding-right:8px;"></i> Login</button></li>

	      	<?php
	      		}
	      		else{
	      	?>
	      		<li><a href="profile.php"  class = "btn-reg"><i class="fa fa-user" style="padding-right:8px;"></i><?php echo $_SESSION['firstname'];?></a></li>
	        	<li><button class = "btn-reg" data-toggle ="modal" data-target="#modal-logout"><i class="fa fa-sign-out" style="padding-right:8px;"></i> Logout</button></li>


	        <?php
	      		}
	      	?>
	       	<li><a href="#"><i class="fa fa-info-circle" style="padding-right:8px;"></i> About </a></li>
	        <li><a href="#"><i class="fa fa-question-circle" style="padding-right:8px;"></i>Support</a></li>

	      </ul>

	    </div>
	  </div>
		</nav>
	</header>
<div class="modal fade" id="modalReg" role="dialog">
			<div class="modal-dialog">
	  			<div class="modal-content">
	   				 <div class="modal-header">
	     				<button type="button" class="close" data-dismiss="modal">&times;</button>
	      				<h4 class="modal-title">CREATE AN ACCOUNT</h4>
	      			</div>
	      				<div class="modal-body">
	      					<form method="post" role = "form" class="register-form" enctype="multipart/form-data">
	      						<div class="form-group">
	      							<input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required />
	      						</div>
	      						<div class="form-group">
	      							<input type="text" class="form-control" name = "lastname" placeholder="Enter Lastname or Surname" required/>
	      						</div>
	      						<div class="form-group">
	      							<input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" required/>

	      						</div>
	      						<div class="form-group">
	      							<input type="email" name="email" class="form-control" placeholder="example@email.com" required/>
	      						</div>
	      						<div class="form-group">
	      							<input type="text" name="phone" class="form-control" placeholder="09000112233" required/>
	      						</div>
	      						<div class="form-group">
	      							<input type="password" name="password" class="form-control" minlength="8" maxlength="30" placeholder="Enter Password" required/>
	      						</div>

	      						<div class = "form-group">
							<select class="form-control" name = "stateOforigin" required>
									<option>Select State of Origin</option>
									<option>Abia</option>
									<option>Adamawa</option>
									<option>Akwa Ibom</option>
									<option>Bauchi</option>
									<option>Bauchi</option>
									<option>Bayelsa</option>
									<option>Benue</option>
									<option>Borno</option>
									<option>Cross River</option>
									<option>Delta</option>
									<option>Ebonyi</option>
									<option>Enugu</option>
									<option>Edo</option>
									<option>Ekiti</option>
									<option>Gombe</option>
									<option>Imo</option>
									<option>Jigawa</option>
									<option>Kaduna</option>
									<option>Kano</option>
									<option>Kastina</option>
									<option>Kebbi</option>
									<option>Kogi</option>
									<option>Kwara</option>
									<option>Lagos</option>
									<option>Nasarawa</option>
									<option>Niger</option>
									<option>Ogun</option>
									<option>Ondo</option>
									<option>Osun</option>
									<option>Oyo</option>
									<option>Plateau</option>
									<option>Rivers</option>
									<option>Sokoto</option>
									<option>Taraba</option>
									<option>Yobe</option>
									<option>Zamfara</option>
									<option>FCT(Abuja)</option>

								</select>

						</div>
	      						<div class="form-group">
	      							<select class="form-control" name="ministry">
	      								<option>Select Ministry</option>
	      								<option>Ministry of Works and Housing</option>
	      								<option>Ministry of Education</option>
	      								<option>Ministry of Power</option>
	      								<option>Ministry of Transportation</option>
	      								<option>Ministry of Education and Youth Dev</option>
	      								<option>Ministry of Aviation</option>
	      								<option>Ministry of Petroleum Resources</option>
	      								<option>Ministry of Agricultre and Natural Resources</option>
	      								<option>Ministry of Commerce and Tourism</option>
	      								<option>Ministry of Defense</option>
	      								<option>Ministry of Information and Communications</option>
	      								<option>Ministry of Envrionment</option>
	      								<option>Ministry of Finance and Economic Development</option>
	      								<option>Ministry of Health and Social Services</option>
	      								<option>Ministry of Industries</option>
	      								<option>Ministry of Youth and Sport</option>
	      								<option>Ministry of Women Affairs and Social Development</option>
	      								<option>Ministry of Water Resources and Rural Development</option>
	      								<option>Ministry of Special Duties</option>
	      								<option>Ministry of Solid Minerals Development</option>
	      								<option>Ministry of Science and Technology</option>
	      								<option>Ministry of Power & Steel</option>
	      								<option>Ministry of Labour and Productivity </option>
	      								<option>Ministry of Justice</option>
	      								<option>Ministry of Internal Affairs</option>
	      								<option>Ministry of Culture Tourism and Natinal Orientation</option>
	      								<option>Ministry of Finance and Economic Development</option>
	      								<option>Ministry for   Capital Territory</option>
	      							</select>
	      						</div>
	      						<div class="form-group">
	      							<label>Grade level</label>
	      							<input type="text" name="gradLevel" class="form-control" placeholder="15 (Grade Level) / 4 (Step)" required/>
	      						</div>
	      						<div class="form-group">
	      							<label>Date of Appointment</label>
	      							<input type="date" class="form-control" name="dateAppointment"  required/>
	      						</div>
	      						<div class="form-group">
	      							<label>Date of Retirement</label>
	      							<input type="date" class="form-control" placeholder="Date of Retirement" name="dateRetire" required/>
	      						</div>
	      						<div class="form-group">
	      							<label>Upload Picture for Facial Biometric Validation (612px x 408px)</label>
	      							<input type="file" class="form-control" name="image"  accept="image/x-png, image/jpeg" required/>
	      						</div>
	      						<label class="checkbox-inline"><input type="checkbox" name="agree" />By clicking this you agree with all our terms and conditions</label><br>
	      						<button type="submit" name = "sign-up-btn" class="btn btn-primary btn-register">Sign Up</button>
	      					</form>
	      					<br>
	      					<br>

	      				</div>
	    			</div>
	    		</div>
	    	</div>

	      </div>

<div class="modal fade" id="modal-login" role="dialog">
			<div class="modal-dialog">
	  			<div class="modal-content">
	   				 <div class="modal-header">
	     				<button type="button" class="close" data-dismiss="modal">&times;</button>
	      				<h4 class="modal-title">LOG IN</h4>
	      				<div class="modal-body">
	      					<!-- <span class="text-danger error-message" style="font-weight:bold;" >Incorrect Email or Password</span>
 -->	      				<form method="post" role = "form" class="register-form">
	      						<div class="form-group">
	      							<input type="text" id = "login-email" class="form-control" name="login-email" placeholder="Enter Email" required />
	      						</div>
	      						<div class="form-group">
	      							<input type="password" id="login-password" class="form-control" name = "login-password" placeholder="Enter Password" required/>
	      						</div>
	      						<button type="submit" name = "sign-in-btn" id = "sign-in-btn" class="btn btn-primary btn-register">Sign In</button>
	      					</form>

	      					<br>
	      					<br>

	      				</div>
	    			</div>
	    		</div>
	    	</div>

	      </div>
	      <div class="modal fade" id="modal-logout" role="dialog">
	      			<div class="modal-dialog">
	      	  			<div class="modal-content">
	      	   				 <div class="modal-header">
	      	     				<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	      				<div class="modal-body">
	      	      					<!-- <span class="text-danger error-message" style="font-weight:bold;" >Incorrect Email or Password</span>
	       -->	      				<form method="post" role = "form" class="register-form">
	      	      						<h3 class="text-danger">Are you sure you want to Sign Out</h3>
	      	      						<button type="submit" name = "sign-out-btn" id = "sign-out-btn" class="btn btn-primary btn-register">Sign Out</button>
	      	      					</form>

	      	      					<br>
	      	      					<br>

	      	      				</div>
	      	    			</div>
	      	    		</div>
	      	    	</div>

	      	      </div>
