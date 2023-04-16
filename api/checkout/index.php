<?php
include_once("../conn.php");
$token = getallheaders();
$user_id = $token['authorization'];
$venue_id = $_POST['venue_id'];
$slot_id = $_POST['slot_id'];
$quantity = $_POST['quantity'];
$booked_date = $_POST['booked_date'];
$amount = $_POST['amount'];
$transcation_id = $_POST['transcation_id'];

$payment_id = savePayment($conn, $amount, $transcation_id, $user_id, $venue_id);
saveBooking($conn, $venue_id, $slot_id, $quantity, $booked_date, $payment_id, $user_id);

echo (json_encode([
    "status" => true,
    "message" => "Booking completed",
]));

function saveBooking($conn, $venue_id, $slot_id, $quantity, $booked_date, $payment_id, $user_id)
{
    $sql = "INSERT INTO bookings (venue_id, slot_id, quantity, booked_date, payment_id, user_id) VALUES (:venue_id,:slot_id, :quantity, :booked_date, :payment_id, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([

        ":venue_id" => $venue_id,
        ":slot_id" => $slot_id,
        ":quantity" => $quantity,
        ":booked_date" => $booked_date,
        ":payment_id" => $payment_id,
        ":user_id" => $user_id,
    ]);
}



function savePayment($conn, $amount, $transaction_id, $user_id, $venue_id)
{
    $sql = "INSERT INTO payments (amount,transaction_id,user_id, venue_id) VALUES (:amount,:transaction_id,:user_id,:venue_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':amount' => $amount,
        ':transaction_id' => $transaction_id,
        ':user_id' => $user_id,
        ':venue_id' => $venue_id,
    ]);
    $id = $conn->lastInsertId();
    return $id;
}