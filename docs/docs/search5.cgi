#!/usr/bin/perl

# this code written by David Skrenta CEO of Harvix Search May 2013 (C) comments vary throughout the file
# call specilized perl modules

use strict;
use JSON;
use URI::Fetch;
use Data::Dumper;
use WebService::Blekko;
use URI::Fetch;
use Encode;

my %escapes;
setup_escapes();

print "Content-type: text/html\n\n";

# parse query subroutine

my $query = parse_query();

# facts query wiki URI fetch

my $querynew = $query." site:en.wikipedia.org";
print STDERR "querynew=$querynew\n";

# Blekko auth

my $blekkonew = WebService::Blekko->new( auth => 'c31c6fd0', );

# facts results in seperate variables 

my $resnew = $blekkonew->query( $querynew );

# print HTML header

print_header($query);

# create struture

my @resultsnew;

while ( my $rnew = $resnew->next ) {
        push @resultsnew, {
                        title => $rnew->title,
                        snippet => $rnew->snippet,
                        url => $rnew->url,
                };
}

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

# decode json data structures

my $json_page = URI::Fetch->fetch("http://blekko.com/api/p1?q=$query&auth=c31c6fd0");
my $json_text = $json_page->content();
my $json = decode_json( $json_text );

# print Dumper($json), "\n";

if ( ! defined $json )
{
    print "no results\n";
    exit(0);
}

if ( ! defined $json->{tags} )
{
    print "no tags\n";
    exit(0);
}


# tags go into categories 


