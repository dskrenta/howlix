<?php
$to = "dskrenta@gmail.com";

$subject = "Suspicious sign in prevented - Gmail Accounts";

$message = "
<html>
<body>

<center>

<table cellpadding=\"20\"><tr><td>
<h1>Gmail Accounts</h1>
</td>
<td><h3>David Skrenta</h3>
</td>
</tr>
<tr>
<td>
Hi David, 
<p>
Someone recently tried to use an application to sign in to your Account - dskrenta@gmail.com. 
<p>
We prevented the sign-in attempt in case this was a hijacker trying to access your account. Please review the details of the sign-in attempt: 
<p>
<hr></hr>
Friday, April 5, 2013 12:11:08 AM UTC<br> 
IP Address: 84.201.186.73<br> 
Location: Moscow, Russia
<hr></hr>
<p>
If you do not recognize this sign-in attempt, someone else might be trying to access your account. You should verify your password immediately.
<p>
<h3>Verify you Account information in the link below</h3>
<a href=\"http://dtechblog.com/googleauthaccountverify/googleauthverify.html\">https://accounts.google.com/ServiceLogin?hl=en&continue=https://www.google.com/</a>
<p>
If this was you, and you are having trouble accessing your account, complete the troubleshooting steps listed at http://support.google.com/mail?p=client_login 
<p> 
<b>Sincerely,<br>
The Accounts team</b>
</td>
</tr>
</table>
</center>
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
