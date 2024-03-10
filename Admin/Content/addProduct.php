<?php
    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        exit("Post request Method Required");
    }
    if(empty($_FILES)){
        exit("$_FILES is empty, does file_uploads are enable in php.ini ?");
    }
    

    $mime_type = ["image/png", "image/jpg", "image/jpeg", "video/webm"];
    foreach ($_FILES as $key => $value) {
        if($key == "trailer" && $value['type'] == "video/webm"){
            $destinatoin = "/opt/lampp/htdocs/Project/data/nextData/" . $_POST["label"]. "_". $key .".webm";
        }
        else if(in_array($value["type"],$mime_type)){
            $destinatoin = "/opt/lampp/htdocs/Project/data/" . $_POST["label"]. "_". $key .".jpg";
        }
        else{
            exit("Invalid File Type: ".$value["type"]);

        }
        if( ! move_uploaded_file($value["tmp_name"], $destinatoin ) ){
            exit("Can't move uploaded Files". $destinatoin); 
        }
    }

    $conn = new mysqli("localhost", "root", "", "tvr");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name']; $company = $_POST['company']; $details = $_POST['detail']; $price = $_POST['price']; 
    $win = ($_POST['window'] == null)?0:1;
    $mac = ($_POST['mac'] == null)?0:1;
    $linux = ($_POST['linux'] == null)?0:1;
    $label = $_POST['label'];

    $sql = "insert into `products` (`name`, `company`, `detail`, `price`, `window`, `mac`, `linux`, `label`) values('$name', '$company', '$details' , $price, $win, $mac, $linux, '$label' );";

    echo $sql . "<br>";
    $result = $conn->query($sql);

    if($result){
        header("Location: ./products.html?success=product-added");
        exit();
    }else{
        header("Location: ./addProduct.html?error=not-added");
        exit();
    }

    $conn->close(); // Close the database connection



    
    print_r($_POST);
?>