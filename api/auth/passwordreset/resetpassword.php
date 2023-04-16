<?php
include('../../conn.php');

$token = $_POST["token"];
$password = sha1($_POST["password"]);

$response = array();
$sql = "SELECT email FROM tokens WHERE otp_code='$token' LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $result['email'];

if ($email) {
    $sql2 = "UPDATE profile SET password='$password' WHERE email='$email'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    echo (json_encode([
        "status" => true,
        "message" => "Password changed",
    ]));
    $sql3 = "DELETE FROM tokens WHERE otp_code='$token'";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
} else {
    echo (json_encode([
        "status" => false,
        "message" => "Problem while changing password",
    ]));
}