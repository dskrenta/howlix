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

<script src="http://harvix.com/search/new/js/tab.js"></script>

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
	window.location.assign("http://howlix.com/shred2")
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
	window.location.assign("http://howlix.com/shred2")
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  //function checkLoginState() {
  //  FB.getLoginStatus(function(response) {
  //    statusChangeCallback(response);
  //  });
  //}

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

function logout() {
	FB.logout(function(response) {
  		// user is now logged out
		window.location.assign("http://howlix.com/shred2/logout.php")
	});	
}

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
                //window.location.assign("http://howlix.com/shred2/main.php?id=" + id + "&name=" + response.name)
		document.getElementById("name").innerHTML = response.name;
		var a = document.getElementById('name');
		a.href = "http://howlix.com/shred2/user.php?uid=" + response.id;
        });
}
</script>

<div class="col-md-12 dropdown" id="header">
	<div id="headerCenter"> 
		<div id="userPanel">
			<span>
			<a href="#" data-toggle="dropdown" class="glyphicon glyphicon-user dropdown-toggle"></a>
			<ul class="dropdown-menu dropdown-menu-right">
				<!--<li><a href="http://howlix.com/shred2/user.php?uid=">David Skrenta</a></li>-->
				<li><a id="name"></a></li>		
				<li><a href="http://howlix.com/shred2" onclick="logout()">Logout</a></li>
			</ul>
	    	</span>
		</div>
		<h1><a href="http://howlix.com/shred2">ShredFeed</a></h1>
	</div>
</div>

