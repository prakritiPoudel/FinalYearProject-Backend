<?php
include("includes/connect.php");

$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];



function saveImage($file)
{
	$file_name = $file['name'];
	$file_tmp_name = $file['tmp_name'];
	$random_name = rand(1000, 1000000) . "-" . $file_name;
	$file_upload_name = $random_name;
	$file_upload_name = preg_replace('/\s+/', '-', $file_upload_name);

	if (move_uploaded_file($file_tmp_name, '../media/' . $file_upload_name)) {
		return $file_upload_name;
	} else {
		return "";
	}
}




if ($cat == "amenities" || $cat_get == "amenities") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));


	if ($act == "add") {
		$icon = saveImage($_FILES['icon']);
		mysqli_query($link, "INSERT INTO `amenities` (  `name` , `icon`) VALUES ( '" . $name . "' , '" . $icon . "' ) ");
	} elseif ($act == "edit") {
		if ($_FILES['icon']['name'] != "") {
			$icon = saveImage($_FILES['icon']);
			mysqli_query($link, "UPDATE `amenities` SET  `name` =  '" . $name . "' , `icon` =  '" . $icon . "'  WHERE `id` = '" . $id . "' ");
		} else {
			mysqli_query($link, "UPDATE `amenities` SET  `name` =  '" . $name . "' WHERE `id` = '" . $id . "' ");
		}
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `amenities` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "amenities.php");
}

if ($cat == "banners" || $cat_get == "banners") {
	if ($act == "add") {
		$banner = saveImage($_FILES['banner']);
		mysqli_query($link, "INSERT INTO `banners` (  `banner`) VALUES ( '" . $banner . "') ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `banners` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "banners.php");
}

if ($cat == "booking_slots" || $cat_get == "booking_slots") {
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
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

if ($cat == "categories" || $cat_get == "categories") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));


	if ($act == "add") {
		$icon = saveImage($_FILES['icon']);
		mysqli_query($link, "INSERT INTO `categories` (  `name` , `icon` , `description` ) VALUES ( '" . $name . "' , '" . $icon . "' , '" . $description . "'  ) ");
	} elseif ($act == "edit") {

		if ($_FILES['icon']['name'] != "") {
			$icon = saveImage($_FILES['icon']);
			mysqli_query($link, "UPDATE `categories` SET  `name` =  '" . $name . "' , `icon` =  '" . $icon . "' , `description` =  '" . $description . "' WHERE `id` = '" . $id . "' ");

		} else {
			mysqli_query($link, "UPDATE `categories` SET  `name` =  '" . $name . "' , `description` =  '" . $description . "' WHERE `id` = '" . $id . "' ");

		}



	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `categories` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "categories.php");
}

if ($cat == "cities" || $cat_get == "cities") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `cities` (  `name`) VALUES ( '" . $name . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `cities` SET  `name` =  '" . $name . "' WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `cities` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "cities.php");
}

