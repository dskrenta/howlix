#!/usr/bin/perl 

use strict;
use warnings;
use CGI;

my $q = CGI->new();

my $user = $q->param('user');
my $password = $q->param('password');

$user = lc $user;

if ( $user !~ /^[a-z][a-z0-9]{1,14}$/ )
{
        print_html();
        print "<p>Sorry, Bad Username '$user'</p>\n";
        exit(0);
}


if ( ! -f "/home/david/harvix/docs/hub/users/$user" )
{
        print_html();
        print "<p>Sorry, No Such User. $user, $password<p>\n";
        exit(0);
}

my $pass;

open(FILE, "</home/david/harvix/docs/hub/users/$user") or warn;
while ( my $line = <FILE> )
{
        chomp($line);

        if ( $line =~ /^password:(.*)$/ )
        {
                $pass = $1;
        }
}
close(FILE);

if ( $password ne $pass )
{
        print_html();
        print "Sorry, Wrong Password.<p>\n";
}
else
{
        #print "Location: /?user=$user\r\n\r\n";
	print_header();
	print "You got in. \n";
}

sub print_header
{
	print "Content-type: text/html\n\n";
}

sub print_html
{
	print qq{
		Content-type: text/html\n\n	
		<!DOCTYPE html>
		<html lang="en">
 		 <head>
 		 <meta charset="utf-8">
 		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
    		 <meta name="description" content="">
    		 <meta name="author" content="">
    		 <link rel="shortcut icon" href="">

    		 <title>Hub Login</title>

                 <!-- Bootstrap core CSS -->
    		 <link href="http://howlix.com/hub/css/bootstrap.min.css" rel="stylesheet">

                 <!-- Custom styles -->
    		 <link href="http://howlix.com/hub/css/signin.css" rel="stylesheet">

    		 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    		 <!--[if lt IE 9]>
      		 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      		 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                 <![endif]-->
  		 </head>

  		 <body>

    		 <div class="container">

      		 <form class="form-signin" action="http://howlix.com/hub/signi.cgi" method="post" role="form">
        	 <h2 class="form-signin-heading">Hub Login</h2>
        	 <input type="email" class="form-control" placeholder="Username" name="user" required autofocus>
        	 <input type="password" class="form-control" placeholder="Password" name="password" required>
        	 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      		 </form>

    		 </div> <!-- /container -->


      		 <!-- Bootstrap core JavaScript
    		 ================================================== -->
    		 <!-- Placed at the end of the document so the pages load faster -->
  		 </body>
		 </html>
	};
}

