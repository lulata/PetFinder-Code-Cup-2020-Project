<?php
  require 'headermk.php';
 ?>

 <main>
   <div class="container">
     <div class="card text-center">
      <div class="card-body">
        <div class="card-body">
        <?php

          $selector = $_GET["selector"];
          $validator = $_GET["validator"];

          if (empty($selector) || empty($validator) ) {
            echo "Неможевме да го валидираме вашете барање.";
          } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
              ?>
              <form action="includes/resetpassword.inc.php"  method="post">
                <div class="form-group mb-2 ">
                  <input class="form-control mb-3"  type="hidden" name="selector" value="<?php echo $selector; ?>" >
                  <input class="form-control mb-3"  type="hidden" name="validator" value="<?php echo $validator; ?>" >
                  <input class="form-control mb-3"  type="password" name="pwd" placeholder="Внесете лозинка ">
                  <input class="form-control mb-3"  type="password" name="pwd-repeat" placeholder="Повторете ја лозинката ">
                  <button type="submit" class="btn btn-outline-dark my-2 my-sm-0 mt-5" name="reset-password-submit">Обнови лозинка</button>
                </div>
              </form>
              <?php
            }
          }
         ?>

    </div>
</div>
</div>
   </div>
 </main>

 <?php
    require 'footermk.php';
  ?>
