<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ab5ba9abb5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./registration.css" />
  </head>
  <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../../images/icon.png"   height="50px" alt="">
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Best-Seller </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./login.html">Login</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="back">
      <div class="container">
      <?php
              if (isset($_GET['error']) && $_GET['error'] == 'valid') {
                echo '<h1>Congratulations! </h1>
                <p> Your account has been successfully activated. You can now log in and enjoy full access to our services. If you have any questions or need assistance, feel free to reach out to our support team. Welcome aboard!"</p>
                <a href="../../login.php"><button class="login">LOGIN</button></a>';
                
              }
              if (isset($_GET['error']) && $_GET['error'] == 'invalid-user') {
                echo '<h1>UNKOWN USER!</h1>
                <p>We\'re sorry, but it seems that the account associated with this activation link does not exist. Please double-check the link or ensure that you have completed the registration process. If you haven\'t registered yet, please sign up to create an account. If you believe this is an error, contact our support team for further assistance. Thank you!</p>
                <a href="../signup.php"><button class="login">SIGNUP</button></a>';
                
              }
              if (isset($_GET['error']) && $_GET['error'] == 'existing-user') {
                echo '<h1>Already Registered!</h1>
                <p>Oops! It looks like your account is already activated, or the activation link has expired. If you\'ve already activated your account, you can simply log in. If you\'re experiencing any issues, please contact our support team for assistance. Thank you!"</p>
                <a href="../../login.php"><button class="login">LOGIN</button></a>';
                
              }

              
      ?>
        <!-- <h1>Email Validate!</h1>
        <p>To complete the registration process, please check your email inbox. We've sent you a verification email. Click the link provided in the email to verify your account and gain full access to our services. If you don't see the email in your inbox, please check your spam or junk folder. If you encounter any issues, feel free to contact our support team.</p>
        <a href="../login.php"><button class="login">LOGIN</button></a> -->
    </div>
    </div>
  </body>
</html>
