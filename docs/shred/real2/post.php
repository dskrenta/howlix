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

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
					<h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $count . "\"><span class=\"glyphicon glyphicon-chevron-down fr\"></span></a><a href=\"http://howlix.com/shred/real/folder.php?folder=" . $folder . "\"> " . $folder . " </a></h4>
				</div>
				<div id=\"collapse" . $count . "\" class=\"panel-collapse collapse\">
					<div class=\"panel-body\">
						<ul id=\"tabList\">
							<li>
								<span class=\"listIcons\"><a href=\"#collapse" . $count . "\" class=\"glyphicon glyphicon-remove\"></a></span>
								<a href=\"\">Stairway To Heaven</a>
							</li>
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
			<strong>Success!</strong> <em>Stairway To Heaven</em> has been submitted to your ShredFeed!
		</div>


		<h2 class="mb15">My Shreds</h2>
		<div id="folderButtonsSm">
			<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-share-alt mr5"></span> Share This Page</a>
		</div>
		<div class="clear mb15"></div>

		
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
		<br />

		<!-- Dynamic Begin -->
		<?php
// GET ID
$getId = $_GET["id"];

// Vars
$host="localhost"; // Host name 
$username="wordpress"; // Mysql username 
$password="dtechblog777"; // Mysql password 
$db_name="wordpress"; // Database name 
$tbl_name="shredstore4"; // Table name 

// Connect to server and select database.
mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Retrive data from database 
//$sql = "SELECT * FROM $tbl_name";
//$sql="SELECT * FROM $tbl_name ORDER BY ID DESC";
$sql="SELECT * FROM $tbl_name WHERE ID='$getId'";
$result = mysql_query($sql) or die(mysql_error());

// If successful... 
if($result)
{
        // If Successfully...

        while($row = mysql_fetch_array($result))
        {
		// Data Extract
                $id = $row['ID'];
		$date = $row['date'];
                $title = $row['title'];
                $folder = $row['folder'];
		$user = $row['user'];
		$url = $row['url'];
		$icon = $row['icon'];
		$snippet = $row['snippet'];

		// URL Regex
                $input = $url;

                // In case scheme relative URI is passed, e.g., //www.google.com/
                $input = trim($input, '/');

                // If scheme not included, prepend it
                if (!preg_match('#^http(s)?://#', $input)) {
                        $input = 'http://' . $input;
                }

                $urlParts = parse_url($input);

                // Remove www
                $domain = preg_replace('/^www\./', '', $urlParts['host']);

		// Display 		
		echo"
		<ul class=\"nav nav-tabs mb15\">
			<li class=\"active\"><a href=\"#home\" data-toggle=\"tab\">Shred</a></li>
			<li><a href=\"#comments\" data-toggle=\"tab\">Comments</a></li>
		</ul>
		<div class=\"tab-content\">
			<div class=\"tab-pane active\" id=\"home\">
				<iframe name=\"iframe\" id=\"iframe\" src=\"http://" . $domain  . "\" width=\"100%\" height=\"850\"></iframe>
			</div>
			<div class=\"tab-pane\" id=\"comments\">
				<div class=\"fb-comments\" data-href=\"http://howlix.com/shred/real/post.php?id=" . $getId . "\" data-numposts=\"100\" data-colorscheme=\"light\"></div>
			</div>
		</div>	
		";
        }

}

else
{
        // Else...
        echo "Error, Could not retrive... <br>";
}

mysqli_close();

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

</body>
</html>
