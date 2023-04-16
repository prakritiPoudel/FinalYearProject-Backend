<?php
header('Content-Type: application/json; charset=utf-8');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbName = 'sporty_way';

try {
    // creating the connection to database
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // echo "Successfully connected";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["status" => "false", "message" => "Failed to connect to database", "data" => $e->getMessage(),]);
    die();
}