#!/usr/bin/ruby -w
puts "Content-type: text/html\n\n"

require "cgi"
cgi = CGI.new("html4")

name = cgi['name']
address = cgi['address']
phone = cgi['phone']
name = name.split.map(&:capitalize).join(' ')
address = address.split.map(&:capitalize).join(' ')

splitPhone = phone.split('-')

print <<HEREY
<head>
<meta charset="UTF-8">
<meta name="description" content="CPS530 lab6">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#phonep1").fadeIn();
    $("#phonep2").fadeIn(3000);
    $("#phonep3").fadeIn(6000);
});
</script>
</head>
HEREY

puts "<p style=\"font-size:2em\">Hello " + name + "</p>"
puts "<p style=\"font-size:2em\">You are from " + address + "</p>"

puts <<HERE2
<p style="font-size:3em"> Your phone number is <br>
<span id="phonep1" style="color:blue;display:none">(#{splitPhone[0]})
</span>
<span id="phonep2" style="color:green;display:none">#{splitPhone[1]}
</span>-
<span id="phonep3" style="color:purple;display:none">#{splitPhone[2]}
</p>
HERE2
