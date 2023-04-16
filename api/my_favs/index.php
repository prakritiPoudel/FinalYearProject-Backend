<?php
include_once("../conn.php");
$token = getallheaders();
$user_id = $token['authorization'];
$sql = "SELECT v.id,v.name, v.location, v.banner_image,AVG(r.rating) as avg_rating,c.name as city_name FROM fav_venue fav LEFT JOIN venues v on fav.venue_id = v.id LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE fav.owner_id = $user_id  GROUP BY v.id ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$response = array();
echo (
    json_encode(
        [
            "status" => true,
            "data" => $result,
        ]
    )
);