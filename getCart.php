<?php
    session_start();
    $return = null;
    if(isset($_SESSION['status']) && $_SESSION['status']){
        $conn = new mysqli("localhost", "root", "", "credentials");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['id'];
        $sql = "select cart from details where userID = $id ";
        $result = $conn->query($sql)->fetch_assoc();
        $result = json_decode($result['cart']);
    }
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    echo json_encode($result);
?>