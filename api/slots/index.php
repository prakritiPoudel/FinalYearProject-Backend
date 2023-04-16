<?php
include_once("../conn.php");
if (isset($_GET['venue'])) {
    $id = $_GET['venue'];

    $sql = "SELECT bs.*  FROM booking_slots bs WHERE bs.venue_id = $id";
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
} else {
    echo (
        json_encode(
            [
                "status" => true,
                "message" => "Venue id required",
            ]
        )
    );
}