<!DOCTYPE html>

<html>

<head>

	<title>Thank you</title>

	<style type="text/css">

		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		h3{
			text-align: center;
		}

		p{
			width:100%;
			max-width: 400px;
			height:auto;	
			border: 2px solid #00AEFF;
			display: block;
			margin: 3rem auto 3rem;
			padding: 1em 0.5em 1em;
		}

		a{
			background-color: #00AEFF;
			text-decoration: none; 
			width: 100%;
			max-width: 100px;
		 	height: auto;
		 	color: white;
		 	border: 1px solid  #00AEFF;
			display: block;
			margin: 3rem auto 3rem;
			padding: 0.5em 1em  0.5em;

		}

		h3{
			margin-top: 1em;
		}

	</style>

</head>

<body>

<?php

if($_POST) {
	$visitor_name = '';
	$visitor_email = '';
	$email_title = '';
	$visitor_message = '';
	$recipient = "tosynode@outlook.com";

	if(isset($_POST['visitor_name'])) {
		$visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
	}

	if(isset($_POST['visitor_email'])) {
		$visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
		$visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
	}

	if(isset($_POST['email_title'])) {
		$email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
	}

	if(isset($_POST['visitor_message'])) {
		$visitor_message = htmlspecialchars($_POST['visitor_message']);
	}

    else {
		$recipient = "tosynode@outlook.com";
	}

	
    
    $headers = 'MIME-Version: 1.0' . "\r\n"
	.'Content-type: text/html; charset=utf-8' . "\r\n"
	.'From: ' . $visitor_email . "\r\n";

  	if(mail($recipient,
  	        $email_title,
  	        $visitor_message,
  	        $headers)) {
		echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 48 hours.</p>";

	} else {
		echo '<p>We are sorry but the email did not go through.</p>';
	}

} else {
	echo '<p>Something went wrong</p>';
}

?>

<a href="contact.html">Go Back</a>


</body>

</html>

