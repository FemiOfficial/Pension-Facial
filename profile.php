<?php
include_once("res/header.php");
include_once("res/connect.php");
if($_SESSION == NULL){
	header("location:index.php");
}
else{
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM pensioners WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);
	$check_user = mysqli_num_rows($result);
	if($check_user > 0 ){	
		$row = mysqli_fetch_array($result);
		$firstname= $row["firstname"];
		$lastname= $row["lastname"];
		$middlename = $row["middlename"];

	
	}
}				

?>
<div class="container-fluid profile-page">
	<div class="col-md-3 sidebar">
		<div class="profile-pic">
			<img src="images/profile-pic.png" width="100" height="100" />
			<h4 style="text-transform: uppercase;"><?php echo $firstname . " " . $lastname;?></h4>
		</div>	
		<div class="sidebar-main">
			<h5 style="color: #6dcfd5; margin: 10px 0;">Main</h5>
			<ul class="nav-links">
				<div class="nav-links-items" id="home-nav">
					<li><a><i class="fa fa-home" style="padding-right: 15px;"></i>HOME</a></li>	
				</div>
				<div class="nav-links-items" id = "profile-nav">
					<li><a><i class="fa fa-user-circle" style="padding-right: 15px;"></i>PROFILE</a></li>
				</div>
				<div class="nav-links-items" id="summary-nav">
					<li><a><i class="fa fa-list-alt" style="padding-right: 15px;"></i>PENSION HISTORY</a></li>				
				</div>
			</ul>
			
		</div>
		<div class="sidebar-admin">
			<h5 style="color: #6dcfd5; margin: 10px 0;">Admin</h5>
			<ul class="nav-links">
				<div class="nav-links-items" id = "biometric-nav">
					<li><a><i class="fa fa-bell" style="padding-right: 15px;"></i>BIOMETRIC HISTORY</a></li>
				</div>
				<div class="nav-links-items" id="pending-nav">
					<li><a><i class="fa fa-spinner" style="padding-right: 15px;"></i>PENDING PAYMENT</a></li>
				</div>
				<div class="nav-links-items" id="notify-nav">				
					<li><a><i class="fa fa-envelope" style="padding-right: 15px;"></i>NOTIFICATIONS</a></li>
				</div>				
			
			</ul>	
		</div>
		<div class="sidebar-tags">
			
		</div>

	</div>
	<div class="col-md-9 mainpage">
		<div class="alert alert-danger alert-dismissable" id = "alert">
			<h3 style="float: left; padding-right: 100px;">Biometric Verification Pending, Please Validate Now</h3>
			<div class="header-mainpage-verify-btn" style="display: inline-block;margin-top: 18px;">
				<a class="btn btn-danger" href="rekognize.php">VERIFY</a>
				<button class="btn btn-default" id ="btn-cancel-notice">CANCEL</button>
			</div>	
		</div>
		<div class="mainpage-nav">
			<ul class="mainpage-navbar">
				<div class="mainpage-nav-item active">
					<li><a id="profile-top-nav">PROFILE DETAILS</a></li>				
				</div>
				<!-- <div class="mainpage-nav-item">
					<li><a id="summary-top-nav">SUMMARY</a></li>					
				</div>
				<div class="mainpage-nav-item">
					<li><a id="activity-top-nav">ACTIVITY</a></li>					
				</div> -->
			</ul>
		</div>
		<div class="container mainpage-content">
			<?php
				include 'res/home.php';
				include 'res/biometric-history.php';
				include 'res/profile-summary.php';
				include 'res/pension-summary.php';
			?>	
		</div>
			
			
		</div>
	</div>
<?php
include_once("res/footer.php")
?>