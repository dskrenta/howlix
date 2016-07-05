<?php
// ShredFeed index.php

// Functions 
require 'sql.php';
require 'functions.php';

// Headers
require 'header.php';
//require 'fb.php';
//require 'sidebar_index.php';

// Main
?>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '883798324967126',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
function testAPI() 
{
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) 
        {
                console.log('Successful login for: ' + response.name);
                //document.getElementById('name').innerHTML = 'Name: ' + response.name;
                //document.getElementById('link').innerHTML = 'Link: ' + response.link;
                //document.getElementById('gender').innerHTML = 'Gender: ' + response.gender;
                //document.getElementById('id').innerHTML = 'Id: ' + response.id;
                var id = response.id;
                var name = response.name;
                window.location.assign("http://howlix.com/shred2/login.php?id=" + id + "&name=" + response.name)
        });
}
</script>

<div class="col-md-12 dropdown" id="header">
	<div id="headerCenter">
		<!-- 
		<div id="userPanel">
			<span>
			<a href="#" data-toggle="dropdown" class="glyphicon glyphicon-user dropdown-toggle"></a>
			<ul class="dropdown-menu dropdown-menu-right">
				<li><a href="index.html?login=no">Logout</a></li>
			</ul>
	    	</span>
		</div>
		-->
		<h1><a href="http://howlix.com/shred2">ShredFeed</a></h1>
	</div>
	<div id="promoLogin">
		<div id="promoCenter">
			<div style="float:right;margin-top:20px;">
				<!--<fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();"></fb:login-button>-->
				<div class="fb-login-button" data-max-rows="1" data-size="xlarge" onlogin="checkLoginState();" data-show-faces="false" data-auto-logout-link="false"></div>
			</div>
			<h1>Welcome to ShredFeed!</h1>
			<p>Join now to create feeds for your favorite stuff on the web like best movies,<br /> recipes, wishlists &amp; more for all your friends to see &amp; share.</p>
			<ul class="hide">
				<li><strong><em>Organize</em></strong> your favorite stuff with a ShredFeed.</li>
				<li><strong><em>Share</em></strong> your content with friends, family, facebook &amp; twitter</li>
				<li><strong><em>Discover</em></strong> interesting stuff that everyone else is sharing.</li>
			</ul>
			<!--<img src="imgs/fb_signin.png" width="100%" class="hide" />-->
			<!--<fb:login-button scope="public_profile,email" data_size="xlarge" onlogin="checkLoginState();"></fb:login-button>-->
		</div>
	</div>
</div>
<div id="wrapper" class="col-md-12 container-fluid" style="padding-top:210px;">
	<div class="col-md-3" id="leftColHome">
		<form action="searchResults.html">
			<input type="search" results="5" placeholder="search..." name="s">
		</form>

		<h3><span style="left:auto !important;right:0;"><a href="folderNew.html"></a></span>Create Your Folder</h3>

		<?php
			if (isset($_GET["type"]))
			{
				$type = $_GET["type"];
			}		
			
			else
			{
				$type = "everything";
			}
		?>

		<div class="panel-group">
			<div class="panel panel-default">
				<?php if($type == "everything") {echo "<div class=\"panel-heading panel-active\">";} else{echo "<div class=\"panel-heading\">";}  ?>
				<!-- <div class="panel-heading panel-active"> -->
					<h4 class="panel-title"><a href="http://howlix.com/shred2/index.php?type=everything">Most Recent</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<?php if($type == "website") {echo "<div class=\"panel-heading panel-active\">";} else{echo "<div class=\"panel-heading\">";}  ?>
				<!-- <div class="panel-heading"> -->
					<h4 class="panel-title"><a href="http://howlix.com/shred2/index.php?type=website">Web</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<?php if($type == "image") {echo "<div class=\"panel-heading panel-active\">";} else{echo "<div class=\"panel-heading\">";}  ?>
				<!-- <div class="panel-heading"> -->
					<h4 class="panel-title"><a href="http://howlix.com/shred2/index.php?type=image">Images</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<?php if($type == "video") {echo "<div class=\"panel-heading panel-active\">";} else{echo "<div class=\"panel-heading\">";}  ?>
                                <!-- <div class="panel-heading"> -->
                                        <h4 class="panel-title"><a href="http://howlix.com/shred2/index.php?type=video">Videos</a></h4>
                                </div>
                        </div>
			<div class="panel panel-default">
				<?php if($type == "document") {echo "<div class=\"panel-heading panel-active\">";} else{echo "<div class=\"panel-heading\">";}  ?>
                                <!-- <div class="panel-heading"> -->
                                        <h4 class="panel-title"><a href="http://howlix.com/shred2/index.php?type=document">Documents</a></h4>
                                </div>
                        </div>
		</div>
	</div>
	<div class="col-md-9" id="mainCol">
		<div id="submit-success" class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> Your friends will now be notified about their new ShredFeeds!
		</div>

		<h2>
			<span class="fr">
				<select>
					<option selected>Show Everything</option>
					<option>Web Pages</option>
					<option>Videos</option>
					<option>Pictures</option>
					<option>Documents</option>
				</select>
			</span>
			<?php
				if ($type == "everything")
				{
					echo "The Latest Shreds";	
				}

				else
				{
					echo "The Latest Shreds Sorted by " . $type;
				}
			?>
		</h2>
