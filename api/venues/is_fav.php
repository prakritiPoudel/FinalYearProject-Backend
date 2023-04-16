<?php
include_once("../conn.php");
try {
    $token = getallheaders();
    $id = $token['authorization'];

    if ($id) {
        $venue_id = $_GET['venue_id'];
        $sql = "SELECT * FROM fav_venue WHERE venue_id=$venue_id AND owner_id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo (
                json_encode(
                    [
                        "status" => true,
                    ]
                )
            );
        } else {
            echo (
                json_encode(
                    [
                        "status" => false,
                    ]
                )
            );
        }
    } else {
        http_response_code(403);
        echo (json_encode([
            "status" => false,
            "message" => "No user found",
        ]));
    }
} catch (PDOException $e) {
    http_response_code(403);
    echo (json_encode([
        "status" => false,
        "message" => "No user found",
    ]));
}