if ($cat == "fav_venue" || $cat_get == "fav_venue") {
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
	$owner_id = addslashes(htmlentities($_POST["owner_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `fav_venue` (  `venue_id` , `owner_id` , `created_at` ) VALUES ( '" . $venue_id . "' , '" . $owner_id . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `fav_venue` SET  `venue_id` =  '" . $venue_id . "' , `owner_id` =  '" . $owner_id . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `fav_venue` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "fav_venue.php");
}

if ($cat == "payments" || $cat_get == "payments") {
	$amount = addslashes(htmlentities($_POST["amount"], ENT_QUOTES));
	$transaction_id = addslashes(htmlentities($_POST["transaction_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `payments` (  `amount` , `transaction_id` , `user_id` , `venue_id` , `created_at` , `updated_at` ) VALUES ( '" . $amount . "' , '" . $transaction_id . "' , '" . $user_id . "' , '" . $venue_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `payments` SET  `amount` =  '" . $amount . "' , `transaction_id` =  '" . $transaction_id . "' , `user_id` =  '" . $user_id . "' , `venue_id` =  '" . $venue_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `payments` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "payments.php");
}

if ($cat == "profile" || $cat_get == "profile") {
	$username = addslashes(htmlentities($_POST["username"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$full_name = addslashes(htmlentities($_POST["full_name"], ENT_QUOTES));
	$phone_no = addslashes(htmlentities($_POST["phone_no"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$gender = addslashes(htmlentities($_POST["gender"], ENT_QUOTES));
	$type = addslashes(htmlentities($_POST["type"], ENT_QUOTES));
	$profile_picture = addslashes(htmlentities($_POST["profile_picture"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `profile` (  `username` , `email` , `full_name` , `phone_no` , `password` , `gender` , `type` , `profile_picture` , `created_at` , `updated_at` ) VALUES ( '" . $username . "' , '" . $email . "' , '" . $full_name . "' , '" . $phone_no . "' , '" . md5($password) . "', '" . $gender . "' , '" . $type . "' , '" . $profile_picture . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `profile` SET  `username` =  '" . $username . "' , `email` =  '" . $email . "' , `full_name` =  '" . $full_name . "' , `phone_no` =  '" . $phone_no . "' , `gender` =  '" . $gender . "' , `type` =  '" . $type . "' , `profile_picture` =  '" . $profile_picture . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `profile` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "profile.php");
}

if ($cat == "ratings_reviews" || $cat_get == "ratings_reviews") {
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$rating = addslashes(htmlentities($_POST["rating"], ENT_QUOTES));
	$review = addslashes(htmlentities($_POST["review"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `ratings_reviews` (  `venue_id` , `user_id` , `rating` , `review` , `created_at` ) VALUES ( '" . $venue_id . "' , '" . $user_id . "' , '" . $rating . "' , '" . $review . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `ratings_reviews` SET  `venue_id` =  '" . $venue_id . "' , `user_id` =  '" . $user_id . "' , `rating` =  '" . $rating . "' , `review` =  '" . $review . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `ratings_reviews` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "ratings_reviews.php");
}

if ($cat == "tokens" || $cat_get == "tokens") {
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$otp_code = addslashes(htmlentities($_POST["otp_code"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `tokens` (  `email` , `otp_code` , `created_at` ) VALUES ( '" . $email . "' , '" . $otp_code . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `tokens` SET  `email` =  '" . $email . "' , `otp_code` =  '" . $otp_code . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `tokens` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "tokens.php");
}

if ($cat == "users" || $cat_get == "users") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$role = addslashes(htmlentities($_POST["role"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `users` (  `name` , `email` , `password` , `role` ) VALUES ( '" . $name . "' , '" . $email . "' , '" . md5($password) . "', '" . $role . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `users` SET  `name` =  '" . $name . "' , `email` =  '" . $email . "' , `role` =  '" . $role . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `users` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "users.php");
}

if ($cat == "venue_amenities" || $cat_get == "venue_amenities") {
	$venue_id = addslashes(htmlentities($_POST["venue_id"], ENT_QUOTES));
	$amenity_id = addslashes(htmlentities($_POST["amenity_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `venue_amenities` (  `venue_id` , `amenity_id` , `created_at` ) VALUES ( '" . $venue_id . "' , '" . $amenity_id . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `venue_amenities` SET  `venue_id` =  '" . $venue_id . "' , `amenity_id` =  '" . $amenity_id . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `venue_amenities` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "venue_amenities.php");
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
	$banner_image = addslashes(htmlentities($_POST["banner_image"], ENT_QUOTES));
	$owner_id = addslashes(htmlentities($_POST["owner_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `venues` (  `name` , `category` , `city` , `location` , `opening_time` , `closing_time` , `rules` , `email` , `phone_number` , `banner_image` , `owner_id` , `created_at` , `updated_at` ) VALUES ( '" . $name . "' , '" . $category . "' , '" . $city . "' , '" . $location . "' , '" . $opening_time . "' , '" . $closing_time . "' , '" . $rules . "' , '" . $email . "' , '" . $phone_number . "' , '" . $banner_image . "' , '" . $owner_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `venues` SET  `name` =  '" . $name . "' , `category` =  '" . $category . "' , `city` =  '" . $city . "' , `location` =  '" . $location . "' , `opening_time` =  '" . $opening_time . "' , `closing_time` =  '" . $closing_time . "' , `rules` =  '" . $rules . "' , `email` =  '" . $email . "' , `phone_number` =  '" . $phone_number . "' , `banner_image` =  '" . $banner_image . "' , `owner_id` =  '" . $owner_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `venues` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "venues.php");
}
?>