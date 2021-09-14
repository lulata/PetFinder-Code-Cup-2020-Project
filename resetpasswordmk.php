<?php
  require 'headermk.php';
 ?>

 <main>
   <div class="container">


   <div class="card text-center mb-5">
  <div class="card-body">
    <h1>Вратете ја вашата лозинка</h1>
    <p>Емаил ќе биде пратен со инструкции како да ја вратите и обновите вашата лозинка на вашиот емаил.</p>
    <div class="card-body">
    <form action="includes/resetmk.inc.php" method="post">
      <div class="form-group">
     <label for="exampleInputEmail1">Eмаил Адреса</label>
     <input class="form-control mb-3"  type="text" name="email" placeholder="Емаил">
     <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mt-5 " name="reset-request-submit">Прати емаил за враќање на лозинката.</button>
 </div>

    </form>
    <?php
    if (isset($_GET['reset'])) {
      if ($_GET['reset'] == "success") {
        echo "<p class='alert alert-success'>Проверете на вашата емаил адреса за пораката!</p>";
      }elseif ($_GET['reset'] == "invalidmail") {
        echo "<p class='alert alert-danger text-center mt-3'>Невалидна Емаил Адреса.</p>";
      }
    }
    ?>
  </div>
</div>
</div>
   </div>
   <?php
     require 'footermk.php';
    ?>
