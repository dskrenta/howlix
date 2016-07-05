<html>
<body>

<?php
  	// Gets REQUEST variables
	$from = $_REQUEST['from'] ;
  	$to = $_REQUEST['to'] ;
	$subject = $_REQUEST['subject'] ;
  	$message = $_REQUEST['message'] ;
  	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers = "From:" . $from;

	// Use the Mail function with all the parameters
	mail($to, $subject, $message, $headers);

	// Thank user for using the form 
  	echo "Thank you for using our mail form";
?>

</body>
</html>
