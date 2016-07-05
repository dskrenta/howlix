#!/usr/bin/perl

use strict;

use Data::Dumper;
use WebService::Blekko;
use Net::WolframAlpha;
use URI::Fetch;
use WWW::Google::Images;
use WebService::GData::YouTube;
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





my $wa = Net::WolframAlpha->new (
    appid => '3EP4EG-Q7UKGAPR4Q',
);


my $query = parse_query();

my $querynew = $query." site:en.wikipedia.org";
print STDERR "querynew=$querynew\n";

my $wiki = wiki_query($query);

my $blekko = WebService::Blekko->new( auth => 'c31c6fd0', );

my $blekkonew = WebService::Blekko->new( auth => 'c31c6fd0', );

my $wa_query = $wa->query(
    input => $query,
);

my $res = $blekko->query( $query );

my $resnew = $blekkonew->query( $querynew );

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

my @resultsnew;

while ( my $rnew = $resnew->next ) {
        push @resultsnew, {
                        title => $rnew->title,
                        snippet => $rnew->snippet,
                        url => $rnew->url,
                };
}

	my $search_wiki;
	foreach my $res ( @results )
	{
		if ( $res->{url} =~ m,^http://en.wikipedia.org/wiki/(.*)$, )
		{
			#$t =~ s/\s*-\s*Wikipedia.*$//i;
			#$t =~ s/<[^>]*>//gs;
			#$search_wiki = run_wiki_query($t);
			#last;
		}
	}
	if ( $search_wiki )
	{
	    $wiki = $search_wiki;
	}

#START OF SEARCH 	

if ( $wiki )
        {
            my ( $wiki_best, $wiki_rank, $wiki_fnam, $wiki_title, $wiki_page, $wiki_image, $wiki_url ) = @$wiki;

                utf8_off($wiki_title);
                utf8_off($wiki_page);
                utf8_off($wiki_url);


print"<div class=\"span14\">
          <div class=\"hero-unit-wiki\">";

print"<table cellpadding=\"10\"><tr><td>";
print"<img src=\"$wiki_image\" class=\"img-polaroid\"/>";
print"</td><td>";
print"<h2>$wiki_title</h2>";
print"<p>$wiki_page</p>";
print"<p>$wiki_url</p>";
print"<a href=\"#myModalwiki\" style=\"color:white;\" class=\"btn btn-primary btn-large\" data-toggle=\"modal\">Read More &raquo;</a>";
print" 

  <div id=\"myModalwiki\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">$wiki_title</h3>
  </div>
  <div class=\"modal-body\">

<iframe src=\"$wiki_url\" width=\"100%\" height=\"90%\" frameborder=\"0\"></iframe>

  </div>

                  </div>

";
print"</td></tr></table></div></div>";
}






if ($wa_query->success) {

print"  <div class=\"row-fluid\">
        <div class=\"span6\">
        ";


print"   <ul id=\"myTab\" class=\"nav nav-tabs\">
              <li class=\"active\"><a href=\"#web\" data-toggle=\"tab\">Web</a></li>
	 <li><a href=\"#notes\" data-toggle=\"tab\">Notes</a></li>
	 <li><a href=\"#q\" data-toggle=\"tab\">Questions/Comments</a></li>
                </ul>
              </li>
            </ul>";
print"    <div id=\"myTabContent\" class=\"tab-content\">
              <div class=\"tab-pane fade in active\" id=\"web\">";

print"   <div class=\"well sidebar-nav\">
            <ul class=\"nav nav-list\">
<li class=\"nav-header\">Top Results:</li>
";

foreach my $res ( @results )
{


	my $url = $res->{url};
        my $snippet = $res->{snippet};
	$snippet =~ s/<\/?(b|strong)>//g;
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }

	print"<li><a href=\"$url\"><h4>$res->{title}</h4><span style=\"color:black\"><p>$snippet</p>
	<p>$url</p></span>
	</a></li>
	<li class=\"divider\"></li>
	";

}

print" <li class=\"nav-header\">web results powered by blekko</li>
 </ul>
          </div><!--/.well -->
</div>
";


print"<div class=\"tab-pane fade\" id=\"notes\">



      <form class=\"form-signin\" action=\"mailto:harvix.com\@gmail.com\" method=\"POST\" enctype=\"multipart/form-data\">
	<h2 class=\"form-signin-heading\">Your notes on $query</h2>
        <p>
	<input type=\"text\" class=\"input-block-level\" placeholder=\"Your notes on $query...\">
        <p>
	<input type=\"text\" class=\"input-block-level\" placeholder=\"Email address\">
        <p>
	<button class=\"btn btn-large btn-primary\" type=\"submit\">DO NOT PRESS THIS BUTTON! Send me my notes</button>
      </form>


</div>";




print"<div class=\"tab-pane fade\" id=\"q\">



";

print <<EOF

<!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&mod=%241%24wq1rdBcg%2467Xf3lAX9xPJwe3zcrLOQ/"+"&opts=478&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->

EOF
;




print"</div>";





print"
</div>
";


    
print"
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

print"<div class=\"span6\">";

print"   <ul id=\"myTab\" class=\"nav nav-tabs\">
              <li class=\"active\"><a href=\"#facts\" data-toggle=\"tab\">Facts</a></li>
         <li><a href=\"#n\" data-toggle=\"tab\">Information</a></li>
	  <li><a href=\"#i\" data-toggle=\"tab\">Images</a></li>
	  <li><a href=\"#v\" data-toggle=\"tab\">Videos</a></li>
                </ul>
              </li>
            </ul>";
print"    <div id=\"myTabContent\" class=\"tab-content\">
              <div class=\"tab-pane fade in active\" id=\"facts\">";

print"<div class=\"hero-unit\">";

print"  <h2>Facts: <small>$query</small></h2><hr></hr> ";

my $btw = 1;

foreach my $s ( @sentences )
{
     next if $s !~ /(\sis\s|\swas\s|\swrote\s|\she\s)/;
     next if length($s) > 200;
     next if length($s) < 50;
     next if $s =~ /(Wikipedia)/;

     print "<b>$btw.</b> $s<hr></hr><p>";
     $btw++;
}
print"<p>Computed by Harvix</p>";


if ( ! @sentences )
{
print"$pokemon";
print "<pre>", Dumper($pagenew),"</pre>" ;
}

   }

