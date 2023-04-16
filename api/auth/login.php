<?php
include_once("../conn.php");

$email = $_POST['email'];
$password = sha1($_POST['password']);

// checking if email exists
$sql = "SELECT * FROM profile WHERE email='$email' OR username='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    // getting the email and password saved in database if email exists
    $db_email = $result['email'];
    $db_username = $result['username'];
    $db_password = $result['password'];
    if (($db_email == $email || $db_username == $email) && $db_password == $password) {
        echo (
            json_encode(
                [
                    "status" => true,
                    "message" => "Login successfull",
                    "id" => $result['id'],
                ]
            )
        );
    } else {
        echo (
            json_encode(
                [
                    "status" => false,
                    "message" => "Email or password didn't match",
                ]
            )
        );
    }
} else {
    http_response_code(400);
    echo (
        json_encode(
            [
                "status" => false,
                "message" => "User with this email doesnot exist",
            ]
        )
    );
}