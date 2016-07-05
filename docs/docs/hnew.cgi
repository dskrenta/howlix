#!/usr/bin/perl

use strict;

use Data::Dumper;
use WebService::Blekko;
use WebService::GData::YouTube;
use WWW::Google::Images;
use Net::WolframAlpha;
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

my $wiki = wiki_query($query);

my $blekko = WebService::Blekko->new( auth => 'c31c6fd0', );


my $wa_query = $wa->query(
    input => $query,
);

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
print"<div class=\"contentpadding\">";

if ( $wiki )
        {
            my ( $wiki_best, $wiki_rank, $wiki_fnam, $wiki_title, $wiki_page, $wiki_image, $wiki_url ) = @$wiki;

                utf8_off($wiki_title);
                utf8_off($wiki_page);
                utf8_off($wiki_url);


		print"<a href=\"$wiki_url\"><div class=\"h10\"><table cellpadding=\"5\"><tr><td>";
		print "<a href=\"$wiki_image\"><img src=\"$wiki_image\" height=\"150px\"></a> <p>\n" if $wiki_image ne '';
                print"</td><td>";
		print"<p><h3>$wiki_title</h3><span style=\"color:black\"> $wiki_page</span></p>";
		print"<h5>Wikipedia.com</h5>";
		print"</td></tr></table></div></a>";

}






my $count = 0;


print"<table cellpadding=\"10\"><tr VALIGN=TOP><td>";

if ($wa_query->success) {

foreach my $res ( @results )
{

  $count++;

        if ($count == 1)
        {
	
	print"<table><tr><td>";
	my $url = $res->{url};
	print"<a href=\"$url\"><div class=\"tile double double-vertical\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

	print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></a></td><p>";	
	}



 if ($count == 2)
        {
	
	print"<td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></a></td></tr><p>";     
        }


 if ($count == 3)
        {

	print"<tr><td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-green \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";     
        }




 if ($count == 4)
        {

	print"<td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-red \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr><p>";     
        }
	


}


print"<tr><td>";



 my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );

    my $result = $agent->search(($query), limit => 10);

print"<div class=\"tile double double-vertical image-slider\" data-role=\"tile-slider\" data-param-period=\"5000\" data-param-direction=\"left\">";
    while (my $image = $result->next()) {
        my $url = $image->content_url();
        
print"<div class=\"tile-content\">
                        <img src=\"$url\" alt=\"\">
                    </div>
";
}

print"  <div class=\"brand\">
                        <span class=\"name\">Images</span>
                        <div class=\"badge bg-color-orange\">200</div>
                    </div>
                </div>

";

print"</td><td>";


my $yt = new WebService::GData::YouTube();
$yt->query()->q($query)->limit(10,0);
my $videos = $yt->search_video();

print"<div class=\"tile double double-vertical image-slider\" data-role=\"tile-slider\" data-param-period=\"5000\" data-param-direction=\"left\">";

foreach my $video (@$videos) {
my $thumb = $video->thumbnails->[0];
$thumb = $video->thumbnails->[0] if !defined $thumb;
my $url = $thumb->url;


        print"<div class=\"tile-content\">
                        <img src=\"$url\" alt=\"\">
                    </div>
        ";

}

print"  <div class=\"brand\">
                        <span class=\"name\">Videos</span>
                        <div class=\"badge bg-color-orange\">20</div>
                    </div>
                </div>

";

print"</td></tr><tr><td>";


foreach my $res ( @results )
{

  $count++;

        if ($count == 15)
        {

         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }



 if ($count == 16)
        {

        print"<td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr><p>";
        }


if ($count == 17)
        {

        print"<tr><td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-green \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }




 if ($count == 18)
        {

        print"<td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-red \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr><p>";
        }


 if ($count == 19)
        {

        print"<tr><td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
        print"</div></div></td><p>";
        }

 if ($count == 20)
        {

        print"<td>";
         my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
        print"</div></div></td></tr></table><p>";
        }






}


print"</td><td>";

print"<p><p><p>";



    foreach my $pod (@{$wa_query->pods}) {
        print_pod($pod);
    }

}

else{

foreach my $res ( @results )
{

  $count++;

        if ($count == 1)
        {

        print"<table><tr><td>";
	  my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
        print"</div></div></td><p>";

        }



 if ($count == 2)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }

if ($count == 3)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-green\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }




 if ($count == 4)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-red\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr><p>";
        }



}


print"<tr><td>";

 my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );

    my $result = $agent->search(($query), limit => 10);

print"<div class=\"tile double double-vertical image-slider\" data-role=\"tile-slider\" data-param-period=\"5000\" data-param-direction=\"left\">";
    while (my $image = $result->next()) {
        my $url = $image->content_url();

print"<div class=\"tile-content\">
                        <img src=\"$url\" alt=\"\">
                    </div>
";
}

print"  <div class=\"brand\">
                        <span class=\"name\">Images</span>
                        <div class=\"badge bg-color-orange\">200</div>
                    </div>
                </div>

";

print"</td><td>";



my $yt = new WebService::GData::YouTube();
$yt->query()->q($query)->limit(10,0);
my $videos = $yt->search_video();

