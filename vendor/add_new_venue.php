<?php
include("includes/connect.php");
include_once("image_handler.php");


$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
$category = addslashes(htmlentities($_POST["category"], ENT_QUOTES));
$city = addslashes(htmlentities($_POST["city"], ENT_QUOTES));
$location = addslashes(htmlentities($_POST["location"], ENT_QUOTES));
$opening_time = addslashes(htmlentities($_POST["opening_time"], ENT_QUOTES));
$closing_time = addslashes(htmlentities($_POST["closing_time"], ENT_QUOTES));
$rules = addslashes(htmlentities($_POST["rules"], ENT_QUOTES));
$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
$phone_number = addslashes(htmlentities($_POST["phone_number"], ENT_QUOTES));
$banner_image = saveImage($_FILES['banner_image']);
$owner_id = $_COOKIE['admin_id'];

$result = mysqli_query($link, "INSERT INTO `venues` (  `name` , `category` , `city` , `location` , `opening_time` , `closing_time` , `rules` , `email` , `phone_number` , `banner_image` , `owner_id` ) VALUES ( '" . $name . "' , '" . $category . "' , '" . $city . "' , '" . $location . "' , '" . $opening_time . "' , '" . $closing_time . "' , '" . $rules . "' , '" . $email . "' , '" . $phone_number . "' , '" . $banner_image . "' , '" . $owner_id . "') ");
$insert_id = mysqli_insert_id($link);

$amenities = $_POST['amenity'];

foreach ($amenities as $amenity) {
    mysqli_query($link, "INSERT INTO `venue_amenities` (`venue_id`,`amenity_id`) VALUES ('" . $insert_id . "' , '" . $amenity . "')");
}

header("location:" . "index.php");