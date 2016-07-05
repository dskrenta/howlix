<?php
// ShredFeed folder.php

// TODO
// Add own to folder.php

// Required 
//require 'save.php';
require 'sql.php';
require 'functions.php';
//require 'account.php';

// Headers
require 'header.php';
require 'fb_main.php';

// Main
require 'sidebar.php';

// Folder Name
$folder_name = $_GET["folder"];
$folder_id = $_GET["fid"];

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
	
		<h2 class="mb15">		

		<?php
			$outUID = $_GET["squawk"];

			if ($outid == $folder_id)
			{
				// own=yes
				echo "
					<span class=\"fr\">
						<a href=\"#\" title=\"Got more to add to this folder?\" data-toggle=\"modal\" data-target=\"#myModal2\" class=\"mr15\"><span class=\"glyphicon glyphicon-plus-sign\"></span> <span id=\"ownYes\">Add</span></a>
                                		<a href=\"#\" title=\"Share This With Friends\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" class=\"mr15\"><span class=\"glyphicon glyphicon-share-alt\"></span> Share</a>
					</span>
				";
			}
			else
			{
				// own=no
				echo "
                                        <span class=\"fr\">
						<a href=\"#\" title=\"Got more to add to this folder?\" data-toggle=\"modal\" data-target=\"#myModal2\" class=\"mr15\"><span class=\"glyphicon glyphicon-plus-sign\"></span> <span id=\"ownYes\">Recommend</span></a>
                                                <a href=\"#\" title=\"Make This Page Your Own\" class=\"mr15\"><span class=\"glyphicon glyphicon-import\"></span> Import</a>
                                                <a href=\"#\" title=\"Share This With Friends\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" class=\"mr15\"><span class=\"glyphicon glyphicon-share-alt\"></span> Share</a>
                                        </span>
                                ";
			}
		?>

		<?php echo $folder_name; ?>
		</h2>

		<!--
		<h2 class="mb15">
			<span class="fr">
				<a href="#" title="Got more to add to this folder?" data-toggle="modal" data-target="#myModal2" class="mr15"><span class="glyphicon glyphicon-plus-sign"></span> <span id="ownYes">Add</span></a>
				<a href="#" title="Make This Page Your Own" class="mr15" id="importTopic"><span class="glyphicon glyphicon-import"></span> Import</a>
				<a href="#" title="Share This With Friends" data-toggle="modal" data-target=".bs-example-modal-sm" class="mr15"><span class="glyphicon glyphicon-share-alt"></span> Share</a>
			</span>
			<?php echo $folder_name; ?>
		</h2>
		-->

<?php
//sqlStart();
	//sqlQuery("SELECT * FROM $main_table ORDER BY ID DESC");

	//$sql = "SELECT * FROM $main_table WHERE ID='$folderID' ORDER BY ID DESC";
	
	$sql = "SELECT * FROM $main_table WHERE extra='$folder_id'";
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
			$type = $row['type'];
                	$snippet = $row['snippet'];

			echo"
                        	<!-- Start Shred-->
                        	<div class=\"tabLatest mb15\">
                        	<!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                       		<!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
				<a href=\"#\"><img src=\"http://graph.facebook.com/" . $user . "/picture \" class=\"fl mr15 pic\" /></a>
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
