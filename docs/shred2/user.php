<?php
// ShredFeed index.php

// Required 
//require 'save.php';
require 'session.php';
require 'sql.php';
require 'functions.php';

// Page owner 

$owner = $_GET["uid"];

// MySQL
$sql = "SELECT * FROM $user_table WHERE uid='$owner'";
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

// Headers
require 'header.php';
require 'fb_main.php';

// Main
require 'sidebar.php';
?>

<div class="col-md-9" id="mainCol">
		<div id="submit-success" class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> <em>Freebird</em> has been added to your ShredFeed!
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

		<h2>
			<span class="fr">
				<a href="#" title="Share This With Friends" data-toggle="modal" data-target=".bs-example-modal-sm" class="mr15"><span class="glyphicon glyphicon-share-alt"></span> Share</a>
			</span>
			
			<?php echo $user_name; ?>'s ShredFeed  
		</h2>
		<div id="folderButtonsSm">

			<?php
			$sql = "SELECT * FROM $folder_table WHERE uid=$user_uid ORDER BY ID DESC";
        		$result = mysql_query($sql) or die(mysql_error());

        		if ($result)
        		{
                		while($row = mysql_fetch_array($result))
                		{
                        		$id = $row['ID'];
                        		$date = $row['date'];
                        		$folder = $row['folder'];
                        		$user = $row['user'];
                        		$fid = $row["folderid"];
                        		$description = $row['description'];

                        		$Sfid = $folder . $_SESSION["uid"];

					echo "<a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\">" . $folder . "</a>";
				}
			}

			else
			{
				// Failure
			}

			/*
			<a href="folder_guitar.html?own=no">Lose It Diet</a>
			<a href="folder_guitar.html?own=no">Steelers</a>
			<a href="folder_guitar.html?own=no">Gossip</a>
			<a href="folder_guitar.html?own=no">Facebook Shares</a>
			*/			

			?>
		</div>

		<div class="clear mb15"></div>
		<br /><br />
		<h4>All Of <?php echo $user_name; ?>'s Shreds</h4>
		<hr />

<?php
//sqlStart();
	//sqlQuery("SELECT * FROM $main_table ORDER BY ID DESC");

	$sql = "SELECT * FROM $main_table WHERE uid=$user_uid ORDER BY ID DESC";
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
			$type = $row['type'];
			$url = $row['url'];
                	$icon = $row['icon'];
                	$snippet = $row['snippet'];

			echo"
                        	<!-- Start Shred-->
                        	<div class=\"tabLatest mb15\">
                        	<!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                       		<!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
				<a href=\"#\"><img src=\"http://graph.facebok.com/" . $uid . "/picture\" class=\"fl mr15 pic\" /></a>
                        	<div class=\"result\">
                        	<h3><a href=\"http://howlix.com/shred/real/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> <!--Title-->
                        	<p class=\"snippet\"> " . $snippet . " </p>
                        	<p><small>added by " . $user . " at " . $date . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred/real/folder.php?folder=" . $folder . "\"> " . $folder . " </a> &bull; <a href=\"#\">2 comments</a> </small></p>
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

// Footers
require 'footer.php'; 
?>
