<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="signup.css" />
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
  <!-- signup form -->
  <div class="back">
    <div class="container col-6">
      <div class="login ">

        <h2 class="heading">SIGNIN</h2>
        <p>Already have an account? <a href="../login/login.php" style="text-shadow:none">Login</a></p>

        <form action="validate.php" class="detail" method="post">
          <label for="Username">Username</label>
          <input type="text" class="inp" name="username" id="Username" placeholder="Username" required>
          <?php
          if (isset($_GET['error']) && $_GET['error'] == 'Username_taken') {
            echo '<p style="color:black; text-shadow:none; margin:3px 0px -3px 10px;" > ~ Username Already Taken.</p>';
          }
          ?>

          <label for="email">Email</label>
          <input type="email" class="inp" name="email" id="email" placeholder="example@xyz.com" required>

          <label for="password">Password</label>
          <input type="password" class="inp" id="password" name="password" placeholder="Password" required>

          <label for="conpassword">Confirm Password</label>
          <input type="password" class="inp" id="conpassword" name="conf-password" placeholder="Re-enter Password" required>

          <ul class="error">
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'password_invalid') {
              echo '<li >Password Does Not Matched.</li>';
            }
            if (isset($_GET['error']) && $_GET['error'] == 'Already_exsisting') {
              echo '<li >Email is Already Registered. </li>';
            }
            if (isset($_GET['error']) && $_GET['error'] == 'registration_failed') {
              echo '<li >Registration Failed.</li>';
            }
            ?>

          </ul>

          <input type="submit" value="SING IN" id="submit">
        </form>
      </div>


    </div>
  </div>
</body>

</html>