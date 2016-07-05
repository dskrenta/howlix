<?php
require 'functions.php';

// sleep for 1 seconds
sleep(1.37);

$query = $_POST["q"];

$x = rand(0, 5);
$questions = array("Can I lose weight without losing muscle?", "What should I eat to have a healthy diet?", "Should I use free weights or machines?", "Why do I feel tired in the winter?", "Is too much protein bad for you?", "Should I take vitamins?");

$populate = $questions[$x];


//die($query);

/*

Q: Can I lose weight without losing muscle?

A: There is a theoretical maximum amount of fat loss your body can endure, before it starts losing muscle. That amount is 31 calories/day/lb of fat.


Q: What should I eat to have a healthy diet?

A: Calories matter more than specific foods. Appropriate caloric intake is by far the most important rule regardless of the source. Repeated studies have shown that having excess body fat, type 2 diabetes and weight gain are resultant from eating and storing more calories than one burns.


Q: Should I use free weights or machines?

A: Weight machines can appear safer, but actually can create muscle imbalances due to involving fewer muscle groups and moving along fixed pathways that may not align with your body's geometry. Instead, learn to do the exercises properly with free weights, beginning with just your bodyweight or an empty bar, and gradually adding weight in 5 or 10lb increments until you find the appropriate weight for your ability.


Q: Why do I feel tired in the winter?A: There are many reasons you might be lethargic. It might just be a bad day, or life or work stress, or poor sleep or diet. If it's lasting and you've ruled out other possibilities, you might be feeling seasonal effects from winter and particularly lack of sunlight. About six percent of the United States population, for example, suffers from seasonal affective disorder ("SAD"), with another fourteen percent feeling a milder form known as winter blues. Symptoms include, among other things, lower energy levels and more eating, especially of sweets and starches. 


Q: Is too much protein bad for you?A: When looking at active male athletes and measuring urinary creatinine, albumin, and urea no significant changes were seen in dosage ranges of 1.28-2.8g/kg bodyweight.


Q: Should I take vitamins?

A: Multivitamins are very useful if you have a poor diet, but they lose much of their benefit if you have a good diet. Many people with good diets take multivitamins unnecessarily. Just supplement the nutrients you need instead.

*/

switch ($query) 
{
  case "Can I lose weight without losing muscle?":
    $result = "There is a theoretical maximum amount of fat loss your body can endure, before it starts losing muscle. That amount is 31 calories/day/lb of fat.";
    break;
  case "What should I eat to have a healthy diet?":
    $result = "Calories matter more than specific foods. Appropriate caloric intake is by far the most important rule regardless of the source. Repeated studies have shown that having excess body fat, type 2 diabetes and weight gain are resultant from eating and storing more calories than one burns.";
    break;
  case "Should I use free weights or machines?":
    $result = "Calories matter more than specific foods. Appropriate caloric intake is by far the most important rule regardless of the source. Repeated studies have shown that having excess body fat, type 2 diabetes and weight gain are resultant from eating and storing more calories than one burns.";
    break;
  case "Why do I feel tired in the winter?":
    $result = "There are many reasons you might be lethargic. It might just be a bad day, or life or work stress, or poor sleep or diet. If it's lasting and you've ruled out other possibilities, you might be feeling seasonal effects from winter and particularly lack of sunlight. About six percent of the United States population, for example, suffers from seasonal affective disorder (\"SAD\"), with another fourteen percent feeling a milder form known as winter blues. Symptoms include, among other things, lower energy levels and more eating, especially of sweets and starches.";
    break;
  case "Is too much protein bad for you?":
    $result = "When looking at active male athletes and measuring urinary creatinine, albumin, and urea no significant changes were seen in dosage ranges of 1.28-2.8g/kg bodyweight.";
    break;
  case "Should I take vitamins?":
    $result = "Multivitamins are very useful if you have a poor diet, but they lose much of their benefit if you have a good diet. Many people with good diets take multivitamins unnecessarily. Just supplement the nutrients you need instead.";
    break;
  default:
    $result = "Watson was not able to answer your question";
}

/*
$html = "
	<div class=\"panel panel-success\">
  	<div class=\"panel-heading\">
    	<h3 class=\"panel-title\">Answer</h3>
  	</div>
  	<div class=\"panel-body\">
    	$result
  	</div>
	</div>
";

echo json_encode(array(
        'content' => $html
));
*/
?>


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
	  <form class="form-inline" action="answer2.php" method="post" role="form">
	  <div class="form-group">
             <input type="text" name="q" value="<?php echo $populate; ?>" class="form-control input-lg q" autofocus/>
          </div>
	  <div class="form-group">
          <button class="btn btn-lg btn-primary" role="button">Ask &raquo;</button>
	  </div>
          </form>
        </p>
      </div>

	<h1><?php echo $query;?></h1>

	<div class="panel panel-success">
        <div class="panel-heading">
        <h3 class="panel-title">Answer</h3>
        </div>
        <div class="panel-body">
        <?php echo "<p class=\"lead\">" . $result . "</p>"; ?>
        </div>
        </div>

    </div> <!-- /container -->

<script>
$(document).ready(function () 
{
        $(".q").bind('keyup paste', function (e) 
        {
                setTimeout(function () 
                {
                        var myQuestion = $(".q").val()
                        $.ajax({
                                type: "POST",
                                url: "answer.php",
                                data: "q=" + myQuestion,
                                dataType: "json",
                                success: function (data) 
                                {
					$('.content').html(data.content);
                                }
                        });

                }, 0);
        });
});



function myQuestion() 
{
}
</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>







