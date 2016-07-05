<?php
$to = "dskrenta@gmail.com";

$subject = "Minecraft Account Verfication";

$message = "
<html>
<body>

Hi nicktada123, 
<p></p>
Someone requested a password reset for your Minecraft account.
<br></br>
If you didn't, please ignore this email.
<p></p>
To verify your account, visit this url within six hours:
<br></br>
<a href=\"\">Verify URL</a>
<p></p>
Thank you for playing Minecraft,
<br></br>
Mojang.

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
