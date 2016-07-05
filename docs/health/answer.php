<?php
require 'functions.php';

$query = $_POST["q"];

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
  case "What should I eat to have a healthy diet?":
    $result = "There is a theoretical maximum amount of fat loss your body can endure, before it starts losing muscle. That amount is 31 calories\/day\/lb of fat.";
    break;
  case "What should I eat to have a healthy diet?":
    $result = "Calories matter more than specific foods. Appropriate caloric intake is by far the most important rule regardless of the source. Repeated studies have shown that having excess body fat, type 2 diabetes and weight gain are resultant from eating and storing more calories than one burns.";
    break;
  case "Should I use free weights or machines?":
    $result = "Calories matter more than specific foods. Appropriate caloric intake is by far the most important rule regardless of the source. Repeated studies have shown that having excess body fat, type 2 diabetes and weight gain are resultant from eating and storing more calories than one burns.";
    break;
  case "Why do I feel tired in the winter?":
    $result = "There are many reasons you might be lethargic. It might just be a bad day, or life or work stress, or poor sleep or diet. If it's lasting and you've ruled out other possibilities, you might be feeling seasonal effects from winter and particularly lack of sunlight. About six percent of the United States population, for example, suffers from seasonal affective disorder \(\"SAD\"\), with another fourteen percent feeling a milder form known as winter blues. Symptoms include, among other things, lower energy levels and more eating, especially of sweets and starches.";
    break;
  case "Is too much protein bad for you?":
    $result = "When looking at active male athletes and measuring urinary creatinine, albumin, and urea no significant changes were seen in dosage ranges of 1.28-2.8g\/kg bodyweight.";
    break;
  case "Should I take vitamins?":
    $result = "Multivitamins are very useful if you have a poor diet, but they lose much of their benefit if you have a good diet. Many people with good diets take multivitamins unnecessarily. Just supplement the nutrients you need instead.";
    break;
  default:
    $result = "Watson was not able to answer your question";
}

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
?>



