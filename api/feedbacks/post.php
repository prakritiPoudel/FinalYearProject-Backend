<?php
include_once("../conn.php");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $token = getallheaders();
    $user_id = $token['authorization'];
    $venue_id = $_POST['venue_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    
    $sql = "SELECT * FROM ratings_reviews WHERE venue_id = $venue_id AND user_id=$user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if ($result) {
        $sql = "DELETE FROM ratings_reviews WHERE venue_id = $venue_id AND user_id=$user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    $sql = "INSERT INTO ratings_reviews (venue_id,user_id,rating,review) 
    VALUES (:venue_id,:user_id,:rating,:review)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':venue_id' => $venue_id,
        ':user_id' => $user_id,
        ':rating' => $rating,
        ':review' => $review,
    ]);
    echo (json_encode([
        "status" => true,
        "message" => "Response posted",
    ]));
}