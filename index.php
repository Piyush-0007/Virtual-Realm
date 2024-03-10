<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

  <link href="./css/index.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- navigation bar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">
        <img src="./images/icon.png" height="50px" alt="">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Best-Seller </a>
          </li>
          <li class="nav-item">

          </li>

        </ul>
        <form class="d-flex" role="search">
          <div class="search-bar me-2">
            <input class="form-control js-search" type="search" placeholder="Search" aria-label="Search">

            <div class="dropdown dropdown-search d-none transitioning">
              <ul class="mydropdown-menu dropdown-menu position-static d-grid  gap-1 p-0 ps-0 rounded-3 mx-0 shadow w-220px js-search-item" data-bs-theme="light">

                <li><a class="dropdown-item active rounded-2" href="#">Content Loading</a></li>
              </ul>
            </div>

          </div>
          <button class="btn btn-outline-success" type="submit">Search</button>

        </form>
        <a href="./cart.php" class="btn btn-primary me-2 ms-2 "><i class="ri-shopping-cart-fill"></i></a>
        <?php
        session_start();

        if (!empty($_SESSION) && isset($_SESSION['status']) && $_SESSION['status']) {
          echo '<div class="dropdown  me-2">
                            <button class="nav-link dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ' . ucfirst($_SESSION['name']) . '
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end ">
                              <li><a class="dropdown-item " href="#"><i class="ri-user-line me-2"></i>Profile</a></li>
                              <li><a class="dropdown-item " href="./purchase/purchase.php"><i class="ri-user-line me-2"></i>Purchased</a></li>
                              <li><a class="dropdown-item " href="#"><i class="ri-settings-4-line me-2"></i> Setting</a></li>
                              <li><a class="dropdown-item " href="./login/logout.php"><i class="ri-logout-box-r-line me-2"></i> Logout</a></li>
                            </ul>
                          </div>';
        } else {
          echo '<a href="./login/login.php" class="btn btn-outline-primary" >Login</a>';
        }
        ?>
      </div>
    </div>
  </nav>


  <!-- slider -->
  <home id="home">

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="./main/main.php?id=12"><img src="./images/slider_img_3.png" class="d-block w-100 " id='carsoule-img1' alt="..."></a>
        </div>
        <div class="carousel-item">
          <a href="./main/main.php?id=12"><img src="./images/slider_img_2.jpeg" class="d-block w-100" id='carsoule-img2' alt="..."></a>
        </div>
        <div class="carousel-item">
          <a href="./main/main.php?id=11"><img src="./images/COD.jpg" class="d-block w-100" id='carsoule-img3' alt="..."></a>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Content (cards) -->

    <div class="products row justify-content-center"></div>

    <!-- Footer -->
    <footer class="p-2 mt-4" id="footer">
      <ul class="nav justify-content-center border-bottom p-1 mb-3 ">
        <li class="nav-item text-white "><a href="" class="nav-link px-2 text-white">Home</a></li>
        <li class="nav-item"><a href="./data/privacy-policy.odg" target='_blank' class="nav-link px-2 text-body-primary text-white">Privacy-Policy</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-white ">Facebook</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-white ">Twitter</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-white ">Instagram</a></li>
      </ul>
      <p class="text-center text-white text-body-secondary">© 2023 Company, Inc</p>
    </footer>

    <a href="#home" class="scroll-up show-scroll-up"><i class="ri-arrow-up-line"></i></a>
  </home>


  <!-- ============= scroll reveal========================= -->
  <script src="./js/scrollreveal.min.js"></script>
  <script src="./index.js" type="module"></script>

  <!-- ==================== font awesome ================== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>