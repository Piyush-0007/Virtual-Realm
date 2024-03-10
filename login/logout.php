<?php
    session_start();
    session_destroy();
    // unset($_SESSION['id']);
    // unset($_SESSION['status']);
    // unset($_SESSION['name']);

    
    // header("Location: ../index.php");
    header("Location: ./login.php");

?>