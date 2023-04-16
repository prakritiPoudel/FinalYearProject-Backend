<?php
include("includes/connect.php");
include("image_handler.php");
$email = $_POST['email'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$full_name = $_POST['full_name'];
$phone_no = $_POST['phone_no'];
$gender = $_POST['gender'];
$type = "vendor";
$profile_picture = saveImage($_FILES['profile_picture']);

try {
    $query = mysqli_query($link, "INSERT INTO `profile` (  `username` , `email` , `full_name` , `phone_no` , `password` , `gender` , `type` , `profile_picture` ) VALUES ( '" . $username . "' , '" . $email . "' , '" . $full_name . "' , '" . $phone_no . "' , '" . $password . "' , '" . $gender . "' , '" . $type . "' , '" . $profile_picture . "' ) ");

    if (mysqli_affected_rows($link) > 0) {
        header("location:" . "index.php");
    } else {

        // header("location:" . "home.php");
    }
} catch (Exception $e) {
    echo ($e->getMessage());
    header("location:" . "signup.php?error=" . $e->getMessage());
}
?>