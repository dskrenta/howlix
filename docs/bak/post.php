<?php
// REQUIRED
require 'sql.php';
//require 'header.php';

$get_id = $_GET["id"];

$next_id  = $get_id - 1;

$idcheck = "SELECT * FROM $video_table WHERE ID='$get_id'";
$idaction = mysql_query($idcheck) or die(mysql_error());

if (mysql_num_rows($idaction) > 0)
{
	// Exists

	while ($metarow = mysql_fetch_array($idaction))
        {
                $metaid = $metarow["ID"];
                $metadate = $metarow["date"];
                $metatitle = $metarow["title"];
                $metasnippet = $metarow["snippet"];
                $metaurl = $metarow["url"];
                $metaimage = $metarow["image"];
                $metaembed = $metarow["embed"];
                $metavotes = $metarow["votes"];
	}
}

else
{
	header("Location: post.php?id=$next_id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="canonical" href="http://funzilla.tv" />

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta name="keywords" content="Funzilla, tv, video, jokes, interesting, cool, fun collection, fun portfolio, admire, fun, humor, humour, just for fun"/>
<meta name="author" content="Funzilla.tv">

<meta property="og:site_name" content="Funzilla.tv"/>
<meta property="og:type" content="blog"/>
<meta property="og:title" content="Funzilla.tv"/>
<meta property="og:description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta property="og:url" content="http://funzilla.tv"/>
<meta property="og:image" content=""/>

<meta name="twitter:site" content="funzilla.tv" />
<meta name="twitter:url" content="http://funzilla.tv"/>
<meta name="twitter:description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta name="twitter:domain" content="funzilla.tv">
<meta name="twitter:image" content=""/>

<title>Funzilla.tv</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/style2.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong><span style="color:white">Funzilla</span><span style="color:#d9534f">.tv</span></strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#modal">Submit Video</button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

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
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			<p class=\"lead\">YOU MIGHT ALSO LIKE</p>
		";
	
		$mysql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 5";
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
			<p>
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			</div>
            		<div class=\"col-md-4\">
			<p>
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			<p class=\"lead\">MOST POPULAR</p>
		";

		$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 8";
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
					<h4>" . $side_title . "</h4>
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
