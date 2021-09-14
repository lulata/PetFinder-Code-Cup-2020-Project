<?php
  require "header.php";
?>

<?php
 if (isset($_SESSION['userid'])) {
   echo '<div class="container mb-5">
     <h2 class="my-4 text-center">Donate To Find A Pet </h2>
     <a href="transactions.php" class="btn btn-outline-dark mb-2 btn-block ">Transactions</a>
     <form action="charge.php" method="post" id="payment-form">
       <div class="form-row">
        <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
        <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
        <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
        <small class="form-text text-muted">Enter the amount without the .(dot) example 10$=1000.</small>
        <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Amount">
         <div id="card-element" class="form-control">
           <!-- a Stripe Element will be inserted here. -->
         </div>
         <!-- Used to display form errors -->
         <div id="card-errors" role="alert" class="mb-3"></div>
       </div>
       <button class="btn btn-outline-dark mr-2 btn-block mb-3" >Submit Payment</button>

     </form>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <script src="javascript/charge.js"></script>';
 } else {
   header("location: index.php");
 }
?>

<?php
  require "footer.php";
 ?>
