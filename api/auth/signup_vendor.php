<?php
include_once("../conn.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$phone_no = $_POST['phone_no'];
$gender = $_POST['gender'];

$type = "vendor";

// checking if email exists
$sql = "SELECT * FROM profile WHERE email='$email' OR phone_no = '$phone_no' OR username = '$username'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo (
        json_encode(
            [
                "status" => false,
                "message" => "User with this email, phone or username already exist",
            ]
        )
    );
} else {
    $sql1 = "INSERT INTO profile (username,email,password,phone_no,gender,type) VALUES (:username,:email,:password,:phone_no,:gender,:type)";
    $stmt1 = $conn->prepare($sql1);
    $result = $stmt1->execute(
        [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':phone_no' => $phone_no,
            ':gender' => $gender,
            ":type" => $type,
        ]
    );
    if ($result) {
        http_response_code(201);
        echo (
            json_encode(
                [
                    "status" => true,
                    "message" => "Profile created. Please login.",
                ]
            )
        );
    } else {
        http_response_code(400);
        echo (
            json_encode(
                [
                    "status" => false,
                    "message" => "Problem while creating profile",
                ]
            )
        );
    }
}