<?php
// REQUIRED
require 'sql.php';
require 'header.php';

$get_id = $_GET["id"];
?>

    <!-- Page Content -->
    <div class="container">

<?php
$query = "SELECT * FROM $video_table WHERE id='$get_id'";
$result = mysql_query($query) or die(mysql_error());

if ($result)
{
	while ($row = mysql_fetch_array($result))
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
			<!--Start Video Embed-->
			<div class=\"row\">
			<div class=\"col-md-8\">
			<div class=\"embed-responsive embed-responsive-16by9\">
            		" . $embed . "
			</div>
			<p>
			<div class=\"row\">
			<div class=\"col-md-6\"><button type=\"button\" class=\"btn btn-primary btn-lg btn-block\">Share on Facebook</button></div>
			<div class=\"col-md-6\"><button type=\"button\" class=\"btn btn-info btn-lg btn-block\">Share on Twiter</button></div>
			</div>
			</p>
			<p>
			<!--Comments Start-->
			<div id=\"disqus_thread\"></div>
    			<script type=\"text/javascript\">
        		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        		var disqus_shortname = 'funzilla'; // required: replace example with your forum shortname
			/* * * DON'T EDIT BELOW THIS LINE * * */
        		(function() {
            		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        		})();
    			</script>
    			<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
    			<!--<a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>-->
			<!--Comments End-->
			</p>
			<p>
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</p>
			<p class=\"lead\">You may also like ...</p>
		";
	
		$mysql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 3";
		$output = mysql_query($mysql) or die(mysql_error);

		if ($output)
		{
        		while ($display = mysql_fetch_array($output))
        		{
                		$m_id = $display["ID"];
                		$m_date = $display["date"];
                		$m_title = $display["title"];
                		$m_snippet = $display["snippet"];
                		$m_url = $display["url"];
                		$m_image = $display["image"];
                		$m_embed = $display["embed"];
                		$m_votes = $display["votes"];

				echo "
					<!--Start Thumbnail-->
                        		<div class=\"row\">
                        		<div class=\"col-md-5\">
                        		<a href=\"#\">
                        		<img class=\"img-responsive\" src=\"" . $m_image . "\" alt=\"\">
                        		</a>
                        		</div>
                        		<div class=\"col-md-7\">
                        		<h3>" . $m_title . "</h3>
                        		<p>" . $m_snippet . "</p>
                        		<a class=\"btn btn-primary\" href=\"post.php?id=" . $m_id . "\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a>
                        		</div>
                        		</div>
                        		<!--End Thumbnail-->
                        		<hr>
				";
			}
		}

		echo "
			<p><button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button></p>
			</div>
            		<div class=\"col-md-4\">
			<p>
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</p>
			<p class=\"lead\">Most Popular</p>
		";

		$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 5";
		$action = mysql_query($sql) or die(mysql_error());

		if ($action)
		{
			while ($return = mysql_fetch_array($action))
			{
				$side_id = $return["ID"];
                		$side_date = $return["date"];
                		$side_title = $return["title"];
                		$side_snippet = $return["snippet"];
                		$side_url = $return["url"];
                		$side_image = $return["image"];
                		$side_embed = $return["embed"];
                		$side_votes = $return["votes"];
		
				echo "
					<p>
					<img src=\"" . $side_image . "\" class=\"img-responsive\"></img>
					<h4>" . $title . "</h4>
					</p>
				";
			}
		}

		else
		{
			// Failure
		}
				
		echo "
			</div>
			</div> <!--/row-->
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
<hr />
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<?php
require 'footer.php';
?>
