<?php
include_once("../conn.php");

if (isset($_GET['venue'])) {
    $venue = $_GET['venue'];
    $sql = "SELECT a.* FROM venue_amenities ve LEFT JOIN amenities a on ve.amenity_id = a.id WHERE ve.venue_id=$venue";
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
    $sql = "SELECT * FROM amenities";
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
}