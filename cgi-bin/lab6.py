#!/usr/bin/python
print "Content-type:text/html\r\n\r\n"
import cgi, cgitb

form = cgi.FieldStorage()
name = form.getvalue('name')
address = form.getvalue('address')
phone = form.getvalue('phone')
phoneParts = phone.split("-")

print """
<html><head>
<title>LAB 6 PYTHON</title>
<meta charset="UTF-8">
<meta name="description" content="CPS530 lab6b">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#phonep1").animate({top:'100px'});
    $("#phonep2").animate({top:'170px',left:'100px'});
    $("#hyphen").animate({top:'240px',left:'175px'});
    $("#phonep3").animate({top:'310px',left:'250px'});
});
</script>
</head>
"""
print '<body style="font-size:2em">'
print 'Hello %s <br>' % name
print 'You live at %s <br>Your address is at' % address
print '<div style="font-size:3em"> '
print '<span id="phonep1" style="color:blue;position:relative">(%s)</span>' % phoneParts[0]
print '<span id="phonep2" style="color:green;position:relative">%s</span>' % phoneParts[1]
print '<span id="hyphen" style="color:teal;position:relative"> - </span>'
print '<span id="phonep3" style="color:magenta;position:relative">%s</span>' % phoneParts[2]
print '</div>'
print '</body>'
print '</html>'
