<!DOCTYPE html>
<html lang="en">
<head>

	<!--Meta-->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">

	<!--Title-->
	<title>Redesignmobile</title>
        
    	<!--CSS-->
    	<link href="<?php echo BASE_URL; ?>static/css/bootstrap.min.css" rel="stylesheet">
    	<link href="<?php echo BASE_URL; ?>static/css/font-awesome.min.css" rel="stylesheet">
        
    	<!--Google Font-->
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600italic,600,700' rel='stylesheet' type='text/css'>   

    	<!--[if lt IE 9]>
        	<script src="<?php echo BASE_URL; ?>static/js/html5shiv.js"></script>
        	<script src="<?php echo BASE_URL; ?>static/js/respond.min.js"></script>
    	<![endif]-->
       
    	<!--Icon-->
    	<link rel="shortcut icon" href="#">
    	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    	<link rel="apple-touch-icon-precomposed" href="#">

</head><!--/head-->
<body>

	<div class="container">
        	<h1>Redesignmobile</h1>
		<hr />
		<?php
			echo "
				<div class=\"well well-sm\"> 
                                       	<h3>" . $expert['name'] . " - " . $expert['subject'] . "</h3> 
                                       	<p class=\"lead\"> 
                                         	" . $expert['email'] . " | 
                                                $" . $expert['price'] . "<small>/consultation</small>  
                                    	</p> 
                            	</div>
			";
		?>
		<h3>Contact <?php echo $expert['name']; ?></h3>
		<form action="" method="post">
  			<div class="form-group">
    				<input type="text" class="form-control" name="name" id="name" placeholder="Name">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="3" name="message" id="mesage" placeholder="Message/Question"></textarea>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
 			</div>
			<input type="hidden" name="to_email" id="to_email" value="<?php echo $expert['email']; ?>">
			<div class="form-group">
				<button type="submit" class="btn btn-default btn-lg btn-block">Connect</button>
			</div>
		</form>


    	</div><!-- /.container -->

</body>
</html>
