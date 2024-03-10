<?php
    session_start();
    if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
        $data = file_get_contents('php://input');
        $data = json_decode($data);
        $conn = new mysqli("localhost", "root", "", "credentials");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['id'];
        $data = json_encode($data);
        $sql = "update details set cart = '$data' where  userID = $id ;";
        $result = $conn->query($sql);
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo json_encode($data);
    }else{
        echo "<a href = '../login/login.php'>SignIn now</a>";
        header("location: ../login/login.php");
    }
?>