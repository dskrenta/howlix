#!/usr/bin/perl

use strict;

use Data::Dumper;
use Net::WolframAlpha;
use Encode;
use WWW::Google::Images;

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

my $wa_query = $wa->query(
    input => $query,
);



print_header($query);




if ($wa_query->success) {

print"  <div class=\"row-fluid\">
        <div class=\"span12\">
        ";

print"<div class=\"hero-unit-wolf\">";

    foreach my $pod (@{$wa_query->pods}) {
        print_pod($pod);
    }

print"<p>Powered by Wolfram Alpha</p>";
print"</div><!--/span-->
      </div><!--/row-->";

}

else
{

my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );

    my $result = $agent->search(($query), limit => 1);

    while (my $image = $result->next()) {
        my $url = $image->content_url();

print"<img src=\"$url\" onerror=\"this.style.display=\'none\' width=\"100%\" height=\"100%\">";

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

    <style type="text/css">
      
a:link {text-decoration:none;}      /* unvisited link */
a:visited {text-decoration:none;}  /* visited link */
a:hover {text-decoration:none;}  /* mouse over link */
a:active {text-decoration:none;}  /* selected link */

	body {
	background-color: white;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

	div.hero-unit{overflow:hidden; min-height: 330px;}


    </style>

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

