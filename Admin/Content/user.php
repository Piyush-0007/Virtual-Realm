<?php
    $conn = new mysqli("localhost", "root", "", "credentials");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT userID,username,email, active_status FROM details ;";
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