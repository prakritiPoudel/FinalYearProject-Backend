<?php
include_once "../conn.php";
$email = $_POST['email'];
$password = sha1($_POST['password']);
$newpassword = sha1($_POST['newpassword']);

$sql = "SELECT * FROM profile WHERE email='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    http_response_code(200);
    echo (
        json_encode(
            [
                "status" => true,
                "data" => "Account not found",
            ]
        )
    );
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['email'] == $email && $row['password'] == $password) {
        $response[0] = $row;
        $sql2 = "UPDATE profile SET password = '$newpassword' WHERE email='$email' AND password='$password'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        http_response_code(200);
        echo (
            json_encode(
                [
                    "status" => true,
                    "data" => "Password changed",
                ]
            )
        );
    } else {
        http_response_code(400);
        echo (
            json_encode(
                [
                    "status" => false,
                    "data" => "Invalid credentials",
                ]
            )
        );
    }
}