<?php
//sqlStart();
        //sqlQuery("SELECT * FROM $main_table ORDER BY ID DESC");

	if (isset($_GET["load"]))
        {
                $limit = $_GET["load"];
        }

        else
        {
                $limit = 10;
        }

	if ($type == "everything")
	{
        	$sql = "SELECT * FROM $main_table ORDER BY ID DESC LIMIT $limit";
        }
	
	else
	{
		$sql = "SELECT * FROM $main_table WHERE type='$type' ORDER BY ID DESC LIMIT $limit";
	}
	
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

			/*
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
			*/

			echo"
                                <!-- Start Shred-->
                                <div class=\"tabLatest mb15\">
                                <!--<a href=\"#\"><img src=\"http://static.ddmcdn.com/en-us/skins/hsw/misc/favicon.ico\" class=\"fl mr15 pic\" /></a>--> <!-- Placholder! Icon -->
                                <!-- <a href=\"#\"><img src=\"http://google.com/s2/favicons?domain=www." . $domain . " \" class=\"fl mr15 pic\" /></a> -->
                                <a href=\"http://howlix.com/shred2/user.php?uid=" . $uid . "\"><img src=\"http://graph.facebook.com/" . $uid . "/picture\" class=\"fl mr15 pic\" /></a>
                                <div class=\"result\">
                                <!-- <h3><a href=\"http://howlix.com/shred2/post.php?id=$id\" class=\"black title\"> " . $title . " </a></h3> --> <!--Title-->
                                <h3><a href=\"http://howlix.com/shred2/user.php?uid=$uid\" class=\"black title\"> " . $user . "</a><a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\"><small class=\"muted\"> @" . $folder . "</a> &bull; " . nicetime($date) . "</small></h1>
                        ";

                        if ($type == "website")
                        {
                                //echo "
                                //<p class=\"snippet\"><iframe src=\"" . $url . "\" width=\"560\" height=\"315\"></iframe></p>
                                //";

                                echo "<p>" . $user . " uploaded a link: <a href=\"http://howlix.com/shred2/post.php?id=" . $id . "\">" . $title . "</a> @" . $folder . "</p>";

				echo "<!-- <a href=\"http://howlix.com/shred2/post.php?id=" . $id . "\"><button type=\"button\" class=\"btn btn-primary\">View full post</button></a> -->";
                        }

                        elseif ($type == "video")
                        {
                                echo "
                                <p class=\"snippet\"> " . $snippet . " </p>
                                ";
                        }

                        elseif ($type == "image")
                        {
                                echo "
                                <a href=\"http://howlix.com/shred2/post.php?id=" . $id . "\"><p class=\"snippet\"><img src=\"" . $url . "\" width=\"560\" alt=\"\"></img></p></a>
                                ";
                        }

                        elseif ($type == "document")
                        {
                                echo "
                                <p class=\"snippet\"><iframe src=\"" . $url . "\" width=\"560\" height=\"315\"></iframe></p>
                                ";

                        }

                        else
                        {
                                // Failure
                        }

                        /*
                        echo "        
                                <!-- <p class=\"snippet\"> " . $snippet . " </p> --> 
                                <p><small>added by " . $ushred_name . " at " . nicetime($date) . " &bull; <a href=\" " . $url . " \" target=\"_new\"> " . $url . " </a> &bull; <a href=\"http://howlix.com/shred2/folder.php?folder=" . $folder . "&fid=" . $fid . "&squawk=" . $Sfid . "\"> " . $folder . "</a></small></p>
                                </div>
                                </div>
                                <!-- End Shred -->
                                <hr />
                        ";
                        */

                        echo "
                                        <p>
                                        <table>
                                        <tr>
                                        <td>
                                        <a href=\"http://howlix.com/shred2/post.php?id=" . $id . "\"><button type=\"button\" class=\"btn btn-default btn-xs\">View full post</button></a>
                                        </td><td style=\"padding: 10px\">
                        ";

			if ($window_uid == $uid)
                        {
                                // Own == Yes
                                echo "
                                        <a href=\"http://howlix.com/shred2/addContent.php?folder=" . $folder . "\"><button type=\"button\" class=\"btn btn-default btn-xs\">Add</button></a>
                                        </td><td style=\"padding: 0px\">
                                        <form method=\"post\" action=\"delete.php\">
                                        <input type=\"hidden\" name=\"rowid\" value=\"" . $id . "\" />
                                        <input type=\"hidden\" name=\"userid\" value=\"" . $uid . "\" />
                                        <input type=\"hidden\" name=\"table\" value=\"shredstore5\" />
                                        <input type=\"hidden\" name=\"folder\" value=\"" . $folder . "\" />
                                        <input type=\"submit\" class=\"btn btn-default btn-xs\" value=\"Delete\"></input>
                                        </form>
                                ";
                        }

                        else
                        {
                                // Own == No
                                echo "
                                        <a href=\"http://howlix.com/shred2/addContent.php?folder=" . $folder . "\"><button type=\"button\" class=\"btn btn-default btn-xs\">Suggest</button></a>
                                        </td><td style=\"padding: 0px\">
                                        <a href=\"#\"><button type=\"button\" class=\"btn btn-default btn-xs\">Import</button></a>
                                ";
                        }

                        echo "
                                        <!-- <a href=\"http://howlix.com/shred2/addContent.php?folder=" . $folder . "\"><button type=\"button\" class=\"btn btn-default btn-xs\">Add Content @" . $folder . "</button></a> -->
                                        </td><td style=\"padding: 10px\">
                                        <div class=\"fb-like\" data-href=\"http://howlix.com/shred2/post.php?id=" . $id . "\" data-layout=\"button_count\" data-action=\"like\" data-show-faces=\"false\" data-share=\"true\"></div>
                                        </td>
                                        </tr>
                                        </table>
                                        </p>
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

<center>
<?php
if (isset($_GET["load"]))
{
        $load = $_GET["load"];
        $new_page = $load + 10;
        echo "
                <a href=\"http://howlix.com/shred2/index.php?load=" . $new_page . "\"><button type=\"button\" class=\"btn btn-primary btn-lg btn-block\">Load More</button></a>
        ";
}

else
{
        echo "
                <a href=\"http://howlix.com/shred2/index.php?load=20\"><button type=\"button\" class=\"btn btn-primary btn-lg btn-block\">Load More</button></a>
        ";
}
?>
</center>

</div>

<?php
// Footers
require 'footer.php'; 
?>
