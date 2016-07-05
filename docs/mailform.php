<html>
<body>

<?php
  //send email
  $from = $_REQUEST['from'] ;
  $to = $_REQUEST['to'] ;
  $subject = $_REQUEST['subject'] ;
  $message = $_REQUEST['message'] ;
  mail($to, $subject,
  $message, "From:" . $from);
  echo "Thank you for using our mail form";
?>

</body>
</html>
