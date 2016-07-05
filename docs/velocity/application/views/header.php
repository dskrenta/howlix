<?php
if(isset($page))
{
	switch ($page) 
	{
    		case 1:
			$home = "active"; 
        		break;
    		case 2:
			$works = "active";
        		break;
    		case 3:
			$benefits = "active";
        		break;
		case 4: 
			$cities = "active";
			break;
		case 5: 
			$faq = "active";
			break;
	}
}
else
{
	$home = "";
	$works = "";
	$benefits = "";
	$cities = "";
	$faq = "";
}
?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  

<head>
	<title>Velocity</title>

    	<!-- Meta -->
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">    
   
	<!-- Open Graph -->
 	
	<!-- External Links -->
	<link rel="shortcut icon" href="#">  
    	<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
    	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    
	<!-- Global CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/bootstrap.min.css" type="text/css" />   
 
	<!-- Plugins CSS -->    
    	<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/font-awesome.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/flexslider.css" type="text/css" />   
 
	<!-- Theme CSS -->
    	<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/styles.css" type="text/css" />
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!--[if lt IE 9]>
      	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
</head> 

<body class="home-page">   
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">       
            <h1 class="logo">
                <a href="<?php echo BASE_URL; ?>"><span class="text">Velocity</span></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $home; ?> nav-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
                        <li class="<?php echo $works; ?> nav-item"><a href="<?php echo BASE_URL; ?>works">How it works</a></li>
			<li class="<?php echo $benefits; ?> nav-item"><a href="<?php echo BASE_URL; ?>benefits">Benefits</a></li>
                        <li class="<?php echo $cities; ?> nav-item"><a href="<?php echo BASE_URL; ?>cities">Our cities</a></li>
			<li class="<?php echo $faq; ?> nav-item"><a href="<?php echo BASE_URL; ?>faq">Travel info</a></li>
                        <li class="nav-item"><a href="<?php echo BASE_URL; ?>login">Log in</a></li>
                        <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="<?php echo BASE_URL; ?>register">Sign Up Free</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->                     
        </div><!--//container-->
    </header><!--//header-->