<div id="wrapper" class="col-md-12 container-fluid">
        <div class="col-md-3" id="leftCol">
                <form action="searchResults.html">
                        <input type="search" results="5" placeholder="search..." name="s">
                </form>

                <h3><span style="left:auto !important;right:0;"><a href="http://howlix.com/shred2/addFolder.php" class="glyphicon glyphicon glyphicon-plus-sign" rel="tooltip" data-placement="left" title="add a new folder"></a></span>David Skrenta's Folders</h3>


                		<div class="panel-group" id="accordion">
                        	<div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-chevron-down fr"></span></a><a href="http://howlix.com/shred2/folder.php?folder=Folder"> Folder </a></h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                            	<div class="panel-body">
                           	<ul id="tabList">
                 	
                                    		<li>
                                          	<span class="listIcons"><a href="#collapse1" class="glyphicon glyphicon-remove"></a></span>
                                        	<a href="http://howlix.com/shred/real/post.php?id=16">Example</a>
                                           	</li>
                                       	
				</ul>
				<ul class="folderTray">
				<li><a href="http://howlix.com/shred2/addContent.php?folder=Folder"  data-toggle="modal" title="Add Content" class="glyphicon glyphicon-plus"></a></li>
				<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" title="Share This Folder" class="glyphicon glyphicon-share"></a></li>
				<li><a href="#collapseTwo" title="Delete This Folder" class="glyphicon glyphicon-remove-circle"></a></li>
				</ul>
                         	</div>
                                </div>
                        	</div>  
                		</div>
                	
                		<div class="panel-group" id="accordion">
                        	<div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-chevron-down fr"></span></a><a href="http://howlix.com/shred2/folder.php?folder=Funny Images"> Funny Images </a></h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                            	<div class="panel-body">
                           	<ul id="tabList">
                 	
                                    		<li>
                                          	<span class="listIcons"><a href="#collapse2" class="glyphicon glyphicon-remove"></a></span>
                                        	<a href="http://howlix.com/shred/real/post.php?id=15">Speck of dust</a>
                                           	</li>
                                       	
				</ul>
				<ul class="folderTray">
				<li><a href="http://howlix.com/shred2/addContent.php?folder=Funny Images"  data-toggle="modal" title="Add Content" class="glyphicon glyphicon-plus"></a></li>
				<li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" title="Share This Folder" class="glyphicon glyphicon-share"></a></li>
				<li><a href="#collapseTwo" title="Delete This Folder" class="glyphicon glyphicon-remove-circle"></a></li>
				</ul>
                         	</div>
                                </div>
                        	</div>  
                		</div>
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

		<h2>Create A New ShredFeed Folder</h2>

		<form action="folderNew.php" method="post">

		<p><strong>1. Give your folder a name:</strong></p>
		<input type="text" placeholder="" name="foldername" style="" class="form-control" />
	
		<hr />

		<p><strong>2. Give you folder a description:</strong></p>
		<textarea type="text" class="form-control" name="decription"></textarea>
		
		<p></p>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
  		<li class="active"><a href="#home" role="tab" data-toggle="tab">Website</a></li>
  		<li><a href="#profile" role="tab" data-toggle="tab">Image</a></li>
  		<li><a href="#messages" role="tab" data-toggle="tab">Document</a></li>
		<li><a href="#messages" role="tab" data-toggle="tab">Import</a></li>
  		<li><a href="#settings" role="tab" data-toggle="tab">Video</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
 		<div class="tab-pane active" id="home">Hi</div>
  		<div class="tab-pane" id="profile">What</div>
  		<div class="tab-pane" id="messages">No</div>
  		<div class="tab-pane" id="settings">shit</div>
		</div>

		<p><strong>3. Import content from the following folders:</strong></p>
		<div id="folderButtons">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse50"><span class="glyphicon glyphicon-chevron-down"></span>Guitar Tabs</a>
						</h4>
					</div>
					<div id="collapse50" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="1a"><input type="checkbox" id="1a"> Stairway To Heaven</label></li>
								<li><label for="1b"><input type="checkbox" id="1b"> Blackbird</label></li>
								<li><label for="1c"><input type="checkbox" id="1c"> Purple Haze</label></li>
								<li><label for="1d"><input type="checkbox" id="1d"> Yer Blues</label></li>
								<li><label for="1e"><input type="checkbox" id="1e"> Time</label></li>
								<li><label for="1f"><input type="checkbox" id="1f"> Freebird</label></li>
								<li><label for="1g"><input type="checkbox" id="1g"> Eruption</label></li>
								<li><label for="1h"><input type="checkbox" id="1h"> Comfortably Numb</label></li>
								<li><label for="1i"><input type="checkbox" id="1i"> Layla</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse51"><span class="glyphicon glyphicon-chevron-down"></span>Wish List</a>
						</h4>
					</div>
					<div id="collapse51" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="2a"><input type="checkbox" id="2a"> Mad Men, Season 5</label></li>
								<li><label for="2b"><input type="checkbox" id="2b"> Breville BES870XL Barista Express Espresso Machine</label></li>
								<li><label for="2c"><input type="checkbox" id="2c"> Led Zeppelin I (Deluxe CD Edition)</label></li>
								<li><label for="2d"><input type="checkbox" id="2d"> Apple iPad Air</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse52"><span class="glyphicon glyphicon-chevron-down"></span>Recipes</a>
						</h4>
					</div>
					<div id="collapse52" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="3a"><input type="checkbox" id="3a"> Cake Recipes - Allrecipes.com</label></li>
								<li><label for="3b"><input type="checkbox" id="3b"> Creamy Egg Nog Recipe</label></li>
								<li><label for="3c"><input type="checkbox" id="3c"> How to Make Your Own Beer at Home</label></li>
								<li><label for="3d"><input type="checkbox" id="3d"> Healthy Homemade Bread Recipes</label></li>
								<li><label for="3e"><input type="checkbox" id="3e"> Scrumptious Apple Pie recipe from ...</label></li>
								<li><label for="3f"><input type="checkbox" id="3f"> Custards and Pudding Recipes</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse53"><span class="glyphicon glyphicon-chevron-down"></span>Facebook Shares</a>
						</h4>
					</div>
					<div id="collapse53" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="4a"><input type="checkbox" id="4a"> Calories in peanut butter</label></li>
								<li><label for="4b"><input type="checkbox" id="4b"> Diet Tips From Jack LaLane</label></li>
								<li><label for="4c"><input type="checkbox" id="4c"> iTunes Store: Download Lose It</label></li>
								<li><label for="4d"><input type="checkbox" id="4d"> Urban Myths: Calorie Counting</label></li>
								<li><label for="4e"><input type="checkbox" id="4e"> Excercise Tips</label></li>
								<li><label for="4f"><input type="checkbox" id="4f"> 20 Minute Exercise Routines</label></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr />

		<p><strong>4. Add a URL to your new folder:</strong></p>
		<input type="text" name="url" placeholder="http://..." style="" class="form-control" />
		<!--<span class="glyphicon glyphicon-plus ml15"></span>-->

		<hr />

		<p><strong>5. Upload a file to your folder:</strong></p>
		<input type="file" name="fileupload" size="chars"> 

		<hr />
	
		<p><strong>6. Add a title:</strong></p>
		<input type="text" name="title" style="" class="form-control" />

		<hr />

		<p><strong>7. Add a description:</strong></p>
		<textarea type="text" class="form-control" name="snippet"></textarea>

		<hr />

		<p><strong>8. Select media type:</strong></p>
		<select name="type" class="form-control">
  			<option value="website">Website</option>
  			<option value="image">Image</option>
  			<option value="document">Document</option>
 			<option value="video">Video</option>
		</select>

		<hr />
	
		<p><strong>9. Folder Settings:</strong></p>
		<label for="privateFolder"><input type="checkbox" name="private" id="privateFolder" size="chars"> <strong>Private:</strong> only you and your friends can view this folder and no one else.</label><br />
		<label for="lockFolder"><input type="checkbox" name="locked" id="lockFolder" size="chars"> <strong>Lock:</strong> no one can make submissions or recommendations to this folder.</label>

		<hr />

		<input type="submit" class="btn btn-primary" value="Create Folder" />
		<button type="button" class="btn btn-default fr">Cancel</button>
	</div>
	</form>

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

