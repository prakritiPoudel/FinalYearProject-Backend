<?php
include_once("../conn.php");

$sql = "SELECT * FROM banners";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo (
    json_encode(
        [
            "status" => true,
            "data" => $result,
        ]
    )
);