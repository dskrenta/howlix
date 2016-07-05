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
		<!--<a href="<?php echo BASE_URL; ?>main/addExpert"><button type="button" class="btn btn-default btn-lg btn-block">Add expert</button></a><br />-->
		<hr />
		<?php
			for($i = 0; $i < count($list); $i++)
			{
				echo"
					<div class=\"well well-sm\">
						<a href=\"" . BASE_URL . "expert/?id=" . $list[$i]['id'] . "\"><div class=\"pull-right\"><button type=\"button\" class=\"btn btn-default\">Connect</button></div></a>
						<h3>" . $list[$i]['name'] . " - " . $list[$i]['subject'] . "</h3>
						<p class=\"lead\">
							" . $list[$i]['email'] . " |
							$" . $list[$i]['price'] . "<small>/consultation</small> 
						</p>
					</div>";
			}
			//print_r($list);
		?>
    	</div><!-- /.container -->

</body>
</html>
