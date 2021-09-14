<?php
  require 'headermk.php';
 ?>

 <main>
   <div class="container">
   <div class=" text-center mt-3">
   <h1><span class="badge badge-pill badge-dark">Креирајте Нов Профил!</span></h1>
   <?php
   if (isset($_GET['error'])) {
     if ($_GET['error'] == "emptyfields") {
       echo "<p class='alert alert-danger'>Потполнете ги сите полиња!</p>";
     }elseif ($_GET['error'] == "invalidemailuid") {
       echo "<p class='alert alert-danger'>Невалиден емаил и корисничко име!</p>";
     }elseif ($_GET['error'] == "invalidmail") {
       echo "<p class='alert alert-danger'>Невалиден емаил!</p>";
     }elseif ($_GET['error'] == "invaliduid") {
       echo "<p class='alert alert-danger'>Невалидно корисничко име!</p>";
     }elseif ($_GET['error'] == "passwordcheck") {
       echo "<p class='alert alert-danger'>Лозинките не одговараат!</p>";
     }elseif ($_GET['error'] == "sqlerror") {
       echo "<p class='alert alert-danger'>SQL Ерор!</p>";
     }elseif ($_GET['error'] == "usertaken") {
       echo "<p class='alert alert-danger'>Корисничкото име вејќе е земено!Ве молиме одберете друго.</p>";
     }elseif ($_GET['error'] == "success" ) {
       echo "<p class='alert alert-success'>Успешно Креирање на профил!</p>";
     }elseif ($_GET['newpwd'] == "passwordupdated" ) {
       echo "<p class='alert alert-success'>Лозинката е обновена!</p>";
     }
   }
    ?>
   </div>

   <form action="includes/signupmk.inc.php" method="post">
     <div class="form-group">
  <label for="exampleInputEmail1">Корисничко Име</label>
    <input class="form-control" type="text" name="uid" placeholder="Корисничко Име">
    <label for="exampleInputEmail1">Емаил Адреса</label>
    <input class="form-control"  type="text" name="mail" placeholder="Емаил">
    <small class="form-text text-muted">Никогаш нема да ја споделуваме вашата емаил адреса.</small>
</div>

    <div class="form-group">
      <label for="exampleInputPassword1">Лозинка</label>
    <input class="form-control"  type="password" name="pwd" placeholder="Лозинка">
    <label for="exampleInputPassword1">Повторетеја Лозинка</label>
    <input class="form-control" type="password" name="pwd-repeat" placeholder="Повторетеја Лозинка">
     </div>
     <div class="mb-5">
       <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mb-3 btn-block" name="signup-submit">Креирај Профил <i class="fas fa-user-plus"></i></button>
       </form>
     </div>

 </div>




        <?php
          require 'footermk.php';
         ?>
