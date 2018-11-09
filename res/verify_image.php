<?php
require "session.php";
include_once("connect.php");
include "Kairos.php";

$id = $_SESSION['id'];
$Kairos = new Kairos('05321084', 'c03abc685a57288d2cfb9c129cc15edb');
$fetch = mysqli_query($conn, "SELECT * FROM `pensioners` WHERE id = '$id'");
$row = mysqli_fetch_array($fetch);

$actual_image = base64_encode($row["image"]);
$image       = $actual_image;
$subject_id = 'femi';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);

$respons   = $Kairos->enroll($argumentArray);


$imageURL = $_GET["image"];
$image       = $imageURL;
$subject_id = 'elizabeth';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);
$response   = $Kairos->verify($argumentArray);
echo $response;
?>



?>
