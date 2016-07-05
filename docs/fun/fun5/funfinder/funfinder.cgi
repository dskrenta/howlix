#!/usr/bin/perl

use strict;
use warnings;

use Data::Dumper;
use URI::Fetch;

print "Content-type: text/html\n\n";

my $url = "http://9gag.com/";

my $result = URI::Fetch->fetch($url);
my $result_page = $result->content();

print Dumper($result_page);
