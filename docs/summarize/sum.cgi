#!/usr/bin/perl

use strict;
use warnings;
use CGI;
use Lingua::EN::Summarize;

print "Content-type: text/html\n\n";

#my $instance = CGI->new();
#my $text = $instance->param('text');

my $query = CGI->new;
print $query->param( 'text' );

#my $text = "000";

#my $summary = summarize( $query, maxlength => 500, filter => 'html', wrap => 75 );                    # Easy, no? :-)

my $summary = summarize( $query );
	
$summary = summarize( $query, maxlength => 500 );  # 500-byte summary
$summary = summarize( $query, filter => 'html' );  # Strip HTML formatting
$summary = summarize( $query, wrap => 75 );        # Wrap output to 75 col.

print $summary;
