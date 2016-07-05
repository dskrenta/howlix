#!/usr/bin/perl

use strict;
use warnings;
use CGI; 
use Lingua::EN::Summarize;

my $cgi = CGI->new();
my $text = $cgi->param('a');

my $summary = summarize( $text, maxlength => 500, filter => 'html', wrap => 75 );                    # Easy, no? :-)
#$summary = summarize( $text, maxlength => 500 );  # 500-byte summary
#$summary = summarize( $text, filter => 'html' );  # Strip HTML formatting
#$summary = summarize( $text, wrap => 75 );        # Wrap output to 75 col.

print $summary;
