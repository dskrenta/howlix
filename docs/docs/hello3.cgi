#!/usr/bin/perl

use strict;

use Data::Dumper;
use WebService::Blekko;
use Encode;

my %escapes;
setup_escapes();

print "Content-type: text/html\n\n";


sub utf8_on
{
    my($str) = @_;

    if( $str )
    {
        String::Charset::utf8_clean( $str );

        Encode::_utf8_on($str);

        if(! Encode::is_utf8($str, 1) )
        {
            Encode::_utf8_off($str);
        }
    }

    return $str;
}

=head2 utf8_off($string)

Unconditionally marks a string as not UTF-8. If the string isn't
valid UTF-8, chaos is in your immediate future.

=cut

sub utf8_off
{
    my( $str ) = @_;

    if( $str )
    {
        Encode::_utf8_off($str);
    }

    return $str;
}



my $query = parse_query();

my $blekko = WebService::Blekko->new( auth => 'c31c6fd0', );


my $res = $blekko->query( $query );

#if ( $res->error ) ...

print_header($query);

my @results;

while ( my $r = $res->next ) {
	push @results, {
			title => $r->title,
			snippet => $r->snippet,
			url => $r->url,
		};
}


#START OF SEARCH	




print"
<div id=\"accordion\">
    <h3>WEB</h3>
    <div>
        <p>
      ";

	

foreach my $res ( @results )
{


        print "<div class=\"large4\"><b><u><a href=", '"', $res->{url}, '">', $res->{title}, "</a></u></b><br></div>\n";

                print "<span style=\"color:#093;\">";
        print $res->{url}, "<br> </span>\n";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print $snippet, "<br>\n";

        print "<p></p>\n";

}

print"
	  
	</p>
    </div>
    <h3>INFORMATION</h3>
    <div>
        <p>
        <iframe src=\"http://blekko.com\" height=\"500px\" width=\"800px\">
        </iframe>
        </p>
    </div>
    <h3>IMAGES</h3>
    <div>
        <p>
        Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
        Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
        ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
        lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
        </p>
        <ul>
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
        </ul>
    </div>
    <h3>Section 4</h3>
    <div>
        <p>
        Cras dictum. Pellentesque habitant morbi tristique senectus et netus
        et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
        faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
        mauris vel est.
        </p>
        <p>
        Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
        inceptos himenaeos.
        </p>
    </div>
</div>

";








foreach my $res ( @results )
{


        print "<div class=\"large4\"><b><u><a href=", '"', $res->{url}, '">', $res->{title}, "</a></u></b><br></div>\n";

                print "<span style=\"color:#093;\">";
        print $res->{url}, "<br> </span>\n";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print $snippet, "<br>\n";

        print "<p></p>\n";

}



#END SO SEARCH 


print_footer();


sub setup_escapes
{
	for (0..255)
	{
	    $escapes{chr($_)} = sprintf("%%%02X", $_);
	}
	$escapes{' '} = '+';
}

