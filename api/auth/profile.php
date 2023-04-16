<?php
include_once("../conn.php");
$token = getallheaders();
$id = $token['authorization'];

$sql = "SELECT * FROM profile WHERE id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
unset($result['password']);
if ($result) {
    http_response_code(200);
    echo (json_encode([
        "status" => true,
        "data" => $result,
    ]));
} else {
    http_response_code(403);
    echo (json_encode([
        "status" => false,
        "message" => "No user found",
    ]));
}