<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../mail/vendor/autoload.php';
if (isset($_POST["reset-request-submit"])) {
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url="http://localhost/lulata/CodeCuo%202020%20Project/createnewpassword.php?selector=".$selector."&validator=". bin2hex($token);

  $expires = date("U") + 1800;

  require "dbh.inc.php";

  $userEmail = $_POST['email'];

  if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../resetpassword.php?reset=invalidmail");
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





  				$mail = new PHPMailer(true);

  				try {
  				    $mail->isSMTP();
  				    $mail->Host = 'smtp.mailtrap.io';  //mailtrap SMTP server
  				    $mail->SMTPAuth = true;
  				    $mail->Username = 'be4275580ac584';   //username
  				    $mail->Password = 'ffd722766d0fc1';   //password
  				    $mail->Port = 465;                    //smtp port

              $mail->setFrom('noreply@findapet.com', 'Find A Pet');
  				    $mail->addAddress($userEmail);

  				    $mail->isHTML(true);

  				    $mail->Subject = 'Reset you password for findapet.com';
  				    $mail->Body   = '<p>We recived a password reset request.The link to reset your password is right here if you did not ask for this email just ignore it</p> <br>';
              $mail->Body .= "<p> Here is your password reset link: </br>";
              $mail->Body .= '<a href="'.$url.'">'.$url.'</a></p>';

  						$mail->Body .= "From: Find A Pet  <davidatanasoski@hotmail.com></br>\r\n";
              $mail->Body .= "Reply-To : davidatanasoski@hotmail.com</br>\r\n";
              $mail->Body .= "Content-type: text/html\r\n";
  				    if (!$mail->send()) {
  							echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
  				    } else {
  							header("Location: ../resetpassword.php?reset=success");
  				    }
  				} catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
  				}

  			}
}else {
  header("Location: ../index.php");
  exit();
}

 ?>
