<?php
    include('../../database_connection.php');
    $token = $_GET['token'];
    
    $sql = "select verification_code from details where  verification_code  = '$token'";
    $result = $con->query($sql);

    if ($result->num_rows >= 1) {
        $row = ($result->fetch_array())['active_status'];
        if($row == 0){

            $sql = "update details set active_status = 1 where  verification_code  = '$token'";
            $result = $con->query($sql);
            header("Location: registration.php?error=valid");
            exit();
        }else{
            header("Location: registration.php?error=existing-user");
            exit();
        }
    }else{
        header("Location: registration.php?error=invalid-user");
            exit();
    }
    // echo $result['verification_code'];
    // echo $token;
?>