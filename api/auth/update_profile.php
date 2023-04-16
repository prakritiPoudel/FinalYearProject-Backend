<?php
include_once("../conn.php");
include_once("../helper/file_handler.php");


$token = getallheaders();
$user = $token['authorization'];

$full_name = $_POST['full_name'];
$gender = $_POST['gender'];

$sql = "SELECT * FROM profile WHERE id=$user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $_POST['email'] ?? $result['email'];
$phone_number = $_POST['phone_no'] ?? $result['phone_no'];


$sql = "SELECT * FROM profile WHERE (email='$email' OR phone_no = '$phone_number') AND id != $user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
    echo (
        json_encode(
            [
                "status" => false,
                "message" => "User with this email or phone already exist",
            ]
        )
    );
} else {
    $hasFile = $_FILES['profile_picture']['name'] ?? null;
    $profile_picture = null;
    if ($hasFile != null) {
        $fileHandler = new FileHandler();
        $save = $fileHandler->saveFile($_FILES['profile_picture'], "../../media/");
        $profile_picture = $save['fileName'];
    }

    if ($profile_picture != null) {
        $sql = "UPDATE profile SET full_name='$full_name', email='$email', phone_no='$phone_number', gender = '$gender', profile_picture='$profile_picture' WHERE id=$user";
    } else {
        $sql = "UPDATE profile SET full_name='$full_name', email='$email', phone_no='$phone_number', gender = '$gender' WHERE id=$user";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo (json_encode([
        "status" => true,
        "message" => "Updated",
    ]));
}