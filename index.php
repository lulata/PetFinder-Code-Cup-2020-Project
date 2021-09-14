<?php
  require 'header.php';
 ?>

<body >

 <main>
<div class="container">
  <div class="card text-center mt-3">
 <div class="card-body  ">
<?php

 if (isset($_SESSION['userid'])) {
   echo "<p class='card-text '>You are loged in! Hello And Welcome.</p>";
 }else {
   echo "<p class='card-text'>Plase Log In!</p>";
 }
?>

</div>
</div>
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo "<p class='alert alert-danger text-center mt-3'>FIll in all Fields!</p>";
      }elseif ($_GET['error'] == "sqlerror") {
        echo "<p class='alert alert-danger text-center mt-3'>SQL Error!</p>";
      }elseif ($_GET['error'] == "wrongpwd") {
        echo "<p class='alert alert-danger text-center mt-3'>Wrong Password!</p>";
      }elseif ($_GET['error'] == "nouser") {
        echo "<p class='alert alert-danger text-center mt-3'>No user found!</p>";
      }
  }
       if (isset($_SESSION['userid'])) {
            echo '<!-- Form -->
            <div class="container">
              <form id="pet-form">
                <div class="form-group">
                  <label for="animal">Animal</label>
                  <span id="error"></span>
                  <select id="animal" class="form-control form-control-lg mb-3">
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="bird">Bird</option>
                    <option value="barnyard">Barnyard</option>
                  </select>
                  <input type="number" id="zip" class="form-control form-control-lg" placeholder="Enter a 5 digit US zip code" autocomplete="off">
                  <input type="submit" value="Search" class="btn btn-outline-dark btn-lg btn-block mt-3">
                </div>
              </form>
              <div id="output"></div>
              <div id="results"></div>
            </div>

            <!-- JS file -->
            <script src="javascript/main.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>';
          }else {
            echo '  <form action="includes/login.inc.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address/Username</label>
                  <input  class="form-control"  type="text" name="mailuid" placeholder="Email/Username">
                  <small  class="form-text text-muted">We will never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="pwd" placeholder="Password">
                </div>
                <button class="btn btn-outline-dark my-2 my-sm-0 mr-3 btn-block " type="submit" name="login-submit">Log In </i></button>
              </form>
              <small  class="form-text text-muted mb-2">Forgot Your Password? Recover It Now!</small>
              <a class="btn btn-outline-dark my-2 my-sm-0 mr-3 btn-block" href="resetpassword.php">Recover Password</a>
              <small  class="form-text text-muted mb-2">New User? Just Sign Up!</small>
              <div class="mb-5">
              <a href="signup.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 mb-3 btn-block ">Signup </i></a>
              </div>';
          }

           ?>



</div>
 </main>

<?php
   require 'footer.php';
?>
