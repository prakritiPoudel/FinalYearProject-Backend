<?php
include_once("../conn.php");
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT v.*,AVG(r.rating) as avg_rating, COUNT(r.rating) as ratings,c.name as city_name FROM venues v LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE v.id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $cat = $result['category'];
    $sql = "SELECT * FROM categories WHERE id=$cat";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $result['category_details'] = $res;
    unset($result['category']);
    unset($result['city']);
    echo (
        json_encode(
            [
                "status" => true,
                "data" => $result,
            ]
        )
    );
} else if (isset($_GET['city'])) {
    $city = $_GET['city'];
    $sql = "SELECT v.id,v.name,v.verified, v.location, v.banner_image,AVG(r.rating) as avg_rating,c.name as city_name FROM venues v LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE v.city = '$city' GROUP BY v.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = [];
    foreach ($result as $res) {
        if ($res['verified'] == 1) {
            array_push($response, $res);
        }
    }
    echo (
        json_encode(
            [
                "status" => true,
                "data" => $response,
            ]
        )
    );
} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $sql = "SELECT v.id,v.name,v.verified, v.location, v.banner_image,AVG(r.rating) as avg_rating,c.name as city_name FROM venues v LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE v.category = '$category' GROUP BY v.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = [];
    foreach ($result as $res) {
        if ($res['verified'] == 1) {
            array_push($response, $res);
        }
    }
    echo (
        json_encode(
            [
                "status" => true,
                "data" => $response,
            ]
        )
    );
} else if (isset($_GET['query'])) {
    $query = $_GET['query'];
 
    $sql = "SELECT v.id,v.name, v.location,v.verified, v.banner_image,AVG(r.rating) as avg_rating,c.name as city_name FROM venues v LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE v.name LIKE '$query%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = [];
    foreach ($result as $res) {
        if ($res['verified'] == 1) {
            array_push($response, $res);
        }
    }
    echo (
        json_encode(
            [
                "status" => true,
                "data" => $response,
            ]
        )
    );
 
} else {
    $sql = "SELECT v.id,v.name, v.location, v.banner_image,AVG(r.rating) as avg_rating,c.name as city_name FROM venues v LEFT JOIN cities c on v.city = c.id LEFT JOIN ratings_reviews r on v.id = r.venue_id WHERE v.verified = 1 GROUP BY v.id";
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
}
