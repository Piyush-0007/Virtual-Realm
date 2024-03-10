<?php
    $conn = new mysqli("localhost", "root", "", "tvr");
    $conn2 = new mysqli("localhost", "root", "", "credentials");
    if ($conn->connect_error || $conn2->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT count(*) as productCount FROM products ;";
    $products = $conn->query($sql);
    $sql = "SELECT count(*) as userCount FROM details ;";
    $users = $conn2->query($sql);
    $sql = "SELECT count(*) as activeUsers FROM details where active_status = 1;";
    $activeUsers = $conn2->query($sql);
    $sql = "SELECT count(*) as pendingUsers FROM details where active_status = 0;";
    $pendingUsers = $conn2->query($sql);
    $rows = [$products->fetch_assoc(), $users->fetch_assoc(), $activeUsers->fetch_assoc(),  $pendingUsers->fetch_assoc() ];
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    echo json_encode($rows);
    $conn->close(); // Close the database connection
?>