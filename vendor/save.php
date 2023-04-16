<?php
include("includes/connect.php");
include_once("image_handler.php");
$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];


if ($cat == "booking_slots" || $cat_get == "booking_slots") {
	$admin_id = $_COOKIE['admin_id'];
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $admin_id");
	$row = mysqli_fetch_array($query);
	$venue_id = $row['id'];
	$begin_time = addslashes(htmlentities($_POST["begin_time"], ENT_QUOTES));
	$end_time = addslashes(htmlentities($_POST["end_time"], ENT_QUOTES));
	$capacity = addslashes(htmlentities($_POST["capacity"], ENT_QUOTES));
	$price = addslashes(htmlentities($_POST["price"], ENT_QUOTES));
	$discount = addslashes(htmlentities($_POST["discount"], ENT_QUOTES));
	$message = addslashes(htmlentities($_POST["message"], ENT_QUOTES));
	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `booking_slots` (  `venue_id` , `begin_time` , `end_time` , `capacity` , `price` , `discount` , `message` ) VALUES ( '" . $venue_id . "' , '" . $begin_time . "' , '" . $end_time . "' , '" . $capacity . "' , '" . $price . "' , '" . $discount . "' , '" . $message . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `booking_slots` SET  `venue_id` =  '" . $venue_id . "' , `begin_time` =  '" . $begin_time . "' , `end_time` =  '" . $end_time . "' , `capacity` =  '" . $capacity . "' , `price` =  '" . $price . "' , `discount` =  '" . $discount . "' , `message` =  '" . $message . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `booking_slots` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "booking_slots.php");
}

if ($cat == "bookings" || $cat_get == "bookings") {
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
	$slot_id = addslashes(htmlentities($_POST["slot_id"], ENT_QUOTES));
	$quantity = addslashes(htmlentities($_POST["quantity"], ENT_QUOTES));
	$booked_date = addslashes(htmlentities($_POST["booked_date"], ENT_QUOTES));
	$payment_id = addslashes(htmlentities($_POST["payment_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `bookings` (  `venue_id` , `slot_id` , `quantity` , `booked_date` , `payment_id` , `user_id` , `created_at` , `updated_at` ) VALUES ( '" . $venue_id . "' , '" . $slot_id . "' , '" . $quantity . "' , '" . $booked_date . "' , '" . $payment_id . "' , '" . $user_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `bookings` SET  `venue_id` =  '" . $venue_id . "' , `slot_id` =  '" . $slot_id . "' , `quantity` =  '" . $quantity . "' , `booked_date` =  '" . $booked_date . "' , `payment_id` =  '" . $payment_id . "' , `user_id` =  '" . $user_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `bookings` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "bookings.php");
}


if ($cat == "venues" || $cat_get == "venues") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$category = addslashes(htmlentities($_POST["category"], ENT_QUOTES));
	$city = addslashes(htmlentities($_POST["city"], ENT_QUOTES));
	$location = addslashes(htmlentities($_POST["location"], ENT_QUOTES));
	$opening_time = addslashes(htmlentities($_POST["opening_time"], ENT_QUOTES));
	$closing_time = addslashes(htmlentities($_POST["closing_time"], ENT_QUOTES));
	$rules = addslashes(htmlentities($_POST["rules"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$phone_number = addslashes(htmlentities($_POST["phone_number"], ENT_QUOTES));
	$banner_image = saveImage($_FILES["banner_image"]) ?? "";


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `venues` (  `name` , `category` , `city` , `location` , `opening_time` , `closing_time` , `rules` , `email` , `phone_number` , `banner_image` , `owner_id` ) VALUES ( '" . $name . "' , '" . $category . "' , '" . $city . "' , '" . $location . "' , '" . $opening_time . "' , '" . $closing_time . "' , '" . $rules . "' , '" . $email . "' , '" . $phone_number . "' , '" . $banner_image . "' , '" . $owner_id . "' ) ");
	} elseif ($act == "edit") {
		if ($banner_image == "") {
			mysqli_query($link, "UPDATE `venues` SET  `name` =  '" . $name . "' , `category` =  '" . $category . "' , `city` =  '" . $city . "' , `location` =  '" . $location . "' , `opening_time` =  '" . $opening_time . "' , `closing_time` =  '" . $closing_time . "' , `rules` =  '" . $rules . "' , `email` =  '" . $email . "' , `phone_number` =  '" . $phone_number . "'  WHERE `id` = '" . $id . "' ");

		} else {

			mysqli_query($link, "UPDATE `venues` SET  `name` =  '" . $name . "' , `category` =  '" . $category . "' , `city` =  '" . $city . "' , `location` =  '" . $location . "' , `opening_time` =  '" . $opening_time . "' , `closing_time` =  '" . $closing_time . "' , `rules` =  '" . $rules . "' , `email` =  '" . $email . "' , `phone_number` =  '" . $phone_number . "' , `banner_image` =  '" . $banner_image . "'  WHERE `id` = '" . $id . "' ");
		}

		$amenities = $_POST['amenity'];
		mysqli_query($link, "DELETE FROM venue_amenities WHERE venue_id=$id");

		foreach ($amenities as $amenity) {
			mysqli_query($link, "INSERT INTO `venue_amenities` (`venue_id`,`amenity_id`) VALUES ('" . $id . "' , '" . $amenity . "')");
		}
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `venues` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "home.php");
}
?>