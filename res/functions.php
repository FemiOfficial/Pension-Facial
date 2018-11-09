<?php
	function generateRandomString($length = 11) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$charactersLength = strlen($characters);
    		$randomString = '';
    		for ($i = 0; $i < $length; $i++) {
        		$randomString .= $characters[rand(0, $charactersLength - 1)];
    		}
    		return $randomString;
  }
  function getImageSiz($image){
  	require "connect.php";
  	$fileinfo = getimagesize($_FILES['image']['tmp_name']);
  	$filewidth = $fileinfo[0];
  	$fileheight = $fileinfo[1];			 
  	$image = addslashes($_FILES['image']['tmp_name']);
  	$name = addslashes($_FILES['image']['name']);
  	$image = mysqli_real_escape_string($conn, file_get_contents($image));
	
	if($filewidth != "612" && $fileheight != "408"){
  		return false;
  	}else{
  		return true;
  	}
  }
?>