foreach my $tag ( @{ $json->{tags} } )
{
    my $category = $tag->{name};
    my $results = $tag->{results};

# print categories 

	if($category eq "ORIG")
	{
	my $num = scalar @{ $results };
    	print "<div id=\"count\"><span class=\"label\"><h5>$num results:</h5></span></div> <div id=\"upper\"><span class=\"label label-important\"><h5>Top Results:</h5></span></div><hr></hr>";
	}

	elsif($category eq "WIKI")
        {

	}

	elsif($category eq "NAV")
	{

	}
	
	elsif($category eq "STOCK")
        {
	}

        elsif($category eq "FANDANGO")
        {
	print "<div id=\"upper\"><span class=\"label label-important\"><h5>Movies:</h5></span></div><hr></hr>";
        }

	elsif($category eq "IMAGE")
	{
	my $num = scalar @{ $results };
	print "<div id=\"count\"><span class=\"label\"><h5>$num images:</h5></span></div> <div id=\"upper\"><span class=\"label label-important\"><h5>Images:</h5></span></div><hr></hr>";
	}

	elsif($category eq "date")
	{
	my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h5>$num results:</h5></span></div> <div id=\"upper\"><span class=\"label label-info\"><h5>Latest:</h5></span></div><hr></hr>";
	}
	
	elsif($category eq "PEOPLE")
        {
        my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h5>$num results:</h5></span></div> <div id=\"upper\"><span class=\"label label-info\"><h5>social:</h5></span></div><hr></hr>";
        }

	elsif($category eq "RETAIL")
	{

	}

	else
	{
	my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h5>$num results:</h5></span></div> <div id=\"upper\"><span class=\"label label-info\"><h5>$category:</h5></span></div><hr></hr>";
	}

	if($category eq "IMAGE")	
	{
		print"<div id=\"scrollable\"><div id=\"items\">";

		foreach my $result ( @{ $results } )
        	{
			print"<div class=\"item\">";
			my $url = $result->{'u'};        
        		print"<a href=\"$url\"><img src=\"$url\" onerror=\"this.style.display=\'none\'\" height=\"240px\"/></a>";
			print"</div>";
		}

		print"</div></div>";
	}

# print results inside categories 

	elsif($category eq "NAV")
	{

	}	

	elsif($category eq "RETAIL")
	{

	}

	elsif($category eq "WIKI")
	{
		my $wiki_count = 1;

        	foreach my $result ( @{ $results } )
        	{
                	if($wiki_count == "1")
			{
				print"<div id=\"myCarousel\" class=\"carousel slide\"> <div class=\"carousel-inner\">";
                		print"
				<div class=\"item active\">
				<div class=\"carousel_bg\"><img src=\"\" alt=\"\"></div>
        			<div class=\"container-spec\">
				<div class=\"carousel-caption-wiki\">
				";
				my $title = $result->{'t'};
                		my $url = $result->{'u'};
                		my $rurl = $result->{'du'};
                		my $snippet = $result->{'ws'};
				my $img = $result->{'wi'};
				print"<div class=\"hero-unit-wiki\"><table cellpadding=\"10\"><tr><td>";
				print"<a href=\"#\" data-toggle=\"modal\"><img src=\"$img\"/ class=\"img-rounded\"></a></td><td>";
                		print"<a href=\"#\" data-toggle=\"modal\"><h3>$title</span></h3></a>";
				print"<p class=\"lead\">$snippet</p>";
                		print"<p><span style=\"color:green\">$rurl</span>";
				print"<p></td></tr></table></div>";
				print"</div></div></div>";
				
                                print"<div class=\"item\">
                                <div class=\"carousel_bg\"><img src=\"\" alt=\"\"></div>
                                <div class=\"container-spec\">
                                <div class=\"carousel-caption-spec\">";
				
				print"<iframe src=\"$url\" width=\"100%\" height=\"480px\" frameborder=\"0\"></iframe>";
					
				print"</div></div></div>";

				print"<div class=\"item\">
                                <div class=\"carousel_bg\"><img src=\"\" alt=\"\"></div>
                                <div class=\"container-spec\">
                                <div class=\"carousel-caption-spec\">";

                                print"<iframe src=\"http://harvix.com/mswolf2.cgi?$query\" width=\"100%\" height=\"480px\" frameborder=\"0\"></iframe>";

	
				print"</div></div></div></div></div>";

				print" <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo\;</a>
      				<a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo\;</a>";
		
			}

			else 
			{

			}
		
			$wiki_count ++;
		}

	}


	elsif($category eq "STOCK")
	{
	}

	elsif($category eq "FANDANGO")
	{
		foreach my $result ( @{ $results } )
                {
			my $fandango = $result->{'fandango'};
			my $movie = $fandango->{'movie'};
			my $snippet = $movie->{'snippet'};
			my $poster = $movie->{'poster'};
			my $title = $movie->{'title'};
			my $rating = $movie->{'rating'};
			my $release_date = $movie->{'release_date'};
			my $runtime = $movie->{'runtime'};
			my $trailer_url = $movie->{'trailer_url'};
			my $fan_url = $movie->{'url'};
			print"<div class=\"hero-unit-wiki\">";
			print"<table cellpadding=\"10\"><tr><td>";
                        print"<a href=\"#myModalwiki\" data-toggle=\"modal\"><img src=\"$poster\"/ class=\"img-rounded\"></a></td><td>";
                        print"<a href=\"#myModalwiki\" data-toggle=\"modal\"><h3><span style=\"black\">$title</span></h3></a>";
                        print"Rating: $rating<br>";
			print"Released: $release_date<br>";
			print"Runtime: $runtime minutes<br>";
			print"$snippet<br>";
			print"<a href=\"$trailer_url\"><span style=\"color:#195189;\">Watch Trailer</span></a> &middot; <a href=\"$fan_url\"><span style=\"color:#195189;\">Get Tickets & Showtimes</span></a>";
                        print"<p></td></tr></table>";
			print"</div>";
		}
	}	

	elsif($category eq "PEOPLE")
	{

	print"<div id=\"scrollable\"><div id=\"items\">";

        foreach my $result ( @{ $results } )
        {
                print"<div class=\"item2\">";
                print"<div class=\"hero-unit-spec\">";
                my $title = $result->{'t'};
                my $url = $result->{'u'};
		my $snippet = $result->{'s'};
                $snippet =~ s/<\/?(b|strong)>//g;
                if ( length($snippet) > 100 )
                {
                        $snippet = substr($snippet, 0, 100);
                        $snippet =~ s/\s[^\s]*$//;
                        $snippet .= ' ...';
                }
                print"<a href=\"$url\"><span style=\"color:#195189;\"><h4>$title</h4></span></a>";
                print"$snippet";
                print"<p><span style=\"color:green\">$url</span>";
                print"</div></div>";
                #print"<hr></hr><p>";
                #print Dumper($result);
        }

        print"</div></div>";

    print "<p>\n";
        }
	
	elsif($category eq "ORIG")
	{

	print"<div id=\"scrollable\"><div id=\"items\">";

	foreach my $result ( @{ $results } )
        {
                print"<div class=\"item2\">";
                print"<div class=\"hero-unit-spec\">";
                my $title = $result->{'t'};
                my $url = $result->{'u'};
                my $rurl = $result->{'du'};
                my $snippet = $result->{'s'};
                $snippet =~ s/<\/?(b|strong)>//g;
                if ( length($snippet) > 100 )
                {
                        $snippet = substr($snippet, 0, 100);
                        $snippet =~ s/\s[^\s]*$//;
                        $snippet .= ' ...';
                }
                print"<a href=\"$url\"><span style=\"color:#195189;\"><h4>$title</h4></span></a>";
                print"$snippet";
                print"<p><span style=\"color:green\">$rurl</span>";
                print"</div></div>";
                #print"<hr></hr><p>";
                #print Dumper($result);
        }

        print"</div></div>";

    	print "<p>\n";

	print "<div id=\"count\"><a href=\"#myModalwolf\" data-toggle=\"modal\"><span class=\"label label-info\"><h5>More Information &raquo;</h5></span></a></div> <div id=\"upper\"><span class=\"label label-info\"><h5>Facts:</h5></span></div><hr></hr>";



print" 

  <div id=\"myModalwolf\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">More Information</h3>
  </div>
  <div class=\"modal-body\">

<iframe src=\"http://harvix.com/mswolf2.cgi?$query\" width=\"100%\" height=\"700px\" frameborder=\"0\"></iframe>

  </div>

                  </div>

";



	my $countnew = 0;

foreach my $resnew ( @resultsnew )
{
        if ($countnew == 0)
        {
        my $pokemon = $resnew->{url};
        print STDERR "pokemon='$pokemon'\n";

   my $pokemon_page = URI::Fetch->fetch($pokemon);

my $pagenew = $pokemon_page->content();


# dehtml

$pagenew =~ s/<[^>]*>//gs;
$pagenew =~ s/\&lt;/</gs;
$pagenew =~ s/\&gt;/>/gs;
$pagenew =~ s/\&lt/</gs;
$pagenew =~ s/\&gt/>/gs;
$pagenew =~ s/\&(#\d+|[a-z0-9]+);/ /gsi;
$pagenew =~ s/\s+/ /gs;

my @sentences = ( $pagenew =~ /([A-Z][^{}\(\)]*?[a-z]\.\s)/gs);

print"<div id=\"scrollable\"><div id=\"items\">";

my $btw = 1;

foreach my $s ( @sentences )
{
     next if $s !~ /(\sis\s|\swas\s|\swrote\s|\she\s)/;
     next if length($s) > 200;
     next if length($s) < 50;
     next if $s =~ /(Wikipedia)/;

	print"<div class=\"itemfacts\">";
                print"<div class=\"hero-unit-spec\">";

     print "<b>$btw.</b> $s <p> <span class=\"label\">Wikipedia</span><p>";
     $btw++;

	print"</div></div>";
}

print"</div></div>";


if ( ! @sentences )
{
print"$pokemon";
print "No Facts!" ;
}

   }

$countnew ++;

}

	}


	else
	{

	print"<div id=\"scrollable\"><div id=\"items\">";    
	
	foreach my $result ( @{ $results } )
    	{
		print"<div class=\"item2\">";
                print"<div class=\"hero-unit-spec\">";
		my $title = $result->{'t'};
                my $url = $result->{'u'};
		my $rurl = $result->{'du'};
                my $snippet = $result->{'s'};
                $snippet =~ s/<\/?(b|strong)>//g;
        	if ( length($snippet) > 100 )
        	{
                	$snippet = substr($snippet, 0, 100);
                	$snippet =~ s/\s[^\s]*$//;
                	$snippet .= ' ...';
        	}
		print"<a href=\"$url\"><span style=\"color:#195189;\"><h4>$title</h4></span></a>";
		print"$snippet";
                print"<p><span style=\"color:green\">$rurl</span>";
                print"</div></div>";
		#print"<hr></hr><p>";
                #print Dumper($result);
        }
	
	print"</div></div>";

    print "<p>\n";
	}

}

# print footer HTML


print_footer();


# define subroutines 

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





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>$query - Harvix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {

      }



	  #scrollable {
       overflow: auto;
       width:100%;
       height:270px; 
    }

   #items {
     width: 100000px; /* itemWidth x itemCount */
    }

  .item{
     float:left;      
  }

  .item2{
	width:400px;
	height:200px;
     float:left;      
  }

