<?php
if (isset($_POST['code']) && $_POST['code'] === "PAYMENT_SUCCESS") {
    $tvr = new mysqli('localhost', 'root', '', 'tvr');
    $providerReferenceID = $_POST['providerReferenceId'];
    $transactionID = $_POST['transactionId'];
    $r = $tvr->query("update sales set providerReferenceID = '$providerReferenceID' where transactionID = '$transactionID';");
    $sales = $tvr->query("select * from sales where transactionID = '$transactionID';");
    $purchaseCart = new mysqli('localhost', 'root', '', 'credentials');
    $productN = array();
    while ($row = $sales->fetch_assoc()) {
        array_push($productN, $row['productID']);
        $id = $row['userID'];
    }
    $products = ($purchaseCart->query("select * from details where userID = $id;"));
    $products = $products->fetch_assoc();
    $products = json_decode($products['purchase']);
    $products = array_merge($products, $productN);
    $product = json_encode($products);
    $r2 = $purchaseCart->query("update details set purchase = '$product' where userID = $id");
    if ($r != false && $r2 != false) {
        echo "All Thing will be alright";
        header("Location: ../purchase/purchase.php");
    } else {
        die("Error 404");
    }
} else {
    echo "payment request not made";
}
