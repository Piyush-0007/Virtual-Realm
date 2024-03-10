<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'credentials');
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $result = $conn->query("select * from details where userID = '$id'");
    if($result == false){
        die('DataBase Connection failed');
    }
    $record = $result->fetch_assoc();
    $email = $record['email'];
    if(isset($_GET['id'])){
        $productID = $_GET['id'];
        $sql = "select * from products where id = $productID ";
    }
    else{
        $productID = json_decode($record['cart']);
        $sql = "select * from products where id in (";
        $len = count($productID);
        if($len > 0){
            foreach ($productID as $key => $value) {
                $sql .= "$value";
                if($key != $len-1){
                    $sql .= ', ';
                }
            }
        }else{
            header("Location : ../index.php");
        }
        $sql .= ");";
    }
    $tvr = new mysqli('localhost', 'root', '', 'tvr');
    $result = $tvr->query($sql);
    while ($row = $result->fetch_assoc()) {
        $cartList[] = $row;
    }
    $amount = 0;
    foreach($cartList as $i){
        $amount += $i['price'];
    }
    $tax = intval($amount * 0.18);
    echo $tax;
    $amount += $tax;
?> 