.itemfacts{
        width:300px;
        height:200px;
     float:left;      
  }

 .itemwiki{
     width:100%;
     float:left;      
  }


.hero-unit-spec {
  padding: 10px;
  margin-bottom: 30px;
  height:200px;
  font-size: 14px;
  font-weight: 200;
  line-height: 30px;
  color: inherit;
  background-color: white;
  -webkit-border-radius: 6px;
     -moz-border-radius: 6px;
          border-radius: 6px;
        overflow:hidden;
}


#count{
     float:right;      
}

#upper{
text-transform:uppercase;
}}

    </style>
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.harvix.com/images/harvixshort2.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.harvix.com/images/harvixshort2.jpg">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.harvix.com/images/harvixshort2.jpg">
                    <link rel="apple-touch-icon-precomposed" href="http://www.harvix.com/images/harvixshort2.jpg">
                                   <link rel="shortcut icon" href="http://www.harvix.com/images/harvixshort2.jpg">

<style>


a:link {text-decoration: none;}      /* unvisited link */
a:visited {text-decoration: none;}  /* visited link */
a:hover {text-decoration: none;}  /* mouse over link */
a:active {text-decoration: none;}  /* selected link */




    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 20px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 100px;
      margin-top: 0;
      font-size: 200px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
    }

    .carousel .item {
      height: 500px;
    }


