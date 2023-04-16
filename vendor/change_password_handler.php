<?php
include("includes/connect.php");

$old_password = sha1($_POST['old_password']);
$new_password = sha1($_POST['new_password']);
$user_id = $_COOKIE['admin_id'];

$query = mysqli_query($link, "SELECT * FROM profile WHERE id=$user_id");
$row = mysqli_fetch_array($query);

if ($row['password'] == $old_password) {
    mysqli_query($link, "UPDATE profile SET password='$new_password' WHERE id=$user_id");
    header("location:" . "logout.php");
} else {
}