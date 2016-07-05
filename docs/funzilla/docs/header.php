<!DOCTYPE html>
<html lang="en">

<head>

<link rel="canonical" href="http://funzilla.tv" />

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta name="keywords" content="Funzilla, tv, video, jokes, interesting, cool, fun collection, fun portfolio, admire, fun, humor, humour, just for fun"/>
<meta name="author" content="Funzilla.tv">

<meta property="og:site_name" content="Funzilla.tv"/>
<meta property="og:type" content="blog"/>
<meta property="og:title" content="Funzilla.tv"/>
<meta property="og:description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta property="og:url" content="http://funzilla.tv"/>
<meta property="og:image" content="images/smiley.png"/>

<meta name="twitter:site" content="funzilla.tv" />
<meta name="twitter:url" content="http://funzilla.tv"/>
<meta name="twitter:description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta name="twitter:domain" content="funzilla.tv">
<meta name="twitter:image" content="images/smiley.png"/>

<title>Funzilla.tv</title>

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" href="images/smiley.png">
<link rel="shortcut icon" href="images/smiley.png">

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/slides.css" rel="stylesheet">
<link href="awesome/css/font-awesome.css" rel="stylesheet">

<style>
.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width:  100% !important;}
.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe  span[style] {width: 100% !important;}
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/unveil.js"></script>

<script>
$(document).ready(function() {
  //$("img").trigger("unveil");
   //$("img").unveil(300);
});

$(function() {
   $(".unveil").trigger("unveil");
   $("img").unveil(300);
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54534539-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
window.fbAsyncInit = function() {
        FB.init({
                appId      : '677515572339559',
                xfbml      : true,
                version    : 'v2.0'
        });
};

(function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php
	$countQuery = mysql_query("SELECT * FROM $video_table");
     	$num_rows_rand = mysql_num_rows($countQuery);

     	$random = rand(240, $num_rows_rand);
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong><span style="color:black">FUNZILLA</span><span style="color:red"> TV</span></strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
        		<li><a href="post.php?id=<?php echo $random; ?>">Random</a></li>
			<li><a href="fresh.php">Fresh</a></li>
			<!--<li><a href="community.php">Community</a></li>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="http://facebook.com/funzillatv" target="_blank"><span style="color:#3b5998"><i class="fa fa-facebook fa-lg"></i></span></a></li>
			<li><a href="http://twitter.com/funzillatv" target="_blank"><span style="color:#21b0ec"><i class="fa fa-twitter fa-lg"></i></span></a></li>
			<li><a href="about.php"><i class="fa fa-info fa-lg"></i></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
