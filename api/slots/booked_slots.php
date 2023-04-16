<?php
include_once("../conn.php");

if (isset($_GET['venue'])) {
    $id = $_GET['venue'];
    $date = $_GET['date'];
    $sql = "SELECT slot_id, SUM(quantity) as booked FROM bookings WHERE venue_id = $id AND booked_date='$date' GROUP BY slot_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = 0;

    echo (
        json_encode(
            [
                "status" => true,
                "date" => $date,
                "venue" => $id,
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