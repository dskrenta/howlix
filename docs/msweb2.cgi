#!/usr/bin/perl

use strict;

use Data::Dumper;
use WebService::Blekko;
use URI::Fetch;
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




print"  <div class=\"row-fluid\">
        <div class=\"span12\">
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

	print"<li><a href=\"$url\" target=\"_blank\"><h4>$res->{title}</h4><span style=\"color:black\"><p>$snippet</p>
	<span style=\"color:green\"><p>$url</p></span></span>
	</a>";

	      my $pokemon = $res->{url};
   
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

print"<div class=\"hero-unit\">";

print"  <h2>Return: <small>$res->{url}</small></h2><hr></hr> ";

my $btw = 1;

foreach my $s ( @sentences )
{
     next if $s !~ /(\sis\s|\swas\s|\swrote\s|\she\s|\slike\s|\sThe\s|\sthe\s|\sinvolve\s)/;
     #next if length($s) > 200;
     #next if length($s) < 50;
     next if $s =~ /(=)/;
     next if $s =~ /(Wikipedia)/;	
     next if $s =~ /(Copyright)/;
     next if $s =~ /(I)/;
     next if $s =~ /(web)/;
     next if $s =~ /(RSS)/;
     next if $s =~ /(<)/;
     next if $s =~ /(>)/;
     next if $s =~ /(you)/;
     print "<b>$btw.</b> $s<hr></hr><p>";
     $btw++;
}


if ( ! @sentences )
{
print"$pokemon";
print "<pre>", Dumper($pagenew),"</pre>" ;
}

	print"
	</li>
	<li class=\"divider\"></li>
	";

}

print" <li class=\"nav-header\">web results powered by blekko</li>
 </ul>
          </div><!--/.well -->";


    
print"
</div>
";



print"</div><!--/span-->
      </div><!--/row-->";


#END OF SEARCH


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
    <title>$query | Harvix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">

    <style type="text/css">
      
a:link {text-decoration:none;}      /* unvisited link */
a:visited {text-decoration:none;}  /* visited link */
a:hover {text-decoration:none;}  /* mouse over link */
a:active {text-decoration:none;}  /* selected link */

	body {
	background-color:#eeeeee;;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

	div.hero-unit{overflow:hidden; min-height: 330px;}
    
</style>

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






EOF
;
}

sub print_footer
{
print <<EOX








  </body>
</html>

EOX
;
}

