#!/usr/bin/perl

# magic - do not change
print "Content-type: text/html\n\n";
$page = $ENV{QUERY_STRING} || shift || 1;
# end magic


if ( $page eq 'HOME' )
{
print <<EOX


<title>Harvix</title> 
<link rel="shortcut icon" href="http://www.tinychan.org/img/1328039793912825.png" type="image/x-icon" /> 
<style type="text/css"> 
a:link {color:blue; text-decoration:none;}  
a:visited {color:blue; text-decoration:none;}
a:hover {color:red;}
body {background-image:url(''); font-size: 13px; width:100%; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal; margin: 0; padding: 0; } 
div.header{font-size:150px;}
div.header1{font-size:20px;}
div.hi{width:100%; padding:8px; border:0px solid:black; margin:0px; background-image:url('');}
div.hi2{font-size:20px;}
div.hi5{padding:8px; border:1px solid:gray; width:80%; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}
div.1footer{color:gray;}
div.bar{float:right;}
div.large{font-size:120px;}
div.large5{font-size:20px;};
div.h{font-size:18px;}
div.t{font-size:18px;}
div.o{width:20%; padding:2px; border:1px solid:#ffffff; margin:0px; background-color:#b31c1c;}
div.center{text-align:center;}
div.ex{width:35%; padding:2px; border:1px solid black;  margin:0px; -moz-border-radius: 15px; border-radius: 15px; background-color:#1a54e1;}
div.h{width:40%; padding:2px; border:1px solid black;  margin:0px; background-color:white;} 
body{background-color:white;}
div.po{width:50%; padding:2px; border:1px solid white;  margin:0px; -moz-border-radius: 15px; border-radius: 15px; background-color:white;}

#footer{clear:both;padding:10px 0;text-transform:uppercase;height:12px;font-size:10.5px;overflow:hidden;background:#2c2c2b;background:-moz-linear-gradient(top, #2c2c2b 0%, #262426 49%, #232222 50%, #1e201e 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#2c2c2b), color-stop(49%,#262426), color-stop(50%,#232222), color-stop(100%,#1e201e));background:-webkit-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:-o-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:-ms-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#2c2c2b', endColorstr='#1e201e',GradientType=0 );}#footer p{margin:0 10px}#footer a{color:#818181;padding-right:15px;}#footer .copyright{float:right;color:#818181;}


div.bar2{float:left;}
 
div.hi8{padding:4px; border:1px solid:black; width:100%; margin:0px; background-color:black; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

#ww_6 {padding:0px; margin: 0px auto 10px auto; font-size:12px; list-style:none; background:none;width: 177px;height: 73px; overflow:hidden;}

#ww_6 * {margin:0px; padding:0px; list-style:none;background:none;}

#ww_6 .weather06_t{
	position: absolute;
	width: auto;
	height: auto;
	margin-top: 29px;
	margin-left: 120px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	letter-spacing: 1px;
	color: black;		
}	
#ww_6 .weather06_city{
	
	position: absolute;
	width: 73px;
	height: auto;
	margin-top: 45px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	text-transform: uppercase;
	text-align: center;
	color: black;
	margin-left: 100px;
}	
#ww_6 .weather06_date{
	position: absolute;
	width: 73px;
	height: auto;
	margin-top: 13px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: black;
	text-align: center;
	left: 100px;	
}

#ww_6 .weather06_city a{
	text-decoration:none;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	text-transform: uppercase;
	text-align: center;
	color: black;			
}	



html {
     height:100%
}


body {
     height:100%
}
#container {
     position:relative;
     min-height:100%;
     _height:100%; /* for IE6 as it doesnt understand min-height */
}
#content {
     padding-bottom:29px; /* assuming your footer height is 100px */
}
 
#hifooter {
     position: relative;
     margin-top:-32px;
     /* move the footer up negatively exactly the same height
         as the footer so that its back in the view and always
         appears to rest at the bottom
         of the page */
}


#searchBox{width:600px}.autocomplete{width:600px}
#searchBox{font-size:25px;line-height:30px;height:30px;outline:none;border:1px solid #AAA;}
#searchBox{height:45px;clear:both;}
#search-submit{width:100px;}
#search-submit{height:45px;}
.red-button{height:32px;border:none 0;outline:none 0;font-size:14px;color:#FFF;cursor:pointer;font-weight:bold;background:#ef3625;background:-moz-linear-gradient(top, #ef3625 0%, #d02f20 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#ef3625), color-stop(100%,#d02f20));background:-webkit-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-o-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-ms-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:linear-gradient(top, #ef3625 0%,#d02f20 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ef3625', endColorstr='#d02f20',GradientType=0 );}
.search-icon{background:url('http://a.blekko-img.com/045/gz/theme21/imgs/serp08.png') no-repeat -212px 0;width:20px;height:20px;display:inline-block;}


</style>
</head> 


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30447587-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30658262-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body>

<div id="container">
    <div id="content">

<div class="hi8">
<div class="large5">
<span style="color:white"><b>Project and Social features coming soon!</b></span>
</div>
</div>

<p>
&nbsp;
<p>
&nbsp; 
<center>


<a href="index.html"><img src="http://www.harvix.com/images/HH.jpg"></a>
<p>
<table>
<tr>
<td>
<form id="searchForm" name="searchForm" action="http://harvix.com/harvix3.cgi" onsubmit="submitted('h'); return false">
<input id="searchBox" autofocus="autofocus" autocomplete="off" type="text" spellcheck="false" name="q"  />
<button type="submit" class="red-button"  href="javascript:void(0);" id="search-submit" ><span class="search-icon"></span></button>
</form>
</div>
</td>
</tr>
</table>



&nbsp;
<p>
</center>

<p>
<p>

</div>
</div>

<div id="hifooter">
<div id="footer">
<span class="copyright"> <div class="fb-like" data-href="http://harvix.com" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div> &copy; 2012 harvix, inc.</span>
<p>
<a href="about.html">about</a>&nbsp;
<a href="privacy.html">privacy policy</a>&nbsp;
<a href="terms.html">terms & condtions</a>&nbsp;
<a href="http://www.facebook.com/Harvixsearch">find us on facebook</a>&nbsp;
<a href="feedback.html">give harvix your feedback</a>&nbsp;
</p>
</div>
</div>

<script type="text/javascript"> 
$(document).ready(function() {
  $("input[name=q]").val( '' ).focus();
});
</script> 


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</body> 
 

EOX
;
}


if ( $page eq 'SEARCH_PAGE' )
{

	print "<title>Maze Room 2</title>\n";

	print "<h1>You are in Maze Room 2</h1>\n";

	print "<a href=maze.cgi?1>back to room 1</a>\n";
}