<!--
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Content To </h4>
      </div>
      <div class="modal-body">
      	<!--<iframe id="iframeWIKI" height="500px" width="100%" frameborder="0" src="http://howlix.com/shred/real2/addFolder.php"></iframe>-->

		<form action="addContent.php" method="post">

		<p><strong>1. Import content from the following folders:</strong></p>
		<div id="folderButtons">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse50"><span class="glyphicon glyphicon-chevron-down"></span>Guitar Tabs</a>
						</h4>
					</div>
					<div id="collapse50" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="1a"><input type="checkbox" id="1a"> Stairway To Heaven</label></li>
								<li><label for="1b"><input type="checkbox" id="1b"> Blackbird</label></li>
								<li><label for="1c"><input type="checkbox" id="1c"> Purple Haze</label></li>
								<li><label for="1d"><input type="checkbox" id="1d"> Yer Blues</label></li>
								<li><label for="1e"><input type="checkbox" id="1e"> Time</label></li>
								<li><label for="1f"><input type="checkbox" id="1f"> Freebird</label></li>
								<li><label for="1g"><input type="checkbox" id="1g"> Eruption</label></li>
								<li><label for="1h"><input type="checkbox" id="1h"> Comfortably Numb</label></li>
								<li><label for="1i"><input type="checkbox" id="1i"> Layla</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse51"><span class="glyphicon glyphicon-chevron-down"></span>Wish List</a>
						</h4>
					</div>
					<div id="collapse51" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="2a"><input type="checkbox" id="2a"> Mad Men, Season 5</label></li>
								<li><label for="2b"><input type="checkbox" id="2b"> Breville BES870XL Barista Express Espresso Machine</label></li>
								<li><label for="2c"><input type="checkbox" id="2c"> Led Zeppelin I (Deluxe CD Edition)</label></li>
								<li><label for="2d"><input type="checkbox" id="2d"> Apple iPad Air</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse52"><span class="glyphicon glyphicon-chevron-down"></span>Recipes</a>
						</h4>
					</div>
					<div id="collapse52" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="3a"><input type="checkbox" id="3a"> Cake Recipes - Allrecipes.com</label></li>
								<li><label for="3b"><input type="checkbox" id="3b"> Creamy Egg Nog Recipe</label></li>
								<li><label for="3c"><input type="checkbox" id="3c"> How to Make Your Own Beer at Home</label></li>
								<li><label for="3d"><input type="checkbox" id="3d"> Healthy Homemade Bread Recipes</label></li>
								<li><label for="3e"><input type="checkbox" id="3e"> Scrumptious Apple Pie recipe from ...</label></li>
								<li><label for="3f"><input type="checkbox" id="3f"> Custards and Pudding Recipes</label></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="importAll"><input type="checkbox"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapse53"><span class="glyphicon glyphicon-chevron-down"></span>Facebook Shares</a>
						</h4>
					</div>
					<div id="collapse53" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><label for="4a"><input type="checkbox" id="4a"> Calories in peanut butter</label></li>
								<li><label for="4b"><input type="checkbox" id="4b"> Diet Tips From Jack LaLane</label></li>
								<li><label for="4c"><input type="checkbox" id="4c"> iTunes Store: Download Lose It</label></li>
								<li><label for="4d"><input type="checkbox" id="4d"> Urban Myths: Calorie Counting</label></li>
								<li><label for="4e"><input type="checkbox" id="4e"> Excercise Tips</label></li>
								<li><label for="4f"><input type="checkbox" id="4f"> 20 Minute Exercise Routines</label></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<p><strong>2. Add a URL to your new folder:</strong></p>
		<input type="text" name="url" placeholder="http://..." style="" class="form-control" />
		<!--<span class="glyphicon glyphicon-plus ml15"></span>-->

		<hr />

		<p><strong>3. Upload a file to your folder:</strong></p>
		<input type="file" name="fileupload" size="chars"> 

		<hr />
	
		<p><strong>4. Add a title:</strong></p>
		<input type="text" name="title" style="" class="form-control" />

		<hr />

		<p><strong>5. Add a description:</strong></p>
		<textarea type="text" class="form-control" name="snippet"></textarea>

		<hr />

		<input type="submit" class="btn btn-primary" value="Add" />
		<button type="button" class="btn btn-default fr">Cancel</button>
	</div>
	</form>	

      </div>
    </div>
  </div>
</div>
-->

</body>
</html>

