#!/usr/bin/perl
use CGI':standard';
use strict;

sub blueLight {
  qq |<span class="blueLight">| .
  $_[0] .
  qq |</span>|;
}

sub blueLightC {
  if ($_[0] eq "rainbow" || $_[0] eq "Rainbow"){
    qq |$_[0]|;
  }
  else {
    blueLight($_[0]);
  }
}

print "Content-type: text/html\n\n";

print "<head>";
print "<title>LAB4 part 2 answers</title>";
print qq |<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">|;
print qq |<link href="lab4p2.css" rel="stylesheet">|;
print qq |<meta name="viewport" content="width=device-width, initial-scale=1">|;
print "</head>";



my $name = param ('name');
my $color = param ('color');
my @food = param ('food');
my $country = param ('country');

if (!defined $color){
  $color = 'rainbow';
}


if ($name ne ""){
  print "Hi " . blueLight($name) . "<br>";
}
else {
  print "Hi Nameless Person <br>";
}
if (scalar @food > 0){
  print "Did you know that in " . blueLight($country) . ", there are " . blueLightC("$color") . " " . blueLight("$food[0]s?") . "<br>";
  for (my $i=1; $i < scalar @food; $i++) {
   print blueLightC(ucfirst($color)) . " " . blueLight("$food[$i]s") . " are here too. <br>";
  }
}
else {
  print "Did you know in " . blueLight($country) . ", there are " . blueLight($color) . " unicorns? <br>";
}

print 'Just kidding :)'
