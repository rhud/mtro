<?php
	function spamcheck($field) {
	  // Sanitize e-mail address
	  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
	  // Validate e-mail address
	  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
	    return TRUE;
	  } else {
	    return FALSE;
	  }
	}
	
	
	
	$header = 'From: toowoomba@metro.org.au' . "\r\n";
	$header .= 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	$message = '<h1>Motivational Gifts Survey: Results</h1>' . "\r\n";
	
	if($_POST){
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $message .= $_POST['message'];
	
		//send email
		if(spamcheck($email){
	    	mail($email, "Motivational Gifts Survey: Results", $message, $header);
	    }
	}
?>