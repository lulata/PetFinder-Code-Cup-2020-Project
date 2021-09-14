<?php
  require 'header.php';
 ?>

 <main>
   <div class="container">
   <div class=" text-center mt-3">
   <h1><span class="badge badge-pill badge-dark">Sign Up!</span></h1>
   <?php
   if (isset($_GET['error'])) {
     if ($_GET['error'] == "emptyfields") {
       echo "<p class='alert alert-danger'>FIll in all Fields!</p>";
     }elseif ($_GET['error'] == "invalidemailuid") {
       echo "<p class='alert alert-danger'>Invalid Email and Username!</p>";
     }elseif ($_GET['error'] == "invalidmail") {
       echo "<p class='alert alert-danger'>Invalid Email!</p>";
     }elseif ($_GET['error'] == "invaliduid") {
       echo "<p class='alert alert-danger'>Invalid Username!</p>";
     }elseif ($_GET['error'] == "passwordcheck") {
       echo "<p class='alert alert-danger'>Passwords Don't Match!</p>";
     }elseif ($_GET['error'] == "sqlerror") {
       echo "<p class='alert alert-danger'>SQL Error!</p>";
     }elseif ($_GET['error'] == "usertaken") {
       echo "<p class='alert alert-danger'>Username Taken!</p>";
     }elseif ($_GET['error'] == "success" ) {
       echo "<p class='alert alert-success'>Sign Up Success!</p>";
     }elseif ($_GET['error'] == "passwordupdated" ) {
       echo "<p class='alert alert-success'>Password Updated!</p>";
     }
   }
    ?>
   </div>

   <form action="includes/signup.inc.php" method="post">
     <div class="form-group">
  <label for="exampleInputEmail1">Username</label>
    <input class="form-control" type="text" name="uid" placeholder="Username">
    <label for="exampleInputEmail1">Email address</label>
    <input class="form-control"  type="text" name="mail" placeholder="E-mail">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
    <input class="form-control"  type="password" name="pwd" placeholder="Password">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password">
     </div>
     <div class="mb-5">
       <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mb-3 btn-block" name="signup-submit">Sign up <i class="fas fa-user-plus"></i></button>
       </form>
     </div>

 </div>




        <?php
          require 'footer.php';
         ?>
