<?php
include("includes/connect.php");
$id = $_GET['id'];
$type = $_GET['type'];
if ($type == "verify" || $type == 'unverify') {
    $value = $type == "verify" ? 1 : 0;
    $result = mysqli_query($link, "UPDATE venues SET verified=$value WHERE id=$id");
    $insert_id = mysqli_insert_id($link);
}
header("location:" . "venue_detail_page.php?id=" . $id);