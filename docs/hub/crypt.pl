#!/usr/bin/perl

use strict;
use warnings;

use Crypt::PBKDF2;

my $pbkdf2 = Crypt::PBKDF2->new(
        hash_class => 'HMACSHA2',
        hash_args => {
                sha_size => 512,
        },
        iterations => 10000,
        salt_len => 10,
);


print"Enter Password For Encryption:\n";
my $password = <>;

my $hash = $pbkdf2->generate($password);
print "$hash\n";
