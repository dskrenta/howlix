<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Hub | Contacts</title>

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
            <li><a href="#">Avaliable Positions</a></li>
	    <li><a href="#">New Employee</a></li>
	    <li class="active"><a href="#">Contact List</a></li>
            <li><a href="#">Conference Calls</a></li>
            <li><a href="#">Finace</a></li>
	    <li><a href="#">Todo</a></li>
	    <li><a href="#">Coding Style</a></li>
    	    <li><a href="#">BD Templates</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Contact List</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>David Skrenta</td>
                  <td>CEO</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jakob Picciotto</td>
                  <td>COO</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Adam Odisho</td>
                  <td>CMO</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Max Lieberman</td>
                  <td>VP Marketing</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Shannon M. Cassady</td>
                  <td>VP Harvix.org</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Bryce DesBrisay</td>
                  <td>User Experience</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Nishi Jain</td>
                  <td>Business Development</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
		<tr>
                  <td>8</td>
                  <td>Matthew B. Solomon</td>
                  <td>Business Development</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
              </tbody>
            </table>
          </div>
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

