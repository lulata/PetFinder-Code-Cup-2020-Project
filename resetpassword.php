<?php
  require 'header.php';
 ?>

 <main>
   <div class="container">


   <div class="card text-center mb-5">
  <div class="card-body">
    <h1>Reset your password</h1>
    <p>An e-mail to you with instruction on how to reset your password</p>
    <div class="card-body">
    <form action="includes/reset.inc.php" method="post">
      <div class="form-group">
     <label for="exampleInputEmail1">Email address</label>
     <input class="form-control mb-3"  type="text" name="email" placeholder="E-mail">
     <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mt-5 " name="reset-request-submit">Send recovery email</button>
 </div>

    </form>
    <?php
    if (isset($_GET['reset'])) {
      if ($_GET['reset'] == "success") {
        echo "<p class='alert alert-success'>Check your email!</p>";
      }elseif ($_GET['reset'] == "invalidmail") {
        echo "<p class='alert alert-danger text-center mt-3'>Invalid Email</p>";
      }
    }
    ?>
  </div>
</div>
</div>
   </div>
   <?php
     require 'footer.php';
    ?>
