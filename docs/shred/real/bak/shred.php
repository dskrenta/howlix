<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Latest On ShredFeed</title>

<!-- Bootstrap -->
<link href="http://egon.io/shred2/css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="http://egon.io/shred2/css/style.css" />
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://egon.io/shred2/js/bootstrap.js"></script>

<script type="text/javascript">
jQuery(function ($) { $("a").tooltip() });
</script>
<script type="text/javascript">
  function launch_modal(id) {
     // Hide all modals using class if required.
     $('.modal').modal('hide');
     $('#'+id).modal('show');
  }
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#selectall').click(function () {
        $('.selectedId').prop('checked', this.checked);
    });

    $('.selectedId').change(function () {
        var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
        $('#selectall').prop("checked", check);
    });
});
</script>

<script type='text/javascript'> 
$(window).load(function(){
    $('#submit-success').hide();
    $('#submitShred').on('click', function () {
        console.log('here');
        $('#submit-success').show();
    });
}); 
</script>
<script type="text/javascript"> 
	$(function(){ 
		if (document.location.href.indexOf('invite=yes') > 0) 
		$("#inviteUrl").show();
		if (document.location.href.indexOf('tutorial=yes') > 0) 
		$(".theTutorial").show();
	});
</script>
</head>
<body id="content">
<div class="col-md-12 dropdown" id="header">
	<div id="headerCenter"> 
		<div id="userPanel">
			<span>
			<a href="#" data-toggle="dropdown" class="glyphicon glyphicon-user dropdown-toggle"></a>
			<ul class="dropdown-menu dropdown-menu-right">
				<li><a href="index.html">Logout</a></li>
			</ul>
	    	</span>
		</div>
		<h1><a href="shredsMain.html">ShredFeed</a></h1>
	</div>
</div>
<div id="wrapper" class="col-md-12 container-fluid">
	<div class="col-md-3" id="leftCol">
		<form action="searchResults.html">
			<input type="search" results="5" placeholder="search..." name="s">
		</form>

		<h3><span style="left:auto !important;right:0;"><a href="folderNew.html" class="glyphicon glyphicon glyphicon-plus-sign" rel="tooltip" data-placement="left" title="add a new folder"></a></span>David's Folders</h3>

<?php
//Vars
$table_folder = "shredfold";
$db_folder = "wordpress";
$table_shred = "shredstore2";

// Connect to server and select database.
mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
mysql_select_db("$db_folder")or die("cannot select DB");

// Data
$code = "SELECT * FROM $table_folder ORDER BY ID DESC";
$result = mysql_query($code) or die(mysql_error());

$count = 1;

if($result)
{
	while($row = mysql_fetch_array($result))
        {
		$id = $row['ID'];
                $date = $row['date'];
                $folder = $row['folder'];
		$user = $row['user'];
		$description = $row['description'];
	
		echo"
		<div class=\"panel-group\" id=\"accordion\">
			<div class=\"panel panel-default\">
				<div class=\"panel-heading\">
					<h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $count . "\"><span class=\"glyphicon glyphicon-chevron-down fr\"></span></a><a href=\"folder_guitar.html\"> " . $folder . " </a></h4>
				</div>
				<div id=\"collapse" . $count . "\" class=\"panel-collapse collapse\">
					<div class=\"panel-body\">
						<ul id=\"tabList\">
						";
						
						// Data
						$mysql = "SELECT * FROM $table_shred WHERE folder='$folder'";
						$out = mysql_query($mysql) or die(mysql_error());
					
						if($result)
						{
							while($row = mysql_fetch_array($out))
                                                     	{
								$shred_id = $row['ID'];
                                                          	$shred_date = $row['date'];
                                                           	$shred_title = $row['title'];
                                                          	$shred_folder = $row['folder'];
                                                             	$shred_user = $row['user'];
                                                             	$shred_url = $row['url'];
                                                         	$shred_icon = $row['icon'];
                                                           	$shred_snippet = $row['snippet'];
	
								echo"
									<li>
									<span class=\"listIcons\"><a href=\"#collapse" . $count . "\" class=\"glyphicon glyphicon-remove\"></a></span>
									<a href=\"http://howlix.com/shred/real/post.php?id=" . $id . "\">" . $shred_title . "</a>
									</li>
								";
							}
						}
	
						else{}

						echo"
						</ul>
					</div>
				</div>
			</div>	
		</div>
		";

		$count = $count + 1;
	}
}

