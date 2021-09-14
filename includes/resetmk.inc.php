<?php

if (isset($_POST["reset-request-submit"])) {
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url="http://localhost/lulata/createnewpasswordmk.php?selector=".$selector."&validator=". bin2hex($token);

  $expires = date("U") + 1800;

  require "dbh.inc.php";

  $userEmail = $_POST['email'];

  if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../resetpasswordmk.php?reset=invalidmail");
    exit();
}else {


  $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "There was an error";
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdreset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "There was an error";
    exit();
  }else {
    $hasedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hasedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;

  $subject = "Reset you password for findapet.com";

  $message = '<p>We recived a password reset request.The link to reset your password is right here if you did not ask for this email just ignore it</p>';
  $message .= "<p> Here is your password reset link: </br>";
  $message .= '<a href="'.$url.'">'.$url.'</a></p>';
  $headers = "From: Find A Pet  <davidatanasoski@hotmail.com>\r\n";
  $headers .= "Reply-To : davidatanasoski@hotmail.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  header("Location: ../resetpasswordmk.php?reset=success");
  }
}else {
  header("Location: ../indexmk.php");
  exit();
}

 ?>
