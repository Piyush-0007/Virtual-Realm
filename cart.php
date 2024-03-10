<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="./images/icon.png"  height="50px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="./index.php ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Best-Seller </a>
                    </li>
                    <li class="nav-item"></li>
                </ul>
                <form class="d-flex" role="search">
                    <div class="search-bar me-2">
                        <input class="form-control js-search js-search" type="search" placeholder="Search" aria-label="Search">
                        <div class="dropdown dropdown-search d-none transitioning">
                            <ul class="mydropdown-menu dropdown-menu position-static d-grid  gap-1 p-0 ps-0 rounded-3 mx-0 shadow w-220px js-search-item" data-bs-theme="light">
                                <li><a class="dropdown-item active rounded-2" href="#">Content Loading</a></li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <a href="./html/cart.html" class="btn btn-primary me-2 ms-2 " ><i class="ri-shopping-cart-fill"></i></a>
                <?php
                    session_start();
                    if(!empty($_SESSION) && isset($_SESSION['status']) && $_SESSION['status']){
                        echo '<div class="dropdown  me-2">
                                <button class="nav-link dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    '.ucfirst($_SESSION['name']).'
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end ">
                                    <li><a class="dropdown-item " href="#"><i class="ri-user-line me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item " href="./purchase/purchase.php"><i class="ri-user-line me-2"></i>Purchased</a></li>
                                    <li><a class="dropdown-item " href="#"><i class="ri-settings-4-line me-2"></i> Setting</a></li>
                                    <li><button class="dropdown-item js-logout" ><i class="ri-logout-box-r-line me-2"></i> Logout</button></li>
                                </ul>
                            </div>';
                    }else{
                        echo '<a href="./login/login.php" class="btn btn-outline-primary" >Login</a>';
                    }
                ?>  
            </div>
        </div>
    </nav>
    <!-- main -->
    <div class="checkout"><h2>Checkout(<span class="js-cart-count">0</span>)</h2></div>
    <div class="cart">
        <div class="order-summary"> Loading.....</div>
        <div class="payment-summary">
            <div class="total">
                <p>SubTotal (<span class="js-cart-count">0</span>) : </p>
                <p>Rs. <span class="js-cart-total">0</span></p>
            </div>
            <div class="total tax border-bottom">
                <p>Tax : </p>
                <p>Rs. <span class="js-cart-tax">0.00</span></p>
            </div>
            <div class="total grand-total border-bottom">
                <p>Grand Total : </p>
                <p>Rs. <span class="js-cart-grand-total">0.00</span></p>
            </div>
            <a href="./php/payment.php" class="btn btn-warning" id='payment'>Proceed To Payment</a>
        </div>
    </div>
    <script src="./cart.js" type="module"></script>
</body>
</html>
