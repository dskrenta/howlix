<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<div class="container">

<?php
$query = "SELECT * FROM $video_table ORDER BY ID DESC";
$result = mysql_query($query) or die(mysql_error());

if ($result)
{
	while($row = mysql_fetch_array($result))
        {
		$id = $row["ID"];
		$date = $row["date"];
		$title = $row["title"];
		$snippet = $row["snippet"];
		$url = $row["url"];
		$image = $row["image"];
		$embed = $row["embed"];
		$votes = $row["votes"];

		echo "
			<!--Start Thumbnail-->
			<div class=\"row\">
			<div class=\"col-md-4\">
                	<a href=\"#\">
                    	<a href=\"post.php?id=" . $id . "\"><img class=\"img-responsive\" src=\"" . $image . "\" alt=\"\"></a>
                	</a>
            		</div>
            		<div class=\"col-md-8\">
                	<a href=\"post.php?id=" . $id . "\"><h3>" . $title . "</h3></a>
                	<p>" . $snippet . "</p>
                	<a class=\"btn btn-primary\" href=\"post.php?id=" . $id . "\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a>
            		</div>
			</div>
			<!--End Thumbnail-->
			<hr>
		";
	}
}

else
{
	// Failure
}


?>

<!-- FOOTER -->
<footer>
<center>
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<?php
require 'footer.php';
?>
