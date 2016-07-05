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
print"<a href=\"$wiki_url\" class=\"btn btn-primary btn-large\">Read More &raquo;</a>  <a href=\"#myModal1\" role=\"button\" class=\"btn btn-primary btn-large\" data-toggle=\"modal\">Share</a></p>";
print" 
                <div id=\"myModal1\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$wiki_url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$wiki_url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$wiki_url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
";
print"</td></tr></table></div></div>";
}






if ($wa_query->success) {

print"  <div class=\"row-fluid\">
        <div class=\"span7\">
        ";

my $count = 0;

foreach my $res ( @results )
{

  $count++;

        if ($count == 1)
        {
	 my $url = $res->{url};
	print"<div class=\"row-fluid\">
	 <li class=\"span6\">
	<div class=\"hero-unit\">
	";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
	print"<iframe src=\"$url\"></iframe>";
	print"
	<a href=\"#myModal1\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

		<div id=\"myModal1\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
                </div>
              </li>
";

	}




        if ($count == 2)
        {
	 my $url = $res->{url};
        print"   <li class=\"span6\">
        <div class=\"hero-unit\">
	";
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
print"<iframe src=\"$url\"></iframe>";
	        print"
        <a href=\"#myModal2\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal2\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

                  </div>
              </li>
	</ul>
          </div>

";

        }


        if ($count == 3)
        {
          print"<div class=\"row-fluid\">
         <li class=\"span6\">
                <div class=\"hero-unit\">
	";
	my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
print"<iframe src=\"$url\"></iframe>";
        print"
        <a href=\"#myModal3\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal3\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

              </li>
";

        }


        if ($count == 4)
        {
         print"   <li class=\"span6\">
                <div class=\"hero-unit\">
	";
	my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
print"<iframe src=\"$url\"></iframe>";
                   
        print"
        <a href=\"#myModal4\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal4\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
                </div>
              </li>
        </ul>
";

        }


     if ($count == 5)
        {
        print"<div class=\"row-fluid\">
         <li class=\"span6\">
	";
	
	 my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );

    my $result = $agent->search(($query), limit => 15);

print"<a href=\"http://howlix.com/images.cgi?$query\">";
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
print"</a>";

	print"</li>";
 
        }

     if ($count == 6)
        {
        print"
         <li class=\"span6\">
        ";
	print"<div class=\"hero-unit\">";
	my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal6\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>
 
                <div id=\"myModal6\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">
 
<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>
 
<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
 
  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>
</div>
                </div>
              </li>
        </ul>
";
 
        }



   if ($count == 7)
        {
          print"<div class=\"row-fluid\">
         <li class=\"span6\">
                <div class=\"hero-unit\">
        ";
	my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal7\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal7\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

              </li>
";

        }


    if ($count == 8)
        {
         print"   <li class=\"span6\">
                <div class=\"hero-unit\">
        ";
	my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";

        print"
        <a href=\"#myModal8\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal8\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
              </li>
        </ul>
          </div>
";

        }


  if ($count == 9)
        {
          print"<div class=\"row-fluid\">
         <li class=\"span6\">
                <div class=\"hero-unit\">
        ";
        my $url = $res->{url};
	print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal9\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal9\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

              </li>
";

        }


   if ($count == 10)
        {
         print"   <li class=\"span6\">
                <div class=\"hero-unit\">
        ";
        my $url = $res->{url};
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
	my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";

        print"
        <a href=\"#myModal10\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal10\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
              </li>
        </ul>
          </div>
</div>
";

        }


}


print" <div class=\"span5\">
            
		<div class=\"hero-unit-wolf\">
";
    foreach my $pod (@{$wa_query->pods}) {
        print_pod($pod);
    }
print"</div><!--/span-->
      </div><!--/row-->";

}

