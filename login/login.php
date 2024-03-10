<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

  <link href="./login.css" rel="stylesheet" type="text/css">

</head>

<body>
  <?php
    session_start();
    if(isset($_SESSION['status']) && $_SESSION['status']){
      header("Location: ../index.php");
    }
  ?>
  <div class="logo text-center m-3">
    <a class="" href="../index.php">
        <img src="../images/icon_white.png" height="80px" alt="">
      </a>
  </div>
  <main class="content">
    <div class="back ">

      <div class="container">
        <div class="login">
          
          <h1>Login </h1>


          <p class="signup">Doesn't have an account yet?<a href="../signup/signup.php" class="">SingUp</a> </p>

          <form action="login-verification.php" class="credentails" method="post">

            <div class="un">

              <label for="username"> Username</label><br>
              <input type="text" id="username" name="username" placeholder="Username or Email" required>
            </div>
            <div class="un">

              <label for="password"> Password</label><br>
              <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <ul class="error">

              <?php
              if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
                echo '<li>Invalid username or password</li>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'verification-awaiting') {
                echo '<li>Verification Awaiting -
                              please check your email inbox. We\'ve sent you a verification email. Click the link provided in the email to verify your account </li>
                              
                              ';
              }
              ?>
            </ul>
            <label class="mb-2"><input type="checkbox" id="admin" name="isAdmin"> Login as Admin </label>
            <input id="submit" type="submit" value="LOGIN">
          </form>

        </div>
        <div class="side-img">
          <img src="../images/image.png" alt="">
        </div>

      </div>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>