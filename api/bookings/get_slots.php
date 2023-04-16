<?php
include_once("../conn.php");
$venue_id = $_GET['venue_id'];
$date = $_GET['date'];
$sql = "SELECT * FROM booking_slots WHERE venue_id=$venue_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = array();

foreach ($result as $r) {
    $id = $r['id'];
    $sql = "SELECT * FROM bookings WHERE venue_id=$venue_id AND slot_id = $id AND booked_date='$date'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $r['status'] = "Already Booked";
    } else {
        $r['status'] = "Available";
    }
    array_push($response, $r);
}
echo (
    json_encode(
        [
            "status" => true,
            "message" => $response,
        ]
    )
);