else{

my $count = 0;

foreach my $res ( @results )
{

  $count++;

        if ($count == 1)
        {
         my $url = $res->{url};
        print"<div class=\"row-fluid\">
         <li class=\"span4\">
        <div class=\"hero-unit\">
        ";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal1\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal1\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
              </li>
";

        }


 if ($count == 2)
        {
         my $url = $res->{url};
        print" 
	<li class=\"span4\">
        <div class=\"hero-unit\">
        ";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal2\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal2\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
              </li>
";

        }


  if ($count == 3)
        {
         print"   <li class=\"span4\">
                <div class=\"hero-unit\">
        ";
        my $url = $res->{url};
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";

        print"
        <a href=\"#myModal3\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal3\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
</div>
              </li>
";

        }


   if ($count == 4)
        {
         my $url = $res->{url};
        print"<div class=\"row-fluid\">
         <li class=\"span4\">
        <div class=\"hero-unit\">
        ";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal4\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal4\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
              </li>
";

        }

  if ($count == 5)
        {
	print"
         <li class=\"span4\">
        ";

         my $agent = WWW::Google::Images->new(
        server => 'images.google.com',
    );

    my $result = $agent->search(($query), limit => 15);
print"<a href=\"http://howlix.com/images.cgi?$query\">";
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
print"</a>";

        print"</li>";

        }


  if ($count == 6)
        {
         print"   <li class=\"span4\">
                <div class=\"hero-unit\">
        ";
        my $url = $res->{url};
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";

        print"
        <a href=\"#myModal6\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal6\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
</div>
              </li>
";

        }



   if ($count == 7)
        {
         my $url = $res->{url};
        print"<div class=\"row-fluid\">
         <li class=\"span4\">
        <div class=\"hero-unit\">
        ";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal7\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal7\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
              </li>
";

        }



if ($count == 8)
        {
         my $url = $res->{url};
        print" 
        <li class=\"span4\">
        <div class=\"hero-unit\">
        ";
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";
        print"
        <a href=\"#myModal8\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal8\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share This Site</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>

                  </div>
              </li>
";

        }


  if ($count == 9)
        {
         print"   <li class=\"span4\">
                <div class=\"hero-unit\">
        ";
        my $url = $res->{url};
        print "<a style=\"color:#3A01DF\" href=\"$url\"><h3>$res->{title}</h3></a>";
        my $snippet = $res->{snippet};
        if ( length($snippet) > 100 )
        {
                $snippet = substr($snippet, 0, 500);
                $snippet =~ s/\s[^\s]*$//;
                $snippet .= ' ...';
        }
        print "<p>$snippet</p>";
        print"<p>$res->{url}</p>";

        print"
        <a href=\"#myModal9\" role=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\">Share</a></p>

                <div id=\"myModal9\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-header\">
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
    <h3 id=\"myModalLabel\">Share with you friends</h3>
  </div>
  <div class=\"modal-body\">

<div class=\"fb-like\" data-href=\"$url\" data-send=\"false\" data-layout=\"button_count\" data-width=\"200\" data-show-faces=\"false\" data-action=\"like\" data-colorscheme=\"light\"></div>
<p>
<p>
<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"$url\">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
<p>
<!-- Place this tag where you want the +1 button to render. -->
<div class=\"g-plusone\" data-href=\"$url\"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

  </div>
  <div class=\"modal-footer\">
    <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

     </div>
</div>
              </li>
";

        }


}

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
            print "    ", $subpod->{img}, "\n<p>";
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
        padding-top: 60px;
        padding-bottom: 40px;
	background-color:#303030;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

	div.hero-unit{overflow:hidden; min-height: 330px;}

	/*
 * Metro UI CSS
 * Copyright 2012 Sergey Pimenov
 * Licensed under the MIT Lilcense
 *
 * Tiles.less
 *
 */
.tile-group {
  margin: 0;
  margin-right: 80px;
  float: left;
  width: auto;
  height: auto;
  min-height: 1px;
  width: 802px;
}
.tile {
  display: block;
  float: left;
  background-color: #525252;
  width: 150px;
  height: 150px;
  cursor: pointer;
  box-shadow: inset 0px 0px 1px #FFFFCC;
  text-decoration: none;
  color: #ffffff;
  overflow: hidden;
  position: relative;
  font-family: 'Segoe UI Semilight', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 300;
  font-size: 11pt;
  letter-spacing: 0.02em;
  line-height: 20px;
  margin: 0 10px 10px 0;
  overflow: hidden;
}
.tile * {
  color: #ffffff;
}
.tile .tile-content {
  width: 100%;
  height: 100%;
  padding: 0;
  padding-bottom: 30px;
  vertical-align: top;
  padding: 10px 15px;
  overflow: hidden;
  text-overflow: ellipsis;
  position: relative;
  font-family: 'Segoe UI', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 400;
  font-size: 9pt;
  color: #000000;
  color: #ffffff;
  line-height: 16px;
}
.tile .tile-content:hover {
  color: rgba(0, 0, 0, 0.8);
}
.tile .tile-content:active {
  color: rgba(0, 0, 0, 0.4);
}
.tile .tile-content:hover {
  color: #ffffff;
}
.tile .tile-content h1,
.tile .tile-content h2,
.tile .tile-content h3,
.tile .tile-content h4,
.tile .tile-content h5,
.tile .tile-content h6,
.tile .tile-content p {
  padding: 0;
  margin: 0;
  line-height: 24px;
}
.tile .tile-content h1:hover,
.tile .tile-content h2:hover,
.tile .tile-content h3:hover,
.tile .tile-content h4:hover,
.tile .tile-content h5:hover,
.tile .tile-content h6:hover,
.tile .tile-content p:hover {
  color: #ffffff;
}
.tile .tile-content p {
  font-family: 'Segoe UI', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 400;
  font-size: 9pt;
  color: #000000;
  color: #ffffff;
  line-height: 16px;
  overflow: hidden;
  text-overflow: ellipsis;
}
.tile .tile-content p:hover {
  color: rgba(0, 0, 0, 0.8);
}
.tile .tile-content p:active {
  color: rgba(0, 0, 0, 0.4);
}
.tile .tile-content p:hover {
  color: #ffffff;
}
.tile.icon  > .tile-content {
  padding: 0;
}
.tile.icon  > .tile-content  > img {
  position: absolute;
  width: 64px;
  height: 64px;
  top: 50%;
  left: 50%;
  margin-left: -32px;
  margin-top: -32px;
}
.tile.image  > .tile-content,
.tile.image-slider  > .tile-content {
  padding: 0;
}
.tile.image  > .tile-content  > img,
.tile.image-slider  > .tile-content  > img {
  width: 100%;
  height: auto;
  min-height: 100%;
  max-width: 100%;
}
.tile.image-set  > .tile-content {
  margin: 0;
  padding: 0;
  width: 25% !important;
  height: 50%;
  float: left;
  border: 1px #1e1e1e solid;
}
.tile.image-set  > .tile-content  > img {
  min-width: 100%;
  width: 100%;
  height: auto;
  min-height: 100%;
}
.tile.image-set .tile-content:first-child {
  width: 50% !important;
  float: left;
  height: 100%;
}
.tile.double {
  width: 100%;
}
.tile.triple {
  width: 470px;
}
.tile.quadro {
  width: 630px;
}
.tile.double-vertical {
  height: 350px;
}
.tile.triple-vertical {
  height: 470px;
}
.tile.quadro-vertical {
  height: 630px;
}
.tile .brand,
.tile .tile-status {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  min-height: 30px;
  background-color: transparent;
  *zoom: 1;
}
.tile .brand:before,
.tile .tile-status:before,
.tile .brand:after,
.tile .tile-status:after {
  display: table;
  content: "";
}
.tile .brand:after,
.tile .tile-status:after {
  clear: both;
}
.tile .brand  > .badge,
.tile .tile-status  > .badge {
  position: absolute;
  bottom: 0;
  right: 0;
  right: 5px;
  margin-bottom: 0;
  color: #ffffff;
  width: 34px;
  height: 28px;
  text-align: center;
  font-family: 'Segoe UI Semibold', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 600;
  font-size: 11pt;
  letter-spacing: 0.01em;
  line-height: 14pt;
  padding-top: 3px;
}
.tile .brand  > .badge.activity,
.tile .tile-status  > .badge.activity {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGMSURBVDhPvZMtTwNBEIbv2mtScaICcQJRgSgJCQIEhqSiAlEHAlFRwU/ov0AgUEgUsrIkiJIgMOAQJFSQQAIJJBWIu95Hj2eGvXIpB3W8yWTn452Z3dld25pDmqZuFEWdcrm8jr6JK7Bt+wb9Ft85+vsXswBxHHdIfmFNi4TYG7InXAp6ss52kCTJIc6e6KzSVbrdYzrYDaSFXZU4uEQ8x3FW1ZpMJge5Tn3IdQ3kID5iw4zHTqIsUEP3TWCA7WhgDjRZg/eUFRCR3Fl3KYJjyfALIUU46jHcsSlQl8FdmQJnhrcQJFbJ6QZB0LDDMNyS4XBFo1Kp9Gw4/wi247GLHmvNuBaC47Y5gtzIQB1mBmMGdDSdTpfV+QdM8vfcsqkap6ClgQIQa+a4bXViPGRO5ILjuBqYAwk7yIfhXcNz9CljDFkkST6P4JGjnHA7d+gBxAY3tIve1Khljbi1beKvakHQp0uhfTrMjvOL9H3fX9FE8OM7yxAhdem4QWHZkSufSoTYaaVSkY9kYFmfXgyTciI3uacAAAAASUVORK5CYII%3D) 50% no-repeat;
}
.tile .brand  > .badge.alert,
.tile .tile-status  > .badge.alert {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFeSURBVDhPpZMtT8RAEIbb7YoTJ04gkQgQuBNIEpB4LD8AwQ9AkCCQhGAvQSAuKHCIE0gEP+DEISAhQYK4pE0/eWa65a7lSvh4k8nsvDv77sxs67UhSZLNNE0LZ3uO/gLj/J+hAkVRWI1+geqMCuR5fkKZoyiKViX+DuQu094wy7KhEmEYrkAk0qt4Nk5R77GszQCuE8fxIXxY8ZJjgiBY8n3/UcTwlsQDNifGmF29AcBtITyGOyan47gXXFfW2g/q+yi+VeptJhVgR1KRHp4HZI+bzknQlhYcvpQZuHRF8xmnCDyLL8MZEI9o4YkW3h1VB+o73DJp3to08l7xsw9Lng5i1EiSSV/Pcbdwzfk8MLcNqjIyye1STnHD5joln7lYcGWtXaP8gYsFfeJyHvR9waExt3wKsV74L3Brn/geu3OUDqiL1T7nNoEK8mLi9RUoZYqlsv4pqtf459/oeR8seozS7mDHCwAAAABJRU5ErkJggg%3D%3D) 50% no-repeat;
}
.tile .brand  > .badge.available,
.tile .tile-status  > .badge.available {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAAKvSURBVHjahJA/bJR1HMY/31977x33r2LuClc1LYM9TSAUr5gqtkVJjAkSFxYHE3VgaWRw0cUwOagxMZLApoXFBIwuHVSoQYkVMBXUpqSkMW9jaS25plh7/3rv+3scTIwixs/8PHn+2Bk/SVtN2mqxacYOKw13KfNiXtlneihmDONXqs0VVs/VXP1UqJvnc8qBeZoWYWf9JHXVqWkj2EX55G76X86R4W40aDHNzMdzLBwJLLEWm6fTI+o0knvZ+dkgO/cDfGczTNpl5gjxePrpY0SPMKwKT1A5nCe7Y4ofDgQEv/Ghn2AqunZabUmR9Fb8gQoaUVIVFTSiokaV0qDu0T694Y+rGbWktnQ5+nHiuP+IjrFjR4cqevj9wBK8beO87t6jiyzbKJAiIEWSreQxjAm7QGyeAwzRzb39i/7WFbdV2bGs0nxvs7zjxtlOgRwZPP6v7R5PmhQPUOKEneFLd4UECfqs51WXU/opDL6wb/mdDfJkEfrXgUKk2UKbiM/5BoD76d7reujOANwgJH9H8p14PDnSzBGySZsSReecDIAIDxj/jxH/LcQtW7UJ0E8f69RwuP+0Ohwb1CnTS0CCW6zK3Wb9a4AnNcgWktRoYHdpYhgtWvypfRSARVv5yVXd2smGWuzTHo7qeRZZpk7zH00cRos2ITd5yT/HQY0gPKGW3u0YPvZ06HB77tO2hx5jN5HFTNk11lgHRIs2VW5Tp8kRf5g3eYUUSa5y/eKsfn7NTvlPaCjqelwDF3bx4ADAeXeJc1xijpCYmDJ9jKrCIe0H4IaF81/56VGDJTvtPwV1IFmhTO/4AOWDSQIAWmwiRIokADEx08xeXGD5hUjxQp0GnQCdOAKS1RnNP7tO7VDOMmO9bB8qUQRghVVCW7raUOPEvH45W7IidRoA/DEAmmk0pL+n6f4AAAAASUVORK5CYII%3D) 50% no-repeat;
}
.tile .brand  > .badge.3navailable,
.tile .tile-status  > .badge.unavailable {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAAKASURBVHjalJK9axxXFMV/772ZzOysVqvRDgtaSSwpJYFwY3ATEpIm5KNLawgp3Ljz/5E2bu20CYQUBoMNNnaRMkUKqYiQtIgdCQ0TaVc7M29n3nspzC7GMYYcuMWFe7jnHI4YjUY453DOYYyh0+l8opT63vO8L8MwbAshqKqq0lo/c849rqrquXMOIcSbGY1GWGsxxny0urr6MI7jH5RSAFhrAZBSLvc8z3+dTqf3lFL/SCnxAIwxwdra2tP19fXPAC4vL8myjKIoAIiiiF6vR7/fJ0mS75RSH19dXX0hpbwWx8fHrKys/JwkyV1rLYeHh5yenuKc420lzjm2trbY3d3F8zzyPH8ynU6/ERcXF3fiOP7D930ODg44OjoiDMOl7AWstZRlyXA4ZH9/H2MM4/H4K+l53n3f98myjJOTE4Ig+A95kUMURZydnXF+fo5SiiiKHkjf9z9f+AaWst+HRfKL2yiKbssgCNrOOWaz2Xs/vwulFLPZjLquCcPwDcM5x//B2/dyPp9XC3/WWoQQHyQbY2i32/i+T1VVTtZ1/QogSZJlGz/02VpLkiQAlGX5l2ya5mHTNPT7fba3tynLctnAd8llWTIYDNjY2MBaS1EUP0qt9YvJZPI7wM7ODsPhEK01WmuapqFpGrTWVFXFYDBgb28PIQTX19ev67r+TYzHY7TW3W63+zKO41sAaZqSZRk3NzcAtNtter0em5ubAEwmk7/zPP9USjkWaZoyn89xziWdTudRt9v9etGFuq4B8H1/aSXP89dFUdx1zp065xBpmlLXNUIIjDG0Wq1vPc+7H4bhnVarhRCCsiwpiuJPY8xPRVH8EgQBxhistfw7ABpxTL93U9x/AAAAAElFTkSuQmCC) 50% no-repeat;
}
.tile .brand  > .badge.away,
.tile .tile-status  > .badge.away {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAAJ2SURBVHjajJI7iFVnFIW//d9zz52ZO2fG14gzJBgbp5JYKPh+NqKxsxWMRZoBCxu1sAuBKFaClj5KDUQhRXybCIqICjqNYjFDhtExN45e7/uc8y+L/yJGp3A1+2fDWv/ea23zlQvIp0gpRgfrWbZRNrhP0cAOopEyGGSvWmQz15zq59SeuC5LsAis0MJ85SLKG8jXY3pXnKb8/X6iBAB8KLhuzZtQf/gbrWc/WTGetSgnAg9qlCiv/pNk1RYAqz3A6jeg/SyoxMtReRNKNsLAhj24gWW0726H+B3+9Rmyd3fPp5KyXMpf/SqNL5KelEIdH5Ke9Ejj8+SnjyrLWkolZbX7f/jZk5h/e3WN7197j0I/NnMMN3MYoiXgBv6/g+rQmUJDR/Ajv4BP0eylnU5u/pgK/Vj9Ee6/411y8gm5a4b1Qfwt9uYUrnoTXBGLvzvoFCXbDLDaVcjfd38WX0JBRCnUroRW/M1qRzRSxgPt55+NPRc8FJJgbtaB4rBz+phRxtcj//hylr5s4YDScvDVT0KfCw7yGpRGIYohfS2H3v4NoL6tYL3BbWwOsoHawY3y1tDJpp46p8pp5U2UrEcLD0BnCtT4bBIXyJ0J/Pwf0eAu8ELtiROO5uQtazy9LMAvPoKGDoU00n/CSr4K2RTkFfyCMRj+OWg2Ht9RNv27+X/PId8cVN+62/SvWAngqtehdq17yjmURlHfZjRvdxi98fyFr/21GWfT5ivnkQehRfSOnqV35S4KpW4w7ZB/1NNNMYf6wzukk3ulbBI1iIJkBBZX1Bn/gby621wyRrx0DcXhQGzPYOnEY/nmKbVeXLTicNcn+DAArZ4503S5ZjkAAAAASUVORK5CYII%3D) 50% no-repeat;
}
.tile .brand  > .badge.busy,
.tile .tile-status  > .badge.busy {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAAKNSURBVHjajJI9a1RBGIWfGeLdmPXuKkR0Q0RTmFsFUxgQNcaPRonpbAW1sAlY2IhFfoCIVSDaaVImFhYWmkTxAwJBVgttNqTYQFAjAWPi7t3svXeOxeC3hQdeZpiZ887DmTFuchIlCUoSTLOJ6erqV7F4QYXCaTo68hgDHz82WFmZsbXauKrVWYUhBjCNBsZNTaF6HdVqAT09tzlw4BJhyD8Vx1Au36dSuWyC4LPJMlpwDur1HH19jzh48DiAefUK8+QJVCrgHHR3o2PHUH8/HD16jkKhi7m5UwTBF9zdu6RzcxOJpFRSduOG1N4u5XJ+3LlTam2Vtm+XGxlR2mgokZTOzz90o6PgpqcPpRsbP83GSKWSFEXS/v2+okjq7JRA7vp1pZLSZlPJ5OQZqx07hrVtG+b1a+zNm7B7N4ShR/8u56CtDfbswYyNYZ8+hS1bMPv2XbUKw5MGMNPTsLEBhQJIfwco+SZJAo8f+7XOzj5LR0cegIUFb/715j/lnKerVKDZhFLJWlnrN9OU/1aW/Zha8+FDA4Dublhfh+8N/yVr4etXiCIIAvj0SZa1tRcAOnECtm6FWg2M+dtsDGxu8uMsYJaX31q7unpbcYyOHEFXrsDyMtTrv5NY683VKu7iRTQ4CBKqVm/h7twhnZ9/kEhK41ju2jWpWJTa2qRdu3zl81I+r2x4WNnamv8H5fKLZHQU48bHURwXdfjwM3p6egHs7CzMzPi0swyiCA0MoKEhj76wsOiePx/AmPfGTUwgQFI7UXSP3t5BcjmPvrnp37+19Wf65fJLlpbOK02XqNdpAaClBYJgVe/enWV9fciE4TB79x6iVPLGlRVMtfpGcTymxcUpUyr5nIBvAwDWIWcndiwtQAAAAABJRU5ErkJggg%3D%3D) 50% no-repeat;
}
.tile .brand  > .badge.newMessage,
.tile .tile-status  > .badge.newMessage {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAC/SURBVDhP1ZE9DgIhFIQhobDYg1haWniMbSw9j0exsfMAeg9L7Sy2kPATnCFI2LgYtjJOMjx4vPkoED+X5OK934cQ+thpFOYvSqmdMMascVDOuQMcGn1GptNaL4W1dgBkMwOSw8jeBJszIKMwexFAN0A+wnQG0Lh4wv0EJIb5AO4fRX8MoDFAlZAyPJSztOSSfiYLAYeyxTcdURcIrqSUJ7iLA4UmAdQbgnqvhakqgEoQXQtTXwEtIuCa9n8pIV67VJf6AmhGmgAAAABJRU5ErkJggg%3D%3D) 50% no-repeat;
}
.tile .brand  > .badge.paused,
.tile .tile-status  > .badge.paused {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAArSURBVDhPY/j9+7fDnz9//mPBCQxQgE8NE1QN2WDUgFEDQGDUgIE3gIEBAArtNKc4HT7sAAAAAElFTkSuQmCC) 50% no-repeat;
}
.tile .brand  > .badge.playing,
.tile .tile-status  > .badge.playing {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEXSURBVDhPY4CBnz9/pvz+/dsFyiUaMEFpBiYmJhkgtf3v37/t////Z4GIEgZwA0CAkZGRBai5AmjIYSCtABXGC1AMQAIWf/78OQ/EEVA+ToDLAJBrBIDUcqBrZgNdwwMRxQQ4DYABoOYUoCGngYFsABVCAQQNgAINYCAf//XrVwGUDwfEGgDyEgfQkH5guGwGukoEKky8AUhA5sePH6DwAQOSDAC6YgIzM7MpJyfnHagQcQYAnfwGiD2BmguBhvyBCoMBMQbsYWFh0WVlZd0B5aMAnAYAbfzz79+/SqBmV6CtL6DCGACXAQ+ABliysbF1QPk4AYYBQI0rgH7VBWo+AxXCC+AGADV+AVKJQL9GAp0MYhMBGBgA8v5j1f90TA8AAAAASUVORK5CYII%3D) 50% no-repeat;
}
.tile .brand  > .badge.error,
.tile .tile-status  > .badge.error {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFiSURBVDhPjVM7TsNQELRjy8ISBQeIREtBEYnQUXCINFTkCCBxgNwAJI5AaejSpaCAEqRINBTcIQ1SbD9/mHmfZP3iSIw0ytt9O7O7thMGHpqmGVZVNQnD8AwcMde27RL8rOt6nqbpjy7sA4RTpdQKv20fcbcuy/IOZrGVbIHLpz7RHr52TJCYukuMeU+6WDBjdxej4UyLubMbm0KdBDyTzHWEyY01UEVRnA4Q8IEdaZVAFEW3yD/g+IzzFc6VuTFAHAPXO7vLKQi5q+suuOD+X15yx4ToEXON1QB3B6ZkC3Qd+q8Kaxzbo0TMCTLPefPAfPS8nTeOtnk1YEfMsf11pIm+y/P8BLusmaCZrevsLE1QO3F51FzopJyCQil2pAnFoLLxI7X6z8SxkVjgeMn4H/jGQz3Ht/BrY2MC85nrsI/sjNpDKzMTSODzHPELQ9EY1H9ndFqCHxC/JEnyrgs1guAPTvwreuY0IiIAAAAASUVORK5CYII%3D) 50% no-repeat;
}
.tile .brand  > .badge.attention,
.tile .tile-status  > .badge.attention {
  background: #2d89ef url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEbSURBVDhPtZI9bsJAEIVZ7ANQ5gApEomChjoNBUUOkSJFivSUQE3JEThCCo4BkotcIVKKNEi2vP7hveVZrMFgKPJJo915szOzf51/Jc/zhbV2Jfc+kiR5QrLNsqzEMJJ8O0hcM1kWlWUZKtQOOo69ZGdpmn4ofB12QsI3k1BoRtP8F7Gell0GnT6rrpJ4HOfzUiU1ww7o9HepAGI2juNHyeegw7Ja3FRA9iW5jv9slSl0WqD2rEYjF7Hy68E7gCPNORpjpk44sg2CYAg969JTxVoywYIXmlyfAS77jRPDZ8PZN5j3KfiEYeh2yG07wQN5P4g/d9H9Hf5ZMkHM/QO5NbCzh6IoJgbVI/iNBdrALnY8An9X+w9rpLPbA/sADga+JgSiAAAAAElFTkSuQmCC) 50% no-repeat;
}
.tile .brand  > .name,
.tile .tile-status  > .name {
  position: absolute;
  bottom: 0;
  left: 0;
  margin-bottom: 5px;
  margin-left: 15px;
  font-family: 'Segoe UI', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 400;
  font-size: 9pt;
  color: #ffffff;
}
.tile .brand  > .name:hover,
.tile .tile-status  > .name:hover {
  color: #ffffff;
}
.tile .brand  > .name  > [class*=icon-],
.tile .tile-status  > .name  > [class*=icon-] {
  font-size: 24px;
}
.tile .brand  > .icon,
.tile .tile-status  > .icon {
  margin: 5px 15px;
  width: 32px;
  height: 32px;
}
.tile .brand  > .icon  > [class*=icon-],
.tile .tile-status  > .icon  > [class*=icon-] {
  font-size: 32px;
}
.tile .brand  > .icon  > img,
.tile .tile-status  > .icon  > img {
  width: 100%;
  height: 100%;
}
.tile .brand  > .text,
.tile .tile-status  > .text {
  position: absolute;
  left: 60px;
  top: 5px;
  right: 50px;
  font-family: 'Segoe UI', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
  font-weight: 400;
  font-size: 9pt;
  color: #000000;
  color: #ffffff;
  line-height: 14px;
}
.tile .brand  > .text:hover,
.tile .tile-status  > .text:hover {
  color: rgba(0, 0, 0, 0.8);
}
.tile .brand  > .text:active,
.tile .tile-status  > .text:active {
  color: rgba(0, 0, 0, 0.4);
}
.tile .brand  > .text:hover,
.tile .tile-status  > .text:hover {
  color: #ffffff;
}
.tile:hover {
  outline: 3px #3a3a3a solid;
}


