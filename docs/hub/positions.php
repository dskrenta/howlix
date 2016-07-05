<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Hub | Positions</title>

    <!-- Bootstrap core CSS -->
    <link href="http://howlix.com/hub/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://howlix.com/hub/css/dash.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<?php
	$user = $_GET['user'];
?>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hub</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
	    <li><a href="#"><?php echo $_COOKIE["user"]; ?></a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search Harvix...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Main</a></li>
            <li><a href="#">Analytics/Reports</a></li>
            <li><a href="#">Groups</a></li>
            <li><a href="#">Chat</a></li>
	    <li><a href="#">Files</a></li>
	    <li><a href="#">Sandbox</a></li>
	    <li><a href="#">Events</a></li>
            <li class="active"><a href="#">Avaliable Positions</a></li>
	    <li><a href="#">New Employee</a></li>
	    <li><a href="#">Contact List</a></li>
            <li><a href="#">Conference Calls</a></li>
            <li><a href="#">Finace</a></li>
	    <li><a href="#">Todo</a></li>
	    <li><a href="#">Coding Style</a></li>
    	    <li><a href="#">BD Templates</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Available Positions</h1>
	    <h2 class="page-header">Template</h2>
	      <ul>
	        <li>Title (Full-Time|Part-Time|Contract|Temp)</li>
		<li>Group (BizDev, Engineering, Harvix.org, Operations, Marketing)</li>
		<li>Background on Harvix relating to this position</li>
		<li>What a good candidate looks like</li>
		<li>Specified list of requirements</li>
		<li>Contact email (ie dskrenta@gmail.com)</li>
		<li>Salary & Compensation</li>
              </ul>
	    <h2 class="page-header">Business Development</h2>
	    <h2 class="page-header">Engineering</h2>
	    <h2 class="page-header">Harvix.org</h2>
	    <h2 class="page-header">Operations</h2>
	    <h2 class="page-header">Marketing</h2>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=""></script>
    <script src=""></script>
  </body>
</html>

