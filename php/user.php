<?php
    $conn = new mysqli("localhost", "root", "", "tvr");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];
    // echo $id;
    $sql = "SELECT * FROM sales where ID = $id;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();
    } else {
        $rows = null;
    }

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    echo json_encode($rows);

    $conn->close(); // Close the database connection
?>