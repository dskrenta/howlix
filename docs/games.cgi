#!/usr/bin/perl
use strict;

# magic - do not change
print "Content-type: text/html\n\n";
my $page = $ENV{QUERY_STRING} || shift || 1;
# end magic


if ( $page eq '1' )
{
print <<EOF
<html>
<head>
<title>Howlix Games</title>
<link rel="shortcut icon" href="http://howlix.com/howlixicon.jpg" type="image/x-icon" />
<link rel="stylesheet" href="stylem.css" type="text/css" />
<script type="text/javascript" src="http://metroui.org.ua/js/modern/carousel.js"></script>
  <script type="text/javascript" src="http://metroui.org.ua/js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="http://metroui.org.ua/js/assets/jquery.mousewheel.min.js"></script>


<style>
div.logo2{color: black; font-size: 80px; font-family:  Chalkduster, sans-serif; font-size: normal; line-height: normal;}

div.padding{ margin:20px; padding:10px;}

div.gt{color: white; font-size: 40px; font-family:  Chalkduster, sans-serif; font-size: normal; line-height: normal; }

div.h7{width:100%;  padding:4px; border:0px solid:black; margin:0px; background-color:black; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

</style>
</head>
<body>
<div class="h7">
<div class="logo2"><span style="color:white">How<span style="color:red">lix</span> <span style="color:white">Games</span></div>
</div>
<div class="padding">
<p>

<div class="span5">
<div class="carousel span5" style="height: 500px; width:1000px;" data-role="carousel" data-param-effect="slide" data-param-direction="left" data-param-duration="2000" data-param-period="4000">
<div class="slides">

<div class="slide image" id="slide1">
<a href=games.cgi?2><img src="http://cdn2.kongregate.com/game_icons/0025/7656/thumbnail_site.jpg?17844-op" /></a>
<div class="description">
<div class="gt">Learn to Fly 2</div>
</div>
</div>

<div class="slide image" id="slide2">
<a href=games.cgi?3><img src="http://cdn1.kongregate.com/game_icons/0017/9536/icon5.jpg?8012-op" /></a>
<div class="description"><div class="gt">Epic Battle Fantasy 3</div>
</div>
</div>

<div class="slide image" id="slide3">
<a href=games.cgi?4><img src="http://cdn2.kongregate.com/game_icons/0018/3630/monster_slayers_100x75.png?11092-op" /></a>
<div class="description"><div class="gt">Monster Slayers</div>
</div>
</div>

<div class="slide image" id="slide4"><a href=games.cgi?5><img src="http://cdn4.kongregate.com/game_icons/0009/4952/ew3kong.jpg?4402-op" /></a>
<div class="description"><div class="gt">Epic War 3</div>
</div>
</div>

<div class="slide image" id="slide5"><a href=games.cgi?6><img src="http://cdn2.kongregate.com/game_icons/0026/4306/VillainousKongLogo_site.png?26585-op" /></a>
<div class="description"><div class="gt">Villainous</div>
</div>
</div>

<div class="slide image" id="slide6"><a href=games.cgi?7><img src="http://cdn2.kongregate.com/game_icons/0017/0636/ew4k.jpg?3349-op" /></a>
<div class="description"><div class="gt">Epic War 4</div>
</div>
</div>

<div class="slide image" id="slide7"><a href=games.cgi?8><img src="http://cdn3.kongregate.com/game_icons/0001/8807/pr2_thumb.png?31659-op" /></a>
<div class="description"><div class="gt">Platform Racing 2</div>
</div>
</div>

<div class="slide image" id="slide8"><a href=games.cgi?9><img src="http://cdn4.kongregate.com/game_icons/0019/0478/thumb100x75.jpg?9359-op" /></a>
<div class="description"><div class="gt">Gravitee Wars</div>
</div>
</div>

<div class="slide image" id="slide9"><a href=games.cgi?10><img src="http://cdn1.kongregate.com/game_icons/0028/0121/CycloManiacs_Thumb_site.jpg?10535-op" /></a>
<div class="description"><div class="gt">CycloManiacs 2 </div>
</div>
</div>

<div class="slide image" id="slide10"><a href=games.cgi?11><img src="http://cdn2.kongregate.com/game_icons/0031/5056/125x100_site.jpg?7971-op" /></a>
<div class="description"><div class="gt">Legend of the Void</div>
</div>
</div>
                                </div>


                                <span class="control left bg-color-blue">&#8249;</span>
                                <span class="control right bg-color-blue">&#8250;</span>

                            </div>
                        </div>

<table><tr valgin="TOP"><td>

<ul class="dropdown-menu open">
<li><a href="#">Top Games</a></li>
<li class="divider"></li>
<li><a href="#">ItemName</a></li>
<li><a href="#">ItemName</a></li>
<li><a href="#">ItemName</a></li>
<li class="divider"></li>
<li><a href="#">ItemName</a></li>
</ul>


</td><td>

<table><tr><td>
<h2>Top Games:</h2>
</td></tr><tr><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn2.kongregate.com/game_icons/0025/7656/thumbnail_site.jpg?17844-op" alt="">
</div>
</div>
</td></tr><tr><td>
Learn 2 Fly
</td></tr></table>

</td><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn1.kongregate.com/game_icons/0017/9536/icon5.jpg?8012-op" alt="">
</div>
</div>
</td></tr><tr><td>
Epic Battle Fantasy 3
</td></tr></table>

</td><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn2.kongregate.com/game_icons/0018/3630/monster_slayers_100x75.png?11092-op" alt="">
</div>
</div>
</td></tr><tr><td>
Monster Slayers
</td></tr></table>

</td><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn4.kongregate.com/game_icons/0009/4952/ew3kong.jpg?4402-op" alt="">
</div>
</div>
</td></tr><tr><td>
Epic War 3
</td></tr></table>

</td><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn2.kongregate.com/game_icons/0026/4306/VillainousKongLogo_site.png?26585-op" alt="">
</div>
</div>
</td></tr><tr><td>
Villainous
</td></tr></table>

</td><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn2.kongregate.com/game_icons/0017/0636/ew4k.jpg?3349-op" alt="">
</div>
</div>
</td></tr><tr><td>
Epic War 4
</td></tr></table>

</td></tr><tr><td>

<table><tr><td>
<div class="tile image">
<div class="tile-content">
<img src="http://cdn3.kongregate.com/game_icons/0001/8807/pr2_thumb.png?31659-op" alt="">
</div>
</div>
</td></tr><tr><td>
Platform Racing 2
</td></tr></table>

</td></tr></table>

</td></tr></table>


</div>
<script type="text/javascript" src="http://metroui.org.ua/js/modern/carousel.js"></script>
</body>
</html>
EOF
;
}


if ( $page eq '2' )
{
print_header();
print"<h3>Learn to Fly 2</h3>\n";
print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0011/5608/live/\" src=\"http://external.kongregate-games.com/gamez/0011/5608/live/embeddable_115608.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '3' )
{
print_header();
print"<h3>Epic Battle Fantasy 3</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0009/0613/live/\" src=\"http://external.kongregate-games.com/gamez/0009/0613/live/embeddable_90613.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '4' )
{
print_header();
print"<h3>Monster Slayers</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0009/2661/live/\" src=\"http://external.kongregate-games.com/gamez/0009/2661/live/embeddable_92661.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '5' )
{
print_header();
print"<h3>Epic War 3</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0004/8201/live/\" src=\"http://external.kongregate-games.com/gamez/0004/8201/live/embeddable_48201.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '6' )
{
print_header();
print"<h3>Villainous</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0011/7271/live/\" src=\"http://external.kongregate-games.com/gamez/0011/7271/live/embeddable_117271.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '7' )
{
print_header();
print"<h3>Epic War 4</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0008/6156/live/\" src=\"http://external.kongregate-games.com/gamez/0008/6156/live/embeddable_86156.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '8' )
{
print_header();
print"<h3>Platform Racing 2</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0001/0110/live/\" src=\"http://external.kongregate-games.com/gamez/0001/0110/live/embeddable_10110.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '9' )
{
print_header();
print"<h3>Gravitee Wars</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0009/6087/live/\" src=\"http://external.kongregate-games.com/gamez/0009/6087/live/embeddable_96087.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '10' )
{
print_header();
print"<h3>CycloManiacs 2</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0012/1218/live/\" src=\"http://external.kongregate-games.com/gamez/0012/1218/live/embeddable_121218.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}

if ( $page eq '11' )
{
print_header();
print"<h3>Legend of the Void</h3>\n";print"<embed width=\"700\" height=\"500\" base=\"http://external.kongregate-games.com/gamez/0012/9964/live/\" src=\"http://external.kongregate-games.com/gamez/0012/9964/live/embeddable_129964.swf\" type=\"application/x-shockwave-flash\"></embed>";
print_footer();
}




sub print_header
{
print <<EOX

<html>
<head>
<title>Howlix Games</title>
<link rel="shortcut icon" href="http://howlix.com/howlixicon.jpg" type="image/x-icon" />
<link rel="stylesheet" href="stylem.css" type="text/css" />


<style>
div.logo2{color: black; font-size: 80px; font-family:  Chalkduster, sans-serif; font-size: normal; line-height: normal;}

div.padding{padding:10px;}

div.gt{color: white; font-size: 40px; font-family:  Chalkduster, sans-serif; font-size: normal; line-height: normal; }

div.h7{width:100%;  padding:4px; border:0px solid:black; margin:0px; background-color:black; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

div.h10{width:720; padding:8px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

</style>
</head>
<body>
<div class="h7">
<a href=games.cgi?1><div class="logo2"><span style="color:white">How<span style="color:red">lix</span> <span style="color:white">Games</span></div></a>
</div>
<div class="padding">
<p>
<div class="h10">


EOX
;
}


sub print_footer
{
print <<EOF
</div>
<!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&mod=%241%24wq1rdBcg%2467Xf3lAX9xPJwe3zcrLOQ/"+"&opts=478&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
</div>
</body>
</html>
EOF
;
}

