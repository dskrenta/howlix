<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
    <link rel="icon" href=""> 
 
    <title>Add Expert</title> 
 
    <!-- Bootstrap core CSS --> 
    <link href="<?php echo BASE_URL; ?>static/css/bootstrap.min.css" rel="stylesheet"> 
 
    <!-- Custom styles for this template --> 
    <link href="<?php echo BASE_URL; ?>static/css/signin.css" rel="stylesheet"> 
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> 
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
    <![endif]--> 
  </head> 
 
  <body> 
 
    <div class="container"> 
 
      <form action="" method="post" class="form-signin"> 
        <h2 class="form-signin-heading">Add expert</h2> 
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" autocomplete="off" required> 
        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" autocomplete="off" required> 
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" autocomplete="off">
	<input type="text" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required>
	<input type="text" id="price" name="price" class="form-control" placeholder="Price (USD)" autocomplete="off" required>
	<div class="spacer"></div> 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Expert</button> 
      </form> 
 
        <div> 
    </div> 
 
    </div> <!-- /container --> 
 
  </body> 
</html> 
