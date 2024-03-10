<?php
    session_start();
    $return = null;
    if(isset($_SESSION['status']) && $_SESSION['status']){
        // $data = json_encode($data);
        // print_r()
        // if($data){

            $conn = new mysqli("localhost", "root", "", "credentials");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $id = $_SESSION['id'];
            $sql = "select cart from details where userID = $id ";
            $result = $conn->query($sql)->fetch_assoc();
            // echo $sql;
            // echo $id;
        // }else{
        //     exit('REQUEST NOT FOUND');
        // }
    }
    // else{
    //     exit('REQUEST NOT FOUND');
    // }

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    // print_r($result);
    // print_r($result['cart']);
    echo json_encode($result);
        // echo 
        // print_r($_SESSION);
?>