#!/usr/bin/perl -wT
use CGI ':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print "<html>\n";
print "<head><title>Lab 7a</title><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'></head>\n";
print "<body style='font-family: \"Sofia\", sans-serif;'>\n";
print "<center><h1 style='font-size: 70px; color: blue'>This is my first Perl program</h1></center>\n";
print "<br>\n";
print "<center><a href=\"https://www.cs.ryerson.ca/~mquiroga/lab07b.html\" target=\"_blank\">Link to Lab07b</a></center>\n";
print "</body>\n";
print "</html>\n";
