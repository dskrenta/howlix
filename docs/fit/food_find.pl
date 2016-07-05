#!/usr/bin/perl

use strict;

my $file_name = "apple";

####################################################################

#open(FILE, "</home/david/howlix/food/$file_name") or warn;
#while ( my $line = <FILE> )
#{
#        chomp($line);
#
#        if ( $line =~ /^password:(.*)$/ )
#        {
#                #$pass = $1;
#        }
#}
#close(FILE);

#my $name_upper = "xxx";
#my $serving_size_cups = "xxx"; 
#my $serving_size_grams = "xxx";
#my $calories = "xxx";
#my $cal_from_fat = "xxx";
#my $total_fat_grams = "xxx";
#my $total_fat_daily_percent = "xxx"; 
#my $sat_fat_grams = "xxx";
#my $sat_fat_daily_percent = "xxx";
#my $poly_fat_grams = "xxx";
#my $mono_fat_grams = "xxx";
#my $cholesterol_mg = "xxx";
#my $cholesterol_daily_percent = "xxx";
#my $sodium_mg = "xxx";
#my $sodium_daily_pecent = "xxx";
#my $total_carbs_grams = "xxx";
#my $total_carbs_daily_percent = "xxx";
#my $diet_fiber_grams = "xxx";
#my $diet_fiber_daily_percent = "xxx";
#my $sugars_grams = "xxx";
#my $protein_grams = "xxx";

########################################################################

my $transit = "xxx";

my @values = ();

open (FILE, "</home/david/howlix/docs/fit/food/$file_name") or warn;
while (my $line = <FILE>) 
{
	chomp($line);

	if ($line =~ /^name_upper:(.*)$/)
	{
		$transit = $1;
		$values[0] = "$transit";
	}

	if ($line =~ /^serving_size_cups:(.*)$/)
        {
                $transit = $1;
                $values[1] = "$transit";
        }

	if ($line =~ /^serving_size_grams:(.*)$/)
        {
                $transit = $1;
                $values[2] = "$transit";
        }

	if ($line =~ /^calories:(.*)$/)
        {
                $transit = $1;
                $values[3] = "$transit";
        }

	if ($line =~ /^cal_from_fat:(.*)$/)
        {
                $transit = $1;
                $values[4] = "$transit";
        }

	if ($line =~ /^total_fat_grams:(.*)$/)
        {
                $transit = $1;
                $values[5] = "$transit";
        }

	if ($line =~ /^total_fat_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[6] = "$transit";
        }

	if ($line =~ /^sat_fat_grams:(.*)$/)
        {
                $transit = $1;
                $values[7] = "$transit";
        }

	if ($line =~ /^sat_fat_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[8] = "$transit";
        }
	
	if ($line =~ /^poly_fat_grams:(.*)$/)
        {
                $transit = $1;
                $values[9] = "$transit";
        }

	if ($line =~ /^mono_fat_grams:(.*)$/)
        {
                $transit = $1;
                $values[10] = "$transit";
        }

	if ($line =~ /^cholesterol_mg:(.*)$/)
        {
                $transit = $1;
                $values[11] = "$transit";
        }

	if ($line =~ /^cholesterol_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[12] = "$transit";
        }

	if ($line =~ /^sodium_mg:(.*)$/)
        {
                $transit = $1;
                $values[13] = "$transit";
        }

	if ($line =~ /^sodium_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[14] = "$transit";
        }
	
	if ($line =~ /^total_carbs_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[15] = "$transit";
        }
	
	if ($line =~ /^diet_fiber_grams:(.*)$/)
        {
                $transit = $1;
                $values[16] = "$transit";
        }
	
	if ($line =~ /^diet_fiber_daily_percent:(.*)$/)
        {
                $transit = $1;
                $values[17] = "$transit";
        }

	if ($line =~ /^sugars_grams:(.*)$/)
        {
                $transit = $1;
                $values[18] = "$transit";
        }

	if ($line =~ /^protein_grams:(.*)$/)
        {
                $transit = $1;
                $values[19] = "$transit";
        }

}
close (FILE);



print "$values[0]\n";
print "$values[1]\n";
print "$values[2]\n";
print "$values[3]\n";
print "$values[4]\n";
print "$values[5]\n";
print "$values[6]\n";
print "$values[7]\n";
print "$values[8]\n";
print "$values[9]\n";
print "$values[10]\n";
print "$values[11]\n";
print "$values[12]\n";
print "$values[13]\n";
print "$values[14]\n";
print "$values[15]\n";
print "$values[16]\n";
print "$values[17]\n";
print "$values[18]\n";
print "$values[19]\n";
