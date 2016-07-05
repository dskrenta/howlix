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
      //getFriends();
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

function getFriends() {
    FB.api('/me/friends', function(response) {
        if(response.data) {
            $.each(response.data,function(index,friend) {
                alert(friend.name + ' has id:' + friend.id);
            });
        } else {
            alert("Error!");
        }
    });
}
</script>

<script>
funcion js()
{
	//	window.location.assign("http://howlix.com/shred2/main.php?id=" + id + "&name=" + response.name)

	var a = document.getElementById('home');
	a.href = "http://howlix.com/shred2/main.php?id=" + id + "&name=" + response.name;
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
				<!-- <li><a href="#" onclick="getFriends()">Friends</a></li> -->
			</ul>
	    	</span>
		</div>
		<h1><a href="http://howlix.com/shred2/main.php">ShredFeed</a></h1>
		<!--<h1><a onclick="js()" href="javascript:void(0);">ShredFeed</a></h1>-->
		<!--<h1><a onclick="js()" id="home">ShredFeed</a></h1>-->
		<!-- <script> document.write("http://howlix.com/shred2/main.php?id=" + id + "&name=" + response.name); </script> -->
	</div>
</div>