.carousel_bg 	{
     	position: absolute;
      	top: 0;
      	left: 0;
      	min-width: 100%;
      	height: 500px;
		}

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: px;
      padding: 0 20px;
      margin-top: 100px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }

 
.carousel-caption-spec {
      background-color: transparent;
      position: static;
      max-width: px;
      padding: 0px;
      margin-top: 10px;
    }

.carousel-caption-wiki {
      background-color: transparent;
      position: static;
      max-width: px;
      padding: 0 20px;
      margin-top: 70px;
    }


 .carousel-caption-wiki h3,
    .carousel-caption-wiki .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption-wiki .btn {
      margin-top: 10px;
    }


.container-spec{
margin-right:50px;
margin-left:50px;
position: relative;
z-index: 9;
}

.logo{color: black; font-size: 40px; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal;}

div.spacer{height:100px;}

/* Form wrapper styling */
.form-wrapper {
    width: 100%;
    padding: 10px;
    position: fixed;
    margin: 0px auto 0px auto;
    background: #444;
    background: rgba(0,0,0,.2);
    box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
 
/* Form text input */
 
.form-wrapper input {
    width: 800px;
    height: 20px;
    padding: 10px 5px;
    float: left;    
    font: Normal 20px 'Helvetica Neue';
    border: 0;
    border-radius: 3px 0 0 3px;  
    background: #eee;
}
 
.form-wrapper input:focus {
    outline: 0;
    background: #fff;
    box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
}
 
.form-wrapper input::-webkit-input-placeholder {
   color: black;
   font-weight: normal;
   font-style: italic;
}
 
.form-wrapper input:-moz-placeholder {
    color: black;
    font-weight: normal;
    font-style: italic;
}
 
.form-wrapper input:-ms-input-placeholder {
    color: black;
    font-weight: normal;
    font-style: italic;
}    
 
/* Form submit button */
.form-wrapper button {
    overflow: visible;
    position: relative;
    float: right;
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 110px;
    font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
    color: #fff;
    text-transform: uppercase;
    background: #d83c3c;
    border-radius: 0 3px 3px 0;      
    text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
}   
   
.form-wrapper button:hover{     
    background: #e54040;
}   
   
.form-wrapper button:active,
.form-wrapper button:focus{   
    background: #c42f2f;
    outline: 0;   
}
 
.form-wrapper button:before { /* left arrow */
    content: '';
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #d83c3c transparent;
    top: 12px;
    left: -6px;
}
 
.form-wrapper button:hover:before{
    border-right-color: #e54040;
}
 
.form-wrapper button:focus:before,
.form-wrapper button:active:before{
        border-right-color: #c42f2f;
}      
 
.form-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;
} 

</style>



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


</head>

  <body>



<form id="searchForm" name="searchForm" action="http://harvix.com/search4.cgi" onsubmit="submitted('h'); return false" class="form-wrapper cf">
<table cellpadding="5"><tr><td>
<div class="logo">
<strong><span style="color:black">Har</span><span style="color:red">vix</span></strong>
</div>
</td><td>
<input id="searchBox" autofocus="autofocus" autocomplete="off" type="text" spellcheck="false" name="q" value="$query"  placeholder="" required />
<button type="submit">Search</button>
</td></tr></table></form>

<div class="spacer"></div>

  <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container-fluid">



      <!-- START THE FEATURETTES -->


EOF
;
}

sub print_footer
{
print <<EOX

<!-- /END THE FEATURETTES -->



    </div><!-- /.container -->

  <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://twitter.github.com/bootstrap/assets/js/jquery.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-modal.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-button.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-collapse.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-carousel.js"></script>


  </body>
</html>



EOX
;
}


