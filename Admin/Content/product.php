<?php
    $conn = new mysqli("localhost", "root", "", "tvr");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id,name,company, price FROM products ;";
    $result = $conn->query($sql);

    $rows = array(); // Initialize an array to store all rows

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row; // Add each row to the array
        }
    } else {
        $rows = 0;
    }

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    echo json_encode($rows);

    $conn->close(); // Close the database connection
?>