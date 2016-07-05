<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FitQA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php
$x = rand(0, 5);
$questions = array("Can I lose weight without losing muscle?", "What should I eat to have a healthy diet?", "Should I use free weights or machines?", "Why do I feel tired in the winter?", "Is too much protein bad for you?", "Should I take vitamins?");

$populate = $questions[$x];

?>

<script>
var x = Math.floor((Math.random() * 6) + 1);
//document.getElementById("demo").innerHTML = x;

var questions = new Array("Can I lose weight without losing muscle?", "What should I eat to have a healthy diet?", "Should I use free weights or machines?", "Why do I feel tired in the winter?", "Is too much protein bad for you?", "Should I take vitamins?");
document.getElementById("demo").innerHTML = cars[x];

document.getElementById('query').value="questions[x]";
</script>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">FitQA</a>
          </div>
          <div class="navbar-collapse collapse">
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>FitQA</h1>
        <p>Ask questions about fitness and recive answers from IBM Watson's super computer.</p>
        <p>
	  <form class="form-inline" method="post" action="answer2.php" role="form">
	  <div class="form-group">
             <input type="text" id="query"i value="<?php echo $populate; ?>" name="q" class="form-control input-lg q" autofocus/>
          </div>
	  <div class="form-group">
          <button class="btn btn-lg btn-primary" role="button">Ask &raquo;</button>
	  </div>
	  </form> 
        </p>
      </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>



