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

		<?php
			$outUID = $_GET["squawk"];

                        if ($outUID == $folder_id)
                        {
                                // own=yes

				$query = "SELECT * FROM $recommend_table WHERE folder='$folder_name'";
                        	$result = mysql_query($query) or die(mysql_error());

                        	$num_rows = mysql_num_rows($result);

                        	if ($num_rows > 0)
                        	{
                                	echo "
                                        	<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                                        	<h4><strong>" . $num_rows . " Recommendations For " . $folder_name . ":</strong></h4>
                                        	<ul class=\"recommenders\">
                                	";

                                	while($row = mysql_fetch_array($result))
                               	 	{
                                        	$r_id = $row['ID'];
                                        	$r_date = $row['date'];
                                        	$r_title = $row['title'];
                                        	$r_folder = $row['folder'];
                                        	$r_user = $row['user'];
                                        	$r_uid = $row['uid'];
                                        	$r_url = $row['url'];
                                        	$r_fid = $row['extra'];
                                        	$r_type = $row['type'];
                                        	$r_snippet = $row['snippet'];

                                        	echo "
                                                	<li><a href=\"user.html\">" . $r_user . "</a> recommends <strong>" . $r_url . "</strong> <small class=\"ml15\"><a href=\"http://howlix.com/shred2/accept.php?id=$r_id&date=$r_date&title=$r_title&folder=$r_folder&user=$r_folder&uid=$r_uid&extra=$r_fid&type=$r_type&snippet=$r_snippet\">accept</a> &bull; <a href=\"#\">decline</a></small></li>
                                        	";
                                	}

                                	echo "
                                        	</ul>
                                        	<div class=\"clear\"></div>
                                        	</div>  
                                	";
                        	}

                        	else
                        	{
                                	// No Recommendations
                        	}
                        }
                        else
                        {
                                // own=no
                        }
		?>

		<?php
			/*

			$query = "SELECT * FROM $recommend_table WHERE folder='$folder_name'";
			$result = mysql_query($query) or die(mysql_error());

			$num_rows = mysql_num_rows($result);

			if ($num_rows > 0)
        		{
				echo "
					<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                  			<h4><strong>" . $num_rows . " Recommendations For " . $folder_name . ":</strong></h4>
                  			<ul class=\"recommenders\">
				";

                		while($row = mysql_fetch_array($result))
               			{
                        		$r_id = $row['ID'];
                        		$r_date = $row['date'];
                        		$r_title = $row['title'];
                        		$r_folder = $row['folder'];
                        		$r_user = $row['user'];
                        		$r_uid = $row['uid'];
                        		$r_url = $row['url'];
                        		$r_fid = $row['extra'];
                        		$r_type = $row['type'];
                        		$r_snippet = $row['snippet'];
	
					echo "
						<li><a href=\"user.html\">" . $r_user . "</a> recommends <strong>" . $r_url . "</strong> <small class=\"ml15\"><a href=\"http://howlix.com/shred2/accept.php?id=$r_id&date=$r_date&title=$r_title&folder=$r_folder&user=$r_folder&uid=$r_uid&extra=$r_fid&type=$r_type&snippet=$r_snippet\">accept</a> &bull; <a href=\"#\">decline</a></small></li>
					";
				}
				
				echo "
					</ul>
                  			<div class=\"clear\"></div>
                			</div>	
				";
			}

			else
			{
				// No Recommendations
			}

			*/
		?>

		<!--
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <h4><strong>2 Recommendations For Guitar Tabs:</strong></h4>
		  <ul class="recommenders">
		  	<li><a href="user.html">Nick Sorrentino</a> recommends <strong>Casey Jones</strong> <small class="ml15"><a href="#">accept</a> &bull; <a href="#">decline</a></small></li>
		  	<li><a href="user.html">Mike Markson</a> recommends <strong>Uncle John's Band</strong> <small class="ml15"><a href="#">accept</a> &bull; <a href="#">decline</a></small></li>
		  </ul>
		  <div class="clear"></div>
		</div>
		-->		

		<h2 class="mb15">		

		<?php
			$outUID = $_GET["squawk"];

			if ($outUID == $folder_id)
			{
				// own=yes
				echo "
					<span class=\"fr\">
						<a href=\"http://howlix.com/shred2/addContent.php\" title=\"Got more to add to this folder?\" class=\"mr15\"><span class=\"glyphicon glyphicon-plus-sign\"></span> <span id=\"ownYes\">Add</span></a>
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
                                                <a href=\"http://howlix.com/shred2/import.php\" title=\"Make This Page Your Own\" class=\"mr15\"><span class=\"glyphicon glyphicon-import\"></span> Import</a>
                                                <a href=\"#\" title=\"Share This With Friends\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" class=\"mr15\"><span class=\"glyphicon glyphicon-share-alt\"></span> Share</a>
                                        </span>
                                ";
			}
		?>
		<?php echo $folder_name; ?>
		</h2>

		<!-- <h4><?php echo $outUID . $folder_id; ?></h4> -->		

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

			echo"
                        	<!-- Start Shred-->
                        	<div class=\"tabLatest mb15\">
                        	<!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                       		<!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
				<a href=\"#\"><img src=\"http://graph.facebook.com/" . $uid . "/picture \" class=\"fl mr15 pic\" /></a>
                        	<div class=\"result\">
                        	<h3><a href=\"http://howlix.com/shred/real/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> <!--Title-->
                        	<p class=\"snippet\"> " . $snippet . " </p>
                        	<p><small>added by " . $ushred_name . " at " . $date . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred/real/folder.php?folder=" . $folder . "\"> " . $folder . " </a> &bull; <a href=\"#\">2 comments</a> </small></p>
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
