<?php 
 
class Email_helper 
{ 
        public function send_email($name, $message, $user_email, $to) 
        { 
		$subject = "Schedule with expert";
		$body = "
			Name: " . $name . "<br />
			Message: " . $message . "<br />
			User Email: " . $user_email . "
		";

		// Always set content-type when sending HTML email 
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n"; 
 
		// More headers 
		$headers .= 'From: <redesign@bx9.net>' . "\r\n"; 
 
		// Send Mail 
		mail($to, $subject, $body, $headers); 
        } 
} 
 
?> 
