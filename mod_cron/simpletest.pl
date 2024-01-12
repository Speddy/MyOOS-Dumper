#!/usr/bin/perl -w
#
# ERROR / FEHLER !!
# +++++++++++++++++
# If you can read this line Perl is not executed.
# Ask your hoster how to activate Perl.
#
# Wenn Du diese Zeile hier siehst, dann wird Perl nicht ausgefuehrt.
# Frage Deinen Hoster, ob und wie Du Perl aktivieren kannst.
#
# Sample Apache-Config:
# <Directory /usr/local/apache2/htdocs/myoosdumper/mod_cron>
#    Options ExecCGI
#    AddHandler cgi-script .cgi .pl
# </Directory>
#
#   MyOOS [Dumper]
#   https://www.oos-shop.de/
#
#   Copyright (c) 2013 - 2024 by the MyOOS Development Team.
#   ----------------------------------------------------------------------
#   Based on:
#
#   MySqlDumper
#   https://www.mysqldumper.de
#
#   Copyright (C)2004-2011 Daniel Schlichtholz (admin@mysqldumper.de)
#   ----------------------------------------------------------------------
#   Released under the GNU General Public License
#   ---------------------------------------------------------------------- 
#
#
# This file is part of MySQLDumper released under the GNU/GPL 2 license
# http://www.mysqldumper.net 
# @package 			MySQLDumper
# @version 			Rev: 1351 
# @author 			Author: jtietz 



use strict;
use warnings;

# Define a custom die handler
$SIG{__DIE__} = sub {
  my $error = shift;
  # Print the error to STDERR
  print STDERR "Fatal error: $error\n";
  # Exit with non-zero status
  exit 1;
};

$SIG{__WARN__} = sub {
  my $warning = shift;
  # Output the warning to STDERR
  print STDERR "Warning: $warning\n";
};


print "Content-Type: text/html; charset=utf-8\n"; # Content-Type ist ein Pflicht-Header
print "Cache-Control: no-cache, no-store, must-revalidate\n"; # Optionaler Header
print "\n"; # Leerzeile, um die Header vom Inhalt zu trennen

print "<!DOCTYPE HTML>\n";
print "<html><head><title>MyOOS [Dumper] - simple Perl test</title>\n";
print '<style type="text/css">body { padding-left:18px; font-family:Verdana,Helvetica,Sans-Serif;}</style>';
print "\n</head><body>\n";
print "<p>If you see this perl works fine on your system !<br><br>";
print "Wenn Du das siehst, funktioniert Perl auf Deinem System !</p>";
print "</body></html>\n";