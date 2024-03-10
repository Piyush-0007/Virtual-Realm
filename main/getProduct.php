<?php

$data = file_get_contents("php://input");
$id = json_decode($data);
$conn = new mysqli("localhost", "root", "", "tvr");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products where id = $id;";
$result = $conn->query($sql);

// $rows = array(); // Initialize an array to store all rows
// $row = null;
if ($result->num_rows > 0) {
    // while ($row = $result->fetch_assoc()) {
//         $rows[] = $row; // Add each row to the array
//     }
    $row = $result->fetch_assoc();
} else {
    $rows = null;
}



		// console.log($value);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
echo json_encode($row);
// echo json_encode($id);


$conn->close(); // Close the database connection
?>