$countnew ++;

}


print"</div></div>";

print"<div class=\"tab-pane fade\" id=\"n\">";

print"<div class=\"hero-unit-wolf\">";

    foreach my $pod (@{$wa_query->pods}) {
        print_pod($pod);
    }

print"<p>Powered by Wolfram Alpha</p>";
print"</div></div>";

print"<div class=\"tab-pane fade\" id=\"i\">";
  my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );
    my $result = $agent->search(($query), limit => 100);

    while (my $image = $result->next()) {
        my $url = $image->content_url();
print"
<a href=\"$url\"><img src=\"$url\" width=\"200px\" height=\"200px\" alt=\"\" class=\"img-polaroid\" onerror=\"this.style.display=\'none\'\"></a>
";
}
print"</div>";

print"<div class=\"tab-pane fade\" id=\"v\">";



my $yt = new WebService::GData::YouTube();
$yt->query()->q($query)->limit(10,0);
my $videos = $yt->search_video();

foreach my $video (@$videos) {
my $thumb = $video->thumbnails->[0];
$thumb = $video->thumbnails->[0] if !defined $thumb;
my $url = $thumb->url;
my $title = $video->title;
my $des = $video->description;

print"
<div class=\"hero-unit\">
<table cellpadding=\"10\"><tr><td valign=\"top\">
<img src=\"$url\" width=\"200px\" height=\"200px\" alt=\"\">
</td><td valign=\"top\">
<a style=\"color:black\" href=\"http://www.youtube.com/watch?v=", $video->video_id, "\"><h3>$title</h3></a>
<p>$des</p>
</td></tr></table>
</div>
";

}



print"</div>";



print"
</div></div><!--/span-->
      </div><!--/row-->";

}

else{

print"  <div class=\"row-fluid\">
        <div class=\"span6\">
        ";

print"   <div class=\"well sidebar-nav\">
            <ul class=\"nav nav-list\">
<li class=\"nav-header\">Top Results:</li>
";

foreach my $res ( @results )
{


        my $url = $res->{url};
        my $snippet = $res->{snippet};
        $snippet =~ s/<\/?(b|strong)>//g;
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }

        print"<li><a href=\"$url\"><h4>$res->{title}</h4><span style=\"color:black\"><p>$snippet</p>
        <p>$url</p></span>
        </a></li>
        <li class=\"divider\"></li>
        ";

}

print" <li class=\"nav-header\">web results powered by blekko</li>
 </ul>
          </div><!--/.well -->";



print"
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

print"<div class=\"span6\">";
print"<div class=\"hero-unit\">";

print"<h3>Facts about $query:</h3><hr></hr><p>";

my $btw = 1;

foreach my $s ( @sentences )
{
     next if $s !~ /(\sis\s|\swas\s|\swrote\s|\she\s)/;
     next if length($s) > 200;
     next if $s =~ /(Wikipedia)/;

     print "<b>$btw.</b> $s<hr></hr><p>";
     $btw++;
}
print"<p>Computed by Harvix</p>";


if ( ! @sentences )
{
print"$pokemon";
print "<pre>", Dumper($pagenew),"</pre>" ;
}

   }

$countnew ++;

}


print"</div>";
print"</div>";


}




#END OF SEARCH


print_footer();

sub wiki_query
{
    my ( $query ) = @_;

    my $wiki = run_wiki_query($query);
    my $wiki2;
    if ( $query =~ /^((who|what|where|when|why|how)\s.*)\s[a-z]+$/i )
    {
        my $revised = $1;
        $wiki2 = run_wiki_query($revised);
    }
    if ( $wiki && $wiki2 )
    {
        $wiki = $wiki2 if $wiki2->[0] < $wiki->[0];
    }

    return if ! $wiki;

    return fetch_wikidb( $wiki->[1] );
}

