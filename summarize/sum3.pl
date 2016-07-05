#!/usr/bin/perl

use strict;
use warnings;
use CGI; 
use Lingua::EN::Summarize;

#my $cgi = CGI->new();
#my $text = $cgi->param('text');

my $text = "

The Battle of Gettysburg locally , with an ss sound, was fought July 1–3, 1863, in and around the town of Gettysburg, Pennsylvania. The battle with the largest number of casualties in the American Civil War, it is often described as the war\'s turning point. Union Maj. Gen. George Gordon Meade\'s Army of the Potomac defeated attacks by Confederate Gen. Robert E. Lee\'s Army of Northern Virginia, ending Lee\'s invasion of the North.

";

#my $summary = summarize( $text, maxlength => 500, filter => 'html', wrap => 75 );                    # Easy, no? :-)

my $summary = summarize( $text );

$summary = summarize( $text, maxlength => 500 );  # 500-byte summary
$summary = summarize( $text, filter => 'html' );  # Strip HTML formatting
$summary = summarize( $text, wrap => 75 );        # Wrap output to 75 col.

print $summary;
