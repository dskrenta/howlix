<html>
<body>

<?php

//Declare News Message

$input = array($_POST["author"], $_POST["date"], $_POST["headline"], $_POST["mheadline"], $_POST["via"], $_POST["article"], $_POST["murls"], $_POST["anotes"]);

$subject = $input[0] . " - " . $input[2] .  " Article";

$message = "
<html>
<head>
<title>Email</title>
</head>
<body>
<p><b>Author:</b><br></br> $input[0]</p>
<p><b>Date:</b><br></br> $input[1]</p>
<p><b>Headline:</b><br></br> $input[2]</p>
<p><b>Extra Headlines:</b><br></br> $input[3]</p>
<p><b>Via/Source:</b><br></br> $input[4]</p>
<p><b>Article:</b><br></br> $input[5]</p>
<p><b>Media Urls:</b><br></br> $input[6]</p>
<p><b>Authors Notes:</b><br></br> $input[7]</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: <harvix.com@gmail.com>' . "\r\n";

//Send Mail

mail("hnewseditor@gmail.com", $subject, $message, $headers);

//Post Message

echo "Sent!";

?>

</body>
</html>
