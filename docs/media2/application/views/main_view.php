<?php include('header.php'); ?>

<div class="container">
<div class="row">

<div class="col-md-2">
	<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=harvix02-20&o=1&p=14&l=ur1&category=primeent&banner=1G31VQ6Z79MNREKJX782&f=ifr&linkID=S67XKKJFR4LOELQG" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
</div>

<div class="col-md-6">

<?php

foreach($loadMedia as $element)
{
	$result = json_decode($element->data);
	echo "<img src=\"" . $result->thumbnail . "\" alt=\"" . $result->title . "\" width=\"100%\" />"; 
	echo "<p class=\"lead\">" . $result->title . " (" . $result->count . ")</p><hr />";
}

?>

</div>

<div class="col-md-4">
	<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=harvix02-20&o=1&p=12&l=ur1&category=primegift&banner=10BSGCHPCJG0HZN45H82&f=ifr&linkID=W27YWFHKH7CS4ZHQ" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
	<p />
	<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=harvix02-20&o=1&p=49&l=ur1&category=primemusic&banner=09XB0CYVGEEWXNSAH902&f=ifr&linkID=E6FUCPWCH5HTYQMU" width="300" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>

</div>

</div>
</div>

<?php include('footer.php'); ?>