sub urlencode
{
    my $url = shift;

    $url =~ s/([^A-Za-z0-9\-_.!~*\'()])/$escapes{$1}/ge if defined $url;
    return $url;
}

sub urldecode
{
    my $url = shift;

    $url =~ tr/+/ / if defined $url;
    $url =~ s/%([0-9A-Fa-f]{2})/chr(hex($1))/eg if defined $url;

    return $url;
}

sub parse_query
{
	my $query = $ENV{QUERY_STRING} || shift || 1;

	$query =~ s/q=//;
	$query = urldecode($query);
	#$query =~ s/\+/ /g;
	$query =~ s/[\[\]\(\)\.\?]/ /g;
	$query =~ s/^\s*//;
	$query =~ s/\s*$//;
	$query =~ s/\s+/ /g;
	
	return $query;
}






sub print_header
{
	my ( $query ) = @_;

	$query =~ s/[<>\&]//g;

print <<EOF
<html>
<head>
<title>Harvix Search - $query</title> 
<link rel="shortcut icon" href="http://www.tinychan.org/img/1328039793912825.png" type="image/x-icon" /> 

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        $( "#accordion" ).accordion();
    });
    </script>


<style type="text/css"> 
a:link {color:#5858FA; text-decoration:none;}  
a:visited {color:#5858FA; text-decoration:none;}
a:hover {color:red;}
body { font-size: 12px; width:100%; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal; margin: 0; padding: 0; } 
div.header{font-size:150px;}
div.header1{font-size:20px;}
div.hi{width:98%; padding:8px; border:0px solid:black; margin:0px; background-color:white;}
div.hi2{font-size:20px;}
div.h7{width:100%; position: fixed; padding:4px; border:0px solid:black; margin:0px; background-color:black; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}
div.1footer{color:gray;}
div.bar{float:right;}
div.footer{clear:both;text-align:center;}
div.large{font-size:50px; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal;}
div.large4{font-size:18px;}
div.h{font-size:15px;}
div.t{font-size:15px;}
div.o{width:20%; padding:2px; border:1px solid:#ffffff; margin:0px; background-color:#b31c1c;}
div.center{text-align:center;}
div.ex{width:35%; padding:2px; border:1px solid black;  margin:0px; -moz-border-radius: 15px; border-radius: 15px; background-color:#1a54e1;}
div.h{width:40%; padding:2px; border:1px solid black;  margin:0px; background-color:white;} 
body{background-color:white;}
div.po{width:50%; padding:2px; border:1px solid white;  margin:0px; -moz-border-radius: 15px; border-radius: 15px; background-color:white;}
 div.h8{width:100%; padding:8px; border:0px solid:black; margin:0px; background-color:black;}
div.semilarge{font-size:20px;} 
div.bar2{float:left;}

div.h0{width:; padding:8px; border:0px solid:black; margin:0px; background-color:#F6F6F6; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

div.h10{width:; padding:8px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

div.h11{width:10%; padding:8px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

div.side{width:50px; padding:8px; border:0px solid:black; margin:0px; background-color:white;}

div.h12{width:; padding:4px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}




div.shade{width:; padding:8px; border:1px solid white; margin:0px; background-color:white; -moz-border-radius: 10px; border-radius: 10px;}





#footer{clear:both;padding:10px 0;text-transform:uppercase;height:12px;font-size:10.5px;overflow:hidden;background:#2c2c2b;background:-moz-linear-gradient(top, #2c2c2b 0%, #262426 49%, #232222 50%, #1e201e 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#2c2c2b), color-stop(49%,#262426), color-stop(50%,#232222), color-stop(100%,#1e201e));background:-webkit-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:-o-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:-ms-linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);background:linear-gradient(top, #2c2c2b 0%,#262426 49%,#232222 50%,#1e201e 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#2c2c2b', endColorstr='#1e201e',GradientType=0 );}#footer p{margin:0 10px}#footer a{color:#818181;padding-right:15px;}#footer .copyright{float:right;color:#818181;}

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
     padding-bottom:100px; /* assuming your footer height is 100px */
}
 
#footer {
     position: relative;
     margin-top:-50px;
     /* move the footer up negatively exactly the same height
         as the footer so that its back in the view and always
         appears to rest at the bottom
         of the page */
}


#searchBox{width:600px;}
#searchBox{font-size:25px;line-height:30px;height:30px;outline:none;border:1px solid #AAA;}
#searchBox{height:40px;clear:both;}
#search-submit{width:100px;}
#search-submit{height:40px;}
.red-button{height:32px;border:none 0;outline:none 0;font-size:14px;color:#FFF;cursor:pointer;font-weight:bold;background:#ef3625;background:-moz-linear-gradient(top, #ef3625 0%, #d02f20 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#ef3625), color-stop(100%,#d02f20));background:-webkit-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-o-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-ms-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:linear-gradient(top, #ef3625 0%,#d02f20 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ef3625', endColorstr='#d02f20',GradientType=0 );}
.search-icon{background:url('http://a.blekko-img.com/045/gz/theme21/imgs/serp08.png') no-repeat -212px 0;width:20px;height:20px;display:inline-block;}


</style>

</head> 
<body>
<div class="h7">
<table cellpadding="0">
<tr VALIGN=BOTTOM>
<td>
<div class="large">
<a href="index.html"><b><span style="color:white;">Har</span><span style=color:red;">vix</span></b></a>
</div>
</td>
<td>
<form id="searchForm" name="searchForm" action="http://harvix.com/hello3.cgi" onsubmit="submitted('h'); return false">
<input id="searchBox" autofocus="autofocus" autocomplete="off" type="text" spellcheck="false" name="q" value="$query"  />
<button type="submit" class="red-button"  href="javascript:void(0);" id="search-submit" ><span class="search-icon"></span></button>
</form>
</td>
</tr>
</table>
</div>
<p>
&nbsp;
<p>
&nbsp;
<p>
&nbsp;
<p>
EOF
;

}

sub print_footer
{
print <<EOX

<p>
&nbsp;
<p>
&nbsp;
<p>
&nbsp;
<p>
&nbsp;
<p>
&nbsp;
<p>


<td>
<div class="">
<div class="h0">
<center>
<div class="large"><b><i>Share your results about "$query"</i></b></div>
</center>
<table width="100%" cellspacing="10">
<tr VALIGN=TOP>
<td>
<div class="fb-like" data-href="http://harvix.com/hsearch3.cgi?q=$query" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-action="like" data-colorscheme="light"></div>
<p>
<di="fb-send" data-href="http://harvix.com/hsearch1.cgi?q=$query"></div>
<p>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://harvix.com/hsearch3.cgi?q=$query">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<p>
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="http://harvix.com/hsearch3.cgi?q=$query" data-counter="right"></script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-href="http://harvix.com/hsearch3.cgi?q=$query"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<p>
</td>
<td>
<p>
<div class="fb-comments" data-href="http://harvix.com/hsearch3.cgi?q=$query" data-num-posts="50" data-width="500"></div>
</td>
<td>
<p>
<p>
<!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/simple/skin.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={  };} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=470&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
</td>
</tr>
</table>
</div>
</div>
<p>
&nbsp;
<div id="footer">
<span class="copyright"> &copy; 2012 harvix, inc.</span>
<p>
<a href="about.html">about</a>&nbsp;
<a href="privacy.html">privacy policy</a>&nbsp;
<a href="terms.html">terms & condtions</a>&nbsp;
</p>
</div>
</body> 
<html> 
EOX
;
}