sub fetch_wikidb
{
    my ( $wiki_fnam ) = @_;

    my ( $wiki_rank, $wiki_url, $wiki_title, $wiki_page, $wiki_image );

    open( DB, "</home/david/harvix/wikidb/$wiki_fnam" ) || return;
    my $line = <DB>;
    chomp($line);
    close(DB);
    ( $wiki_rank, $wiki_fnam, $wiki_title, $wiki_page, $wiki_image ) = split( "\t", $line );
    $wiki_url = "http://en.wikipedia.org/wiki/$wiki_fnam";

    return if $wiki_title eq '';

    return [ $wiki->[0], $wiki_rank, $wiki_fnam, $wiki_title, $wiki_page, $wiki_image, $wiki_url ];
}

sub run_wiki_query
{
	my ( $query ) = @_;

	$query =~ s/[\[\]\(\)\.\?,]/ /g;
	$query =~ s/^\s*//;
	$query =~ s/\s*$//;
	$query =~ s/\s+/ /g;

	$query =~ s/^(who|what|where|when|why|how) .*?(is|was|do|did) (the )?//i;

	$query =~ s/^\s*//;
	$query =~ s/\s*$//;

	return if $query eq '';

	my ( $wiki_rank, $wiki_url, $wiki_fnam, $wiki_title, $wiki_page, $wiki_image );

	my @wiki_res;

	open(DB, "</home/david/harvix/wikidb.fast") or warn "can't read wikidb.fast";

	while ( my $line = <DB> )
	{
	    chomp($line);

	    ( $wiki_fnam, $wiki_title ) = split( "\t", $line );

            if ( !defined $wiki_title || $wiki_title eq '' )
            {
                $wiki_title = urldecode($wiki_fnam);
            }

	    $wiki_title =~ s/[_,]/ /g;
	    $wiki_title =~ s/\s{2,}/ /g;

	    my $fnam_match = $wiki_fnam;
	    $fnam_match =~ s/[_,]/ /g;
	    $fnam_match =~ s/\s{2,}/ /g;

            my $q2 = $query;
            $q2 =~ s/ /\\b\.\*\\b/g;

            my $text = $wiki_title . ' ' . $fnam_match;

#            next if $text !~ /\b$q2\b/i;

	    if ( $wiki_title =~ /^$query$/i || $fnam_match =~ /^$query$/i )
	    {
                return [ 1, $wiki_fnam ];
	    }
#	    elsif ( $wiki_title =~ /\b$query\b/i || $fnam_match =~ /\b$query\b/i )
#	    {
#		push @wiki_res, [ 2, $wiki_fnam ];
#	    }
#            else
#            {
#                push @wiki_res, [ 3, $wiki_fnam ];
#	    }

	    ( $wiki_fnam, $wiki_title, $wiki_page, $wiki_image, $wiki_url ) = undef;
	}
	close(DB);

	@wiki_res = sort { $a->[0] <=> $b->[0] or $b->[1] <=> $a->[1] } @wiki_res;

	return if ! scalar @wiki_res;
	return $wiki_res[0];
}

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



sub print_pod
{
    my ( $pod ) = @_;

    return if !defined $pod->{title};
    return if !defined $pod->{subpods};

print"<h3>";
    print $pod->{title}, ":\n<p>";
print"</h3>";

    foreach my $subpod ( @{ $pod->{subpods} } )
    {
        next if !defined $subpod->{plaintext};
        if ( defined $subpod->{img} )
        {
            print "    ", $subpod->{img}, "<hr></hr>\n<p>";
        }

        #my $s = $subpod->{plaintext};
        #$s =~ s/\n/\n    /gs;
        #print "    ", $s, "\n";
    }
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
    <title>$query | Harvix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">

    <style type="text/css">
      
a:link {text-decoration:none; color:blue;}      /* unvisited link */
a:visited {text-decoration:none; color:blue;}  /* visited link */
a:hover {text-decoration:none; color:blue;}  /* mouse over link */
a:active {text-decoration:none; color:blue;}  /* selected link */

	body {
        padding-top: 60px;
        padding-bottom: 40px;
	background-color:white;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

	div.hero-unit{overflow:hidden; min-height: 330px;}


    </style>
    <link href="bootstrap-responsive.css" rel="stylesheet">

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
	</head>

  <body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


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
  <input type="text" style="width:650px;" action="http://howlix.com/mst3k3.cgi" onsubmit="submitted('h'); return false" name="q"  class="search-query" placeholder="Showing results for $query">
</li></ul><ul class="nav"><li>
<button type="submit" class="btn"><strong>Search</strong></button>
</form></li>
            </ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">


EOF
;
}

sub print_footer
{
print <<EOX






    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://twitter.github.com/bootstrap/assets/js/jquery.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-modal.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tab.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-button.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-collapse.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-carousel.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-typeahead.js"></script>
    
    <script type="text/javascript" src="http://metroui.org.ua/js/modern/tile-slider.js"></script>

  </body>
</html>

EOX
;
}

