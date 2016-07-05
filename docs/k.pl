#!/usr/bin/perl

use strict;


use URI::Fetch;
use Data::Dumper;

my $pagenew = URI::Fetch->fetch('http://en.wikipedia.org/wiki/Joseph_Merrick');
print $pagenew, "\n";
print Dumper($pagenew);
