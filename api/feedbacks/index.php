<?php
include_once("../conn.php");
if (isset($_GET['venue'])) {
    $id = $_GET['venue'];
    $sql = "SELECT r.id,r.review, r.rating, p.username,p.full_name,p.profile_picture FROM ratings_reviews r LEFT JOIN profile p on r.user_id = p.id WHERE venue_id = $id";
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