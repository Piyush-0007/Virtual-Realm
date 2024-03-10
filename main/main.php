<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="stylesheet" href="main.css">
</head>
<body class="">
  <!-- navigation bar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <img src="../images/icon.png" height="50px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"> <a class="nav-link active " aria-current="page" href="../index.php">Home</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Best-Seller </a> </li>
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
        <a href="../cart.php" class="btn btn-primary me-2 ms-2 "><i class="ri-shopping-cart-fill"></i></a>
        <?php
        session_start();
        if (!empty($_SESSION) && isset($_SESSION['status']) && $_SESSION['status']) {
          echo '<div class="dropdown  me-2">
                            <button class="nav-link dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ' . ucfirst($_SESSION['name']) . '
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end ">
                              <li><a class="dropdown-item " href="#"><i class="ri-user-line me-2"></i>Profile</a></li>
                              <li><a class="dropdown-item " href="#"><i class="ri-settings-4-line me-2"></i> Setting</a></li>
                              <li><a class="dropdown-item " href="../login/logout.php"><i class="ri-logout-box-r-line me-2"></i> Logout</a></li>
                            </ul>
                          </div>';
        } else {
          echo '<a href="../login/login.php" class="btn btn-outline-primary" >Login</a>';
        }
        ?>
      </div>
    </div>
  </nav>
  <main class="main container">
      <h1 class="mt-4 mb-4 heading js-product-name">Need For Your Speed 2015</h1>
      <section class="landing ">
          <!-- carousel -->
          <section class="left">
              <div id="carouselExampleRide" class="carousel slide " data-bs-ride="true">
                  <div class="carousel-inner">
                      <!-- carousel item are dynamically added -->
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon display-5" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                  </button>
              </div>
              <div class="about-product">
                  <p>Craft unique rides with deeper performance and visual customization than ever before. Push them to the limit when you narrowly escape the heat in epic cop battles. From insane heist missions to devastating car battles to jaw-dropping set piece moments, Need for Speed Payback delivers an edge-of-your-seat, adrenaline-fueled action-driving fantasy.
                  </p>
                  <h4>Key Features</h4>
                  <ul>
                      <li class="m-1">Scrap to stock to supercar. Your car is at the center of everything you do in Need for Speed Payback. Endlessly fine-tune your performance with each of the five distinct car classes (Race, Drift, Off-Road, Drag and Runner) to turn the tables on the competition in any race, mission or challenge.
                      </li>
                      <li class="m-1">Live out an action-driving fantasy. Play as three distinct characters united by one common goal: revenge. Tyler, Mac and Jess team up to even the score against all odds, and enter the ultimate race to take down The House. Battle cops with ever-increasing intensity, race against rivals across the city and drive on and off-road through mountains, canyons and deserts.
                      </li>
                      <li class="m-1">High stakes competition. Win big with all-new Risk vs Reward gameplay. Intense cop chases mean the stakes have never been higher. Challenge your friends or potential rivals via Autolog recommendations throughout the events or go head-to-head in classic online leaderboards
                      </li>
                  </ul>
              </div>
          </section>
          
          <!-- container -->
          <section class="product-deatil"><!-- putting Product Detail Dynamically --> </section>
      </section>
      <!-- product description -->
      <section class="specs">
          <h4 class="m-1 heading">System Requirements</h4>
          <section id="specs-details" class="py-3 my-3 rounded">   
              <div class="min">
                  <h5 class="text-center">Minimum</h5>
                  <ul>
                      <li><span class="specs-item">OS: </span>64-bit Windows 7 or later
                      </li>
                      <li><span class="specs-item">Processor: </span>Intel i3 6300 @ 3.8GHz or AMD FX 8150 @ 3.6GHz with 4 hardware threads</li>
                      <li><span class="specs-item">Memory: </span>6 GB RAM</li>
                      <li><span class="specs-item">Graphics: </span>NVIDIA GeForce® GTX 750 Ti or AMD Radeon™ HD 7850 or equivalent DX11 compatible GPU with 2GB of memory</li>
                      <li><span class="specs-item">DirectX: </span> Version 11</li>
                      <li><span class="specs-item">Network: </span> Broadband Internet connection</li>
                      <li><span class="specs-item">Storage: </span>30 GB available space</li>
                  </ul>
              </div>
              <div class="max">
                  <h5 class="text-center">Maximum</h5>
                  <ul>
                      <li><span class="specs-item">OS: </span>64-bit Windows 10 or later
                      </li>
                      <li><span class="specs-item">Processor: </span>Intel i5 4690K @ 3.5GHz or AMD FX 8350 @ 4.0GHz with 4 hardware threads</li>
                      <li><span class="specs-item">Memory: </span>8 GB RAM</li>
                      <li><span class="specs-item">Graphics: </span>AMD Radeon™ RX 480 4GB, NVIDIA GeForce® GTX 1060 6GB or equivalent DX11 compatible GPU with 4GB of memory</li>
                      <li><span class="specs-item">DirectX: </span>Version 11</li>
                      <li><span class="specs-item">Network: </span>Broadband Internet connection</li>
                      <li><span class="specs-item">Storage: </span> 30 GB available space</li>
                  </ul>
              </div>
          </section>
      </section>
  </main>
  <script src="./main.js" type="module"></script>
</body>
</html>