<?php
// ShredFeed index.php

// Required 
//require 'save.php';
require 'sql.php';
require 'functions.php';

// Headers
require 'header.php';
require 'fb_main.php';

// COOKIE
//$id = $_GET["id"];
//$name = $_GET["name"];

//setcookie("uid", $id, time()+86400);
//setcookie("user", $name, time()+86400);

// Main
require 'sidebar_main.php';

$uid = $_COOKIE["uid"];
$query = $_POST['q'];
?>

<div class="col-md-9" id="mainCol">
		<div id="submit-success" class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> Your friends will now be notified about their new ShredFeeds!
		</div>

		<div class="alert fade in" id="signUpPromo" style="display:none;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<img src="imgs/promo.png" class="fr mr15" />
			<h4><strong>Add your own songs on ShredFeedx</strong></h4>
			<p>ShredFeed is a music community to collect and share songs.</p>
			<p>
				<a href="index.html" class="btn btn-primary">Sign Up!</a> 
			</p>
		</div>

		<?php
		// MySQL
		$sql = "SELECT * FROM $user_table WHERE uid=$uid";
		$output = mysql_query($sql) or die(mysql_error());

		if ($output)
		{
        		// Assign Vars
        		$row = mysql_fetch_array($output);

        		$user_id = $row['ID'];
        		$user_date = $row['date'];
       	 		$user_uid = $row['uid'];
        		$user_name = $row['user'];
        		$user_img = $row['imgUrl'];
		}
		else
		{
        		// Failure
		}
		
		echo"	
		<h2>Search Results:" . $query . "</h2>
		<h4>Results For " . $user_name . ":</h4>
		";

		?>
	
<?php
//sqlStart();
	//sqlQuery("SELECT * FROM $main_table ORDER BY ID DESC");

	$sql = "SELECT * FROM $main_table ORDER BY ID DESC";
	$result = mysql_query($sql) or die(mysql_error());

	if ($result)
	{
		while($row = mysql_fetch_array($result))
        	{
			$id = $row['ID'];
                	$date = $row['date'];
                	$title = $row['title'];
                	$folder = $row['folder'];
                	$user = $row['user'];
			$uid = $row['uid'];
                	$url = $row['url'];
			$fid = $row['extra'];
			$type = $row['type'];
                	$snippet = $row['snippet'];

			// MySQL
			$mysql = "SELECT * FROM $user_table WHERE uid=$uid";
			$output = mysql_query($mysql) or die(mysql_error());

			if ($output)
			{
        			// Assign Vars
        			$out = mysql_fetch_array($output);

        			$ushred_id = $out['ID'];
        			$ushred_date = $out['date'];
        			$ushred_uid = $out['uid'];
        			$ushred_name = $out['user'];
        			$ushred_img = $out['imgUrl'];
			}
			else
			{
        			// Failure
			}

			$Sfid = $folder . $_SESSION["uid"];

			echo"
                        	<!-- Start Shred-->
                        	<div class=\"tabLatest mb15\">
                        	<!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                       		<!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
				<a href=\"#\"><img src=\"http://graph.facebook.com/" . $uid . "/picture\" class=\"fl mr15 pic\" /></a>
                        	<div class=\"result\">
                        	<h3><a href=\"http://howlix.com/shred2/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> <!--Title-->
                        	<p class=\"snippet\"> " . $snippet . " </p>
                        	<p><small>added by " . $ushred_name . " at " . $date . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\"> " . $folder . "</a></small></p>
                        	</div>
                        	</div>
                        	<!-- End Shred -->
                        	<hr />
                	";
		}
	}
	else
	{
		// Nothing
	}


sqlEnd();
?>

</div>

<p><span style="color:red">(BUG) NOTES:</span></p>
<p>
<ul>
	<li>sidebar search</li>
	<li>sort with form</li>
	<li>Update DEP pages + backend changes</li>
	<li>post.php</li>
	<li>home redirect</li>
	<li>social modal</li>
	<li>folder.php squawk error</li>
	<li>FB.API Friendlist</li>
	<li>chrome ext.</li>
	<li>Display Name where UID visible</li>
	<li>delete.php bug for folders (Content deletion)</li>
	<li><span style="color:red">FINAL FLOW REVISIONS</span></li>
	
</ul>
</p>

<?php
// Footers
require 'footer.php'; 
?>

<!--
<script>
$('[name="type"]').change(function() {
  $(this).closest('form').submit();
});
</script>
-->

