<?php
/**
 * ---------------------------------------------------------------------

   MyOOS [Dumper]
   https://www.oos-shop.de/

   Copyright (c) 2013 - 2024 by the MyOOS Development Team.
   ----------------------------------------------------------------------
   Based on:

   MySqlDumper
   https://www.mysqldumper.de

   Copyright (C)2004-2011 Daniel Schlichtholz (admin@mysqldumper.de)
   ----------------------------------------------------------------------
   Released under the GNU General Public License
   ----------------------------------------------------------------------
 */


if (isset($_SERVER['HTTPS']) && (strtolower((string) $_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == 1)) {
    $scheme = 'https';
} elseif (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) {
    $scheme = 'https';
} else {
    $scheme = 'http';
}

// Set the URL to redirect to
$logout_url = sprintf('%s://logout:logout@%s%s', $scheme, $_SERVER['HTTP_HOST'], dirname((string) $_SERVER['PHP_SELF']));


http_response_code(302);
header("Cache-Control: no-store");
header('Pragma: no-cache');
header_remove("WWW-Authenticate");


// Send the headers to redirect the user
header("Location: $logout_url");
exit;
