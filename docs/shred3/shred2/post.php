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
$file_id = $_GET["id"];

$mysql = "SELECT * FROM $main_table WHERE ID=$file_id";
$put = mysql_query($mysql) or die(mysql_error());

if ($put)
{
        $out = mysql_fetch_array($put);

	$ref_id = $out['ID'];
        $ref_date = $out['date'];
        $ref_title = $out['title'];
        $ref_folder = $out['folder'];
        $ref_user = $out['user'];
        $ref_uid = $out['uid'];
        $ref_url = $out['url'];
        $ref_type = $out['type'];
        $ref_snippet = $out['snippet'];
}
else
{
	// Failure
}
?>

<div class="col-md-9" id="mainCol">
		<div id="submit-success" class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> <em>Stairway To Heaven</em> has been submitted to your ShredFeed!
		</div>


		<h2>
			<span class="fr">
				<a href="#" title="Add This To A Folder" class="mr15" id="importTopic"><span class="glyphicon glyphicon-import"></span> Import</a>
				<a href="#" title="Share This With Friends" data-toggle="modal" data-target=".bs-example-modal-sm" class="mr15"><span class="glyphicon glyphicon-share-alt"></span> Share</a>
			</span>
			<?php echo $ref_title; ?>	
		</h2>

		
		<div class="alert alert-info" id="inviteBox">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>Add Stairway To Heaven To Your Own ShredFeed</h4>
		 	<p>Save all of what you find interesting on the web to your own ShredFeed wall for your friends to see and share.</p>
		 	<a href="#" class="alert-link"><span class="glyphicon glyphicon-circle-arrow-right"></span> Sign Up Now!</a>
		</div>
		<div class="alert alert-info" id="addContentBox">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<h4>Add Stairway To Heaven To Your ShredFeed</h4>
		 	<select class="mb15">
		 		<option>Select one of your ShredFeed folders:</option>
		 		<option>Create a new folder</option>
		 		<option>Lose It Diet</option>
		 		<option>Steelers</option>
		 		<option>Gossip</option>
		 		<option>Facebook Shares</option>
		 	</select>
		 	<br />
		 	<a href="stairway.html?submit=yes" class="btn btn-primary btn-xs">Add To My ShredFeed</a>
		</div>
		<ul class="nav nav-tabs mb15 contentTabs">
			<li class="active"><a href="#home" data-toggle="tab">Shred</a></li>
			<li><a href="#comments" data-toggle="tab">Comments</a></li>
			<li><a href="#video" data-toggle="tab">Video</a></li>
		</ul>
<?php
$sql = "SELECT * FROM $main_table WHERE ID=$file_id";
$result = mysql_query($sql) or die(mysql_error());

if ($result)
{
	$row = mysql_fetch_array($result);
   	
      	$id = $row['ID'];
      	$date = $row['date'];
      	$title = $row['title'];
  	$folder = $row['folder'];
    	$user = $row['user'];
       	$uid = $row['uid'];
       	$url = $row['url'];
    	$type = $row['type'];
    	$snippet = $row['snippet'];

	echo "
		<div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"home\">
				<iframe name=\"iframe\" id=\"iframe\" src=\"" . $url . "\" width=\"100%\" height=\"850\"></iframe>
                        </div>
                        <div class=\"tab-pane\" id=\"comments\">
				<!-- Comments -->
				<h1>Comments</h1>
                        </div>
                        <div class=\"tab-pane\" id=\"video\">
				<!-- Video -->
				<h1>Video</h1>
                        </div>
                </div>
	";	
}
else
{
	// Failure
}

?>
	</div>
<?php
// Footers
require 'footer.php'; 
?>
