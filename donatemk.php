<?php
  require "headermk.php";
?>

<?php
 if (isset($_SESSION['userid'])) {
   echo '<div class="container mb-5">
     <h2 class="my-4 text-center">Донирајте за Пронајдете Милениче </h2>
     <a href="transactionsmk.php" class="btn btn-outline-dark mb-2 btn-block ">Трансакции</a>
     <form action="chargemk.php" method="post" id="payment-form">
       <div class="form-row">
        <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Име">
        <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Презиме">
        <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Емаил Адреса">
        <small class="form-text text-muted">Внесете ја сумата без .(точка) пример: 10$=1000.</small>
        <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Сума">
         <div id="card-element" class="form-control">
           <!-- a Stripe Element will be inserted here. -->
         </div>
         <!-- Used to display form errors -->
         <div id="card-errors" role="alert" class="mb-3"></div>
       </div>
       <button class="btn btn-outline-dark mr-2 btn-block mb-3" >Донирај</button>

     </form>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <script src="javascript/chargemk.js"></script>';
 } else {
   header("location: index.php");
 }
?>

<?php
  require "footermk.php";
 ?>
