<?php

require "header.php";

require_once('vendor/autoload.php');
require_once('includes/dbh.inc.php');
require_once('lib/pdo_db.php');
require_once('models/customer.php');
require_once('models/transaction.php');


\Stripe\Stripe::setApiKey('sk_test_yeuhIO2fbM0Uf35gmCIT5X3900OWRwlYTQ');

// Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$amount = $POST['amount'];
$token = $POST['stripeToken'];


//Create customer in stripe

$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $amount,
  "currency" => "usd",
  "description" => "Donation To Find A Pet",
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);

// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);



require "footer.php";