print"<div class=\"tile double double-vertical image-slider\" data-role=\"tile-slider\" data-param-period=\"5000\" data-param-direction=\"left\">";

foreach my $video (@$videos) {
my $thumb = $video->thumbnails->[0];
$thumb = $video->thumbnails->[0] if !defined $thumb;
my $url = $thumb->url;


	print"<div class=\"tile-content\">
                        <img src=\"$url\" alt=\"\">
                    </div>
	";

}

print"  <div class=\"brand\">
                        <span class=\"name\">Videos</span>
                        <div class=\"badge bg-color-orange\">20</div>
                    </div>
                </div>

";

print"</td><td>";




foreach my $res ( @results )
{

  $count++;

        if ($count == 15)
        {

          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical \">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }



 if ($count == 16)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr><p>";
        }


if ($count == 17)
        {

        print"<tr><td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-green\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }




 if ($count == 18)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-red\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }


if ($count == 19)
        {

	print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td><p>";
        }



 if ($count == 20)
        {

        print"<td>";
          my $url = $res->{url};
        print"<a href=\"$url\"><div class=\"tile double double-vertical bg-color-orangeDark\">
                    <div class=\"tile-content\">";

        print "<div class=\"webr\"><h3>$res->{title}</h3></div><br>";

        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<span style=\"color:black\">$snippet</span>";

        print"&nbsp;";
        print"<span style=\"color:black\"><h5> $res->{url}</h5> </span> ";
	print"</div></div></td></tr></table><p>";
        }




}






}


print"</td></tr></table>";

print"</div>";

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

print"<div class=\"h10\"><h3>";
    print $pod->{title}, ":\n<p>";
print"</h3>";

    foreach my $subpod ( @{ $pod->{subpods} } )
    {
        next if !defined $subpod->{plaintext};
        if ( defined $subpod->{img} )
        {
            print "    ", $subpod->{img}, "\n<p>";
        }

        #my $s = $subpod->{plaintext};
        #$s =~ s/\n/\n    /gs;
        #print "    ", $s, "\n";
    }
    print "</div>";
}



sub print_header
{
	my ( $query ) = @_;

	$query =~ s/[<>\&]//g;

print <<EOF

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Harvix Page">
    <meta name="author" content="Harvix">
	<link href="stylem.css" rel="stylesheet">


    <script src="http://metroui.org.ua/js/assets/jquery-1.8.2.min.js"></script>
    <script src="http://metroui.org.ua/js/assets/jquery.mousewheel.min.js"></script>
    <script src="http://metroui.org.ua/js/modern/tile-slider.js"></script>


    <title>$query | Harvix</title>

    <style>
        body {
            background: #1d1d1d;
        }




 body { font-size: 12px; width:100%; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal; margin: 0; padding: 0; } 

a:link {color:#5858FA; text-decoration:none;}  
a:visited {color:#5858FA; text-decoration:none;}
a:hover {color:red;} 

div.hello2{font-size:40px; font-family:  Helvetica, sans-serif; font-size: normal; line-height: normal;}

div.h10{width:; padding:10px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

div.new{width:; padding:2px; border:0px solid:black; margin:0px; background-color:#848484; -moz-box-shadow: 0 0 1em black
; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}


#searchBox{width:700px;}
#searchBox{font-size:25px;line-height:30px;height:30px;outline:none;border:1px solid #AAA;}
#searchBox{height:40px;clear:both;}
#search-submit{width:100px;}
#search-submit{height:40px;}
.red-button{height:32px;border:none 0;outline:none 0;font-size:14px;color:#FFF;cursor:pointer;font-weight:bold;background:#ef3625;background:-moz-linear-gradient(top, #ef3625 0%, #d02f20 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#ef3625), color-stop(100%,#d02f20));background:-webkit-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-o-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:-ms-linear-gradient(top, #ef3625 0%,#d02f20 100%);background:linear-gradient(top, #ef3625 0%,#d02f20 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ef3625', endColorstr='#d02f20',GradientType=0 );}
.search-icon{background:url('http://a.blekko-img.com/045/gz/theme21/imgs/serp08.png') no-repeat -212px 0;width:20px;height:20px;display:inline-block;}

div.contentpadding{padding:10px;}


div.webr{font-size: 20px;}

div.hwolf{width:520px; padding:20px; border:0px solid:black; margin:0px; background-color:white; -moz-box-shadow: 0 0 1em black; -webkit-box-shadow: 0 0 1em black; box-shadow: 0 0 1em black;}

</style>
</head>
<body>

<div class="new">
<table><tr><td>
<div class="hello2"><a href="index.html"><strong><span style="color:black;">Har</span><span style=color:red;">vix</span></strong></a></div>
</td><td>
<form id="searchForm" name="searchForm" action="http://harvix.com/hnew.cgi" onsubmit="submitted('h'); return false">
<input id="searchBox" autofocus="autofocus" autocomplete="off" type="text" spellcheck="false" name="q" value="$query"  />
<button type="submit" class="red-button"  href="javascript:void(0);" id="search-submit" ><span class="search-icon"></span></button>
</form>
</td></td></table>
</div>

<p>

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