else
{
	// Nothing
}
?>
	</div>

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

		<h2>
			<span class="fr">
				<a href="#">Friends</a> | 
				<strong>Everyone</strong> |
				<select>
					<option selected>Show Everything</option>
					<option>Web Pages</option>
					<option>Videos</option>
					<option>Pictures</option>
					<option>Documents</option>
				</select>
			</span>
			The Latest Shreds
		</h2>

		<!-- Dynamic Begin -->
		<?php

// Vars
$host="localhost"; // Host name 
$username="wordpress"; // Mysql username 
$password="dtechblog777"; // Mysql password 
$db_name="wordpress"; // Database name 
$tbl_name="shredstore2"; // Table name 

// Connect to server and select database.
mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Retrive data from database 
//$sql = "SELECT * FROM $tbl_name";
$sql="SELECT * FROM $tbl_name ORDER BY ID DESC";
$result = mysql_query($sql) or die(mysql_error());

// If successful... 
if($result)
{
        // If Successfully...

//<div class="media">
//  <a class="pull-left" href="#">
//    <img class="media-object" src="..." alt="...">
//  </a>
//  <div class="media-body">
//    <h4 class="media-heading">Media heading</h4>
//    ...
//  </div>
//</div>

        while($row = mysql_fetch_array($result))
        {
                //echo $row['title'] . " " . $row['url'];
                //echo "<br>";

                $id = $row['ID'];
		$date = $row['date'];
                $title = $row['title'];
                $folder = $row['folder'];
		$user = $row['user'];
		$url = $row['url'];
		$icon = $row['icon'];
		$snippet = $row['snippet'];

		// Regex for Url
                $input = $url;

                // in case scheme relative URI is passed, e.g., //www.google.com/
                $input = trim($input, '/');

                // If scheme not included, prepend it
                if (!preg_match('#^http(s)?://#', $input)) {
                        $input = 'http://' . $input;
                }

                $urlParts = parse_url($input);

                // remove www
                $domain = preg_replace('/^www\./', '', $urlParts['host']);

		echo"
			<!-- Start Shred-->
                      	<div class=\"tabLatest mb15\">
                      	<!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                     	<a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a>
                 	<div class=\"result\">
                  	<h3><a href=\"http://howlix.com/shred/real/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> <!--Title-->
                    	<p class=\"snippet\"> " . $snippet . " </p>
			<p><small>added by " . $user . " at " . $date . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred/real/folder.php?id=$id\"> " . $folder . " </a> &bull; <a href=\"#\">2 comments</a> </small></p>
                      	</div>
                    	</div>
                      	<!-- End Shred -->
                      	<hr />
		";
		
                //else
                //{
                //        // Nothing...
                //}
        }

}

else
{
        // Else...

        echo "Error, Could not retrive... <br>";
}

mysqli_close();

//$myurl = "http://www.flickr.com/photos/thecancerus/2869110105/";
//$satus = check_url($myurl);
//if($satus == '200')
//      echo "Its works";
//else
//      echo "broken url";


//Functions

function check_url($url)
{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
        return $headers['http_code'];
}
		?>
		<!-- Dynamic End -->

	</div>
	<div class="col-md-12" id="footer">
		<span class="fr">&copy; 2014, ShredFeed</span>
		<ul>
			<li><a href="#">About</a></li>
			<li><a href="#">Help</a></li>
			<li><a href="#">Support</a></li>
		</ul>
	</div>
</div>



