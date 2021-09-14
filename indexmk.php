<?php
  require 'headermk.php';
 ?>

<body >

 <main>
<div class="container">
  <div class="card text-center mt-3">
 <div class="card-body  ">
<?php

 if (isset($_SESSION['userid'])) {
   echo "<p class='card-text '>Најавени сте! Добредојдовте.</p>";
 }else {
   echo "<p class='card-text'>Ве молиме најавете се!</p>";
 }
?>

</div>
</div>
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo "<p class='alert alert-danger text-center mt-3'>Потполнете ги сите полиња!</p>";
      }elseif ($_GET['error'] == "sqlerror") {
        echo "<p class='alert alert-danger text-center mt-3'>SQL Ерор!</p>";
      }elseif ($_GET['error'] == "wrongpwd") {
        echo "<p class='alert alert-danger text-center mt-3'>Грешна Лозинка!</p>";
      }
  }
       if (isset($_SESSION['userid'])) {
            echo '<!-- Form -->
            <div class="container">
              <form id="pet-form">
                <div class="form-group">
                  <label for="animal">Животно</label>
                  <span id="error"></span>
                  <select id="animal" class="form-control form-control-lg mb-3">
                    <option value="cat">Мачка</option>
                    <option value="dog">Куче</option>
                    <option value="bird">Пиле</option>
                    <option value="barnyard">Фармски Животни</option>
                  </select>
                  <label for="opstina">Општина</label>
                  <span id="error"></span>
                  <select id="opstina" class="form-control form-control-lg mb-3">
                    <option value="90021" >Скопје</option>
                    <option value="10017" >Битола</option>
                    <option value="90212" >Прилеп</option>
                    <option value="10030" >Охрид</option>
                    <option value="94105" >Тетово</option>
                    <option value="75001" >Струмица</option>
                    <option value="07002" >Кавадарци</option>
                  </select>
                  <input type="submit" value="Пребарај" class="btn btn-dark btn-lg btn-block mt-3">
                </div>
              </form>
              <div id="results"></div>
            </div>
            <!-- JS file -->
            <script src="javascript/mainmk.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>';
          }else {
            echo '  <form action="includes/loginmk.inc.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Емаил/ Корисничко Име</label>
                  <input  class="form-control"  type="text" name="mailuid" placeholder="Емаил/ Корисничко Име">
                  <small  class="form-text text-muted">Нема никогаш да го споделиме вашиот емаил.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Лозинка</label>
                  <input type="password" class="form-control" name="pwd" placeholder="Лозинка">
                </div>
                <button class="btn btn-outline-dark my-2 my-sm-0 mr-3 btn-block " type="submit" name="login-submit">Најавете се </i></button>
              </form>
              <small  class="form-text text-muted mb-2">Ја заборавивте лозинката? Вратетеја веднаш!</small>
              <a class="btn btn-outline-dark my-2 my-sm-0 mr-3 btn-block" href="resetpasswordmk.php">Врати Лозинка</a>
              <small  class="form-text text-muted mb-2">Нов корисник? Слободно креирајте нов профил.</small>
              <div class="mb-5">
              <a href="signupmk.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 mb-3 btn-block ">Креирај нов профил </i></a>
              </div>';
          }

           ?>



</div>
 </main>

 <?php
   require 'footermk.php';
  ?>
