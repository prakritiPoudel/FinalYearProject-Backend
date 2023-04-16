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
            $sql = "DELETE FROM fav_venue WHERE venue_id=$venue_id AND owner_id=$id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            echo (
                json_encode(
                    [
                        "status" => true,
                        "message" => "Removed from favourites",
                    ]
                )
            );
        } else {
            $sql = "INSERT into fav_venue (venue_id,owner_id) VALUES (:venue_id,:owner_id)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ":venue_id" => $venue_id,
                ":owner_id" => $id,
            ]);

            if ($result) {
                echo (json_encode([
                    "status" => true,
                    "message" => "Added to fav",
                ]));
            } else {
                echo (json_encode([
                    "status" => false,
                    "message" => "Failed adding to fav",
                ]));
            }
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
        "error" => $e->getMessage(),
    ]));
}