<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Share With Your Friends</h4>
			</div>
			<div class="modal-body">
				<small>Select friends to share ShredFeed with.</small><br /><br />
				<ul class="fbList">
					<li>
						<label for="page">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1/c73.31.391.391/484484_10151104907812289_880854735_n.jpg" class="fl" />
							<input type="checkbox" value="" id="page" class="fr">
							<strong>Jimmy Smith</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="ono">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1/c33.33.414.414/p480x480/578455_961201065052_83263660_n.jpg" class="fl" />
							<input type="checkbox" value="" id="ono"  class="fr">
							<strong>John Johnson</strong>
							<div class="clear"></div>
						</label>
		            </li>
					<li>
						<label for="diddly">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1/c120.0.480.480/p480x480/1383938_10151784711648892_55257100_n.jpg" class="fl" />
							<input type="checkbox" value="" id="diddly"  class="fr">
							<strong>Bo Winklestein</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="joplin">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1/c33.33.414.414/148886_10151056430352751_731841953_n.jpg" class="fl" />
							<input type="checkbox" value="" id="joplin"  class="fr">
							<strong>Janis Rosembaum</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li>
						<label for="halen">
							<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc1/t1/c33.33.414.414/p480x480/577566_10100597633264943_1110428705_n.jpg" class="fl" />
							<input type="checkbox" value="" id="halen"  class="fr">
							<strong>Eddy von Humphries</strong>
							<div class="clear"></div>
						</label>
		            </li>
		            <li class="inviteFB">
		            	<form action="searchResults.html" class="mt15">
							<input type="search" results="5" placeholder="search..." name="s">
						</form>
		            </li>
		        </ul>
		        <button type="button" class="btn btn-primary mt15" style="width:100%;" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Share This With Your Friends</button>
			</div>
			<div class="modal-body" style="padding: 5px; border: 1px solid #ddd; background: #f6f6f6;">
				<p class="mt15 ml15"><strong>Or share this on:</strong></p>
				<a href="#" title="Share on Facebook" class="shareButton fb_share"></a>
				<a href="#" title="Share on Twitter" class="shareButton t_share"></a>
				<a href="#" title="Share on Pinterest" class="shareButton p_share"></a>
				<a href="#" title="Send an Email" class="shareButton em_share"></a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="inviteFriends">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Add content songs to their new ShredFeed</h4>
			</div>
			<div class="modal-body" id="suggestContent">
				<input type="search" results="5" placeholder="search your content ..." name="s">
				<br /><br />
				<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifty">
					          Guitar Tabs
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFifty" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<label for="box1"><span class="listIcons"><input type="checkbox" id="box1" /></span>
									Stairway To Heaven</label>
								</li>
								<li>
									<label for="box2"><span class="listIcons"><input type="checkbox" id="box2" /></span>
									Blackbird</label>
								</li>
								<li>
									<label for="box3"><span class="listIcons"><input type="checkbox" id="box3" /></span>
									Purple Haze</label>
								</li>
								<li>
									<label for="box4"><span class="listIcons"><input type="checkbox" id="box4" /></span>
									Yer Blues</label>
								</li>
								<li>
									<label for="box5"><span class="listIcons"><input type="checkbox" id="box5" /></span>
									Time</label>
								</li>
								<li>
									<label for="box6"><span class="listIcons"><input type="checkbox" id="box6" /></span>
									Freebird</label>
								</li>
								<li>
									<label for="box7"><span class="listIcons"><input type="checkbox" id="box7" /></span>
									Eruption</label>
								</li>
								<li>
									<label for="box8"><span class="listIcons"><input type="checkbox" id="box8" /></span>
									Comfortably Numb</label>
								</li>
								<li>
									<label for="box9"><span class="listIcons"><input type="checkbox" id="box9" /></span>
									Layla</label>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiftyone">
					          Wish List
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFiftyone" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Mad Men, Season 5</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Breville BES870XL Barista Express Espresso Machine</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Led Zeppelin I (Deluxe CD Edition)</a>
								</li>
								<li class="lastLi">
									<span class="listIcons"><a href="#collapseTwo" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Apple iPad Air</a>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiftytwo">
					          Cat Videos
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFiftytwo" class="panel-collapse collapse">
					      <div class="panel-body">
					        <ul id="tabList">
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Cake Recipes - Allrecipes.com</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Creamy Egg Nog Recipe</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">How to Make Your Own Beer at Home</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Healthy Homemade Bread Recipes</a>
								</li>
								<li>
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Scrumptious Apple Pie recipe from ...</a>
								</li>
								<li class="lastLi">
									<span class="listIcons"><a href="#collapseThree" class="glyphicon glyphicon-remove"></a></span>
									<a href="stairway.html">Custards and Pudding Recipes</a>
								</li>
							</ul>
					      </div>
					    </div>
					  </div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary mt15" style="width:100%;" data-dismiss="modal" data-box="myAlert" id="submitShred">Create Their ShredFeeds</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