/*
 * Metro UI CSS
 * Copyright 2012 Sergey Pimenov
 * Licensed under the MIT Lilcense
 *
 * Slider.less
 *
 */
.slider {
  height: 12px;
  width: auto;
  position: relative;
  background-color: #c6c6c6;
  margin-bottom: 10px;
}
.slider .marker {
  height: 12px;
  width: 12px;
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #000000;
  z-index: 3;
}
.slider .complete {
  height: 100%;
  width: auto;
  background-color: #00828b;
  z-index: 2;
}
.slider.vertical {
  height: auto;
  width: 12px;
}
.slider.vertical .complete {
  position: absolute;
  height: auto;
  width: 12px;
  bottom: 0;
}
.slider:hover .complete {
  background-color: #219297;
}
.slider:active .complete,
.slider:active + .marker:active .complete {
  background-color: #25bbc4;

}



    </style>
    <link href="bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.png">
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
          <a class="brand" href="#"><span style="color:white">Harvix Search</span></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><form class="navbar-search pull-left">
  <input type="text" style="width:650px;" action="http://howlix.com/search.cgi" onsubmit="submitted('h'); return false" name="q"  class="search-query" placeholder="Showing results for $query">
</li></ul><ul class="nav"><li>
<button type="submit" class="btn"><strong>Search</strong></button>
</form></li>
            </ul>
<ul class="nav">
<li>
<button class="btn dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="http://harvix.com/mst3k.cgi?$query">Web</a></li>
                  <li><a href="http://harvix.com/images.cgi?$query">Images</a></li>
                  <li><a href="http://harvix.com/videos.cgi?$query">Videos</a></li>
		</ul>
</li>
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

