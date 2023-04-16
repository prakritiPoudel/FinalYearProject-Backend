<?php
include("includes/connect.php");

$admin_email = mysqli_real_escape_string($link, $_POST['email']);
$admin_pass = sha1($_POST['password']);
$auth = 'vendor_in';

$query = mysqli_query($link, "SELECT * FROM profile WHERE email = '" . $admin_email . "' AND password = '" . $admin_pass . "' AND type='vendor'");
if (mysqli_affected_rows($link) == 0) {
	header("location:" . "index.php");
} else {
	$row = mysqli_fetch_array($query);
	setcookie("admin_id", $row["id"]);
	setcookie("admin_pass", $admin_pass);
	setcookie("auth", $auth);
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = '" . $row["id"] . "'");
	if (mysqli_affected_rows($link) == 0) {
		header("location:" . "register-venue.php");
	} else {

		header("location:" . "home.php");
	}

}
?>