<?php
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
				// Passed
				$toEmail = 'davidatnasoski@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Вашиот емаил е испратен';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Вашиот емаил не е испратен';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Ве молиме потполнете ги сите полиња.';
			$msgClass = 'alert-danger';
		}
	}
?>
