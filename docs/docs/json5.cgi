#!/usr/bin/perl

use strict;
use JSON;
use URI::Fetch;
use Data::Dumper;
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


print_header($query);



foreach my $tag ( @{ $json->{tags} } )
{
    my $category = $tag->{name};
    my $results = $tag->{results};

	if($category eq "ORIG")
	{
	my $num = scalar @{ $results };
    	print "<div id=\"count\"><span class=\"label\"><h4>$num results:</h4></span></div> <div id=\"upper\"><span class=\"label label-important\"><h4>Top Results:</h4></span></div><hr></hr>";
	}

	elsif($category eq "WIKI")
        {
        my $num = scalar @{ $results };
        print "<div id=\"upper\"><span class=\"label label-success\"><h4>Quick Information:</h4></span></div><hr></hr>";
        }

	elsif($category eq "NAV")
	{

	}

	elsif($category eq "IMAGE")
	{
	my $num = scalar @{ $results };
	print "<div id=\"count\"><span class=\"label\"><h4>$num results:</h4></span></div> <div id=\"upper\"><span class=\"label label-important\"><h4>Images:</h4></span></div><hr></hr>";
	}

	elsif($category eq "date")
	{
	my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h4>$num results:</h4></span></div> <div id=\"upper\"><span class=\"label label-info\"><h4>Latest:</h4></span></div><hr></hr>";
	}
	
	elsif($category eq "PEOPLE")
        {
        my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h4>$num results:</h4></span></div> <div id=\"upper\"><span class=\"label label-info\"><h4>social:</h4></span></div><hr></hr>";
        }

	else
	{
	my $num = scalar @{ $results };
        print "<div id=\"count\"><span class=\"label\"><h4>$num results:</h4></span></div> <div id=\"upper\"><span class=\"label label-info\"><h4>$category:</h4></span></div><hr></hr>";
	}

	if($category eq "IMAGE")	
	{
		print"<div id=\"scrollable\"><div id=\"items\">";

		foreach my $result ( @{ $results } )
        	{
			print"<div class=\"item\">";
			my $url = $result->{'u'};        
        		print"<img src=\"$url\" height=\"295px\"/>";
			print"</div>";
		}

		print"</div></div>";
	}

	elsif($category eq "NAV")
	{

	}	

	elsif($category eq "WIKI")
	{


        foreach my $result ( @{ $results } )
        {
                print"<div class=\"hero-unit-wiki\">";
                my $title = $result->{'t'};
                my $url = $result->{'u'};
                my $rurl = $result->{'du'};
                my $snippet = $result->{'ws'};
		my $img = $result->{'wi'};
		print"<table cellpadding=\"10\"><tr><td>";
		print"<img src=\"$img\"/ class=\"img-rounded\"></td><td>";
                print"<h3>$title</h3>";
		print"$snippet";
                print"<p><span style=\"color:green\">$rurl</span>";
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
                if ( length($snippet) > 200 )
                {
                        $snippet = substr($snippet, 0, 200);
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
        	if ( length($snippet) > 200 )
        	{
                	$snippet = substr($snippet, 0, 200);
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
    <link href="bootstrap-responsive.css" rel="stylesheet">	
    <style type="text/css">
      body {
	padding-top: 60px;
        padding-bottom: 40px;

      }



	  #scrollable {
       overflow: auto;
       width:100%;
       height:300px; 
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


a:link {color:#black; text-decoration: none;}      /* unvisited link */
a:visited {color:#black; text-decoration: none;}  /* visited link */
a:hover {color:#black; text-decoration: none;}  /* mouse over link */
a:active {color:#black; text-decoration: none;}  /* selected link */

   /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 40px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 40px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
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


    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.html"><b><span style="color:white">Har<span style="color:red">vix</span></span></b></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><form class="navbar-search pull-left">
  <input type="text" style="width:650px;" action="http://harvix.com/json3.cgi" onsubmit="submitted('h'); return false" name="q"  class="search-query" value="$query">
</li></ul><ul class="nav"><li>
<button type="submit" class="btn"><strong>Search</strong></button>
</form></li>
</ul>
            </ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


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

  </body>
</html>



EOX
;
}

