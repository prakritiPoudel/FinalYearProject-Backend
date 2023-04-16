<?php
header("Access-Control-Allow-Methods: POST");
include "../../conn.php";
$email = $_GET['email'];
$token = $_GET['token'];
$response = array();
$sql = "SELECT * FROM tokens WHERE email='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $response[0] = array(
        'status' => "The code is invalid"
    );
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['email'] == $email && $row['otp_code'] == $token) {
        $response[0] = array(
            'status' => true
        );
    } else {
        $response[0] = array(
            'status' => false
        );
    }
}
echo json_encode($response[0], JSON_PRETTY_PRINT);
