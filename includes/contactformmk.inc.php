<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'mail/vendor/autoload.php';



	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Ве молиме користете валидна емаил адреса';
				$msgClass = 'alert-danger';
			} else {

				$mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();
				    $mail->Host = 'smtp.mailtrap.io';  //mailtrap SMTP server
				    $mail->SMTPAuth = true;
				    $mail->Username = 'be4275580ac584';   //username
				    $mail->Password = 'ffd722766d0fc1';   //password
				    $mail->Port = 465;                    //smtp port

            $mail->setFrom('noreply@findapet.com', 'Find A Pet');
				    $mail->addAddress($email, $name);

				    $mail->isHTML(true);

				    $mail->Subject = 'Contact Request From '.$name;
				    $mail->Body    = '<h2>Contact Request</h2>
							<h4>Name</h4><p>'.$name.'</p>
							<h4>Email</h4><p>'.$email.'</p>
							<h4>Message</h4><p>'.$message.'</p>
						';
						$mail->Body .= "MIME-Version: 1.0 <br>" ."\r\n";
						$mail->Body .="Content-Type:text/html;charset=UTF-8 <br>" . "\r\n";
						$mail->Body .= "From: " .$name. "<".$email.">". "\r\n";
				    if (!$mail->send()) {
							$msg = 'Your email was not sent'. $mail->ErrorInfo;
							$msgClass = 'alert-danger';
				    } else {
							// Email Sent
							$msg = 'Вашиот емаил е испратен';
							$msgClass = 'alert-success';
				    }
				} catch (Exception $e) {
				    echo 'Вашиот емаил не е испратен';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				}

			}
		} else {
			// Failed
			$msg = 'Ве молиме потполнете ги сите полиња.';
			$msgClass = 'alert-danger';
		}
	}
?>
