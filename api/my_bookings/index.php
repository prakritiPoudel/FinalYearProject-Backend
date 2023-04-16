<?php
include_once("../conn.php");
$token = getallheaders();
$user_id = $token['authorization'];

$sql = "SELECT b.*,v.name as venue_name, v.banner_image as image, bs.begin_time, bs.end_time,p.amount as paid_amount FROM bookings b JOIN venues v on b.venue_id = v.id JOIN booking_slots bs on b.slot_id = bs.id JOIN payments p on b.payment_id = p.id WHERE b.user_id = $user_id";
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