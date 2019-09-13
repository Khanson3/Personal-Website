<?php
	$user_email = $_POST['email'];
	
	$injections = array('(\n+)', '(\r+)', '(\t+)', '(%0A+)', '(%0D+)', '(%08+)', '(%09+)');
	
	for($i = 0; $i < count($injections); $i++) {
	    if(strpos($user_email, $injections[$i]) !== false) {
	        exit;
	    }
	}

	$my_email = "khanson3@binghamton.edu";
	$subject = "Request for more info";
	$body = "You have received a request for more information from:\n\n\r$user_email";
	$headers = "";

	mail($my_email, $subject, $body, $headers);
	
	$url = "https://personal-website-kyle-hanson.000webhostapp.com/";
	header( "Refresh: 5; $url" );
	
	echo nl2br("Your email has been submitted\n\nRedirecting to homepage...");
?>
