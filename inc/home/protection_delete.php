<?php
/**
 * ---------------------------------------------------------------------

   MyOOS [Dumper]
   https://www.oos-shop.de/

   Copyright (c) 2013 - 2023 by the MyOOS Development Team.
   ----------------------------------------------------------------------
   Based on:

   MySqlDumper
   https://www.mysqldumper.de

   Copyright (C)2004-2011 Daniel Schlichtholz (admin@mysqldumper.de)
   ----------------------------------------------------------------------
   Released under the GNU General Public License
   ----------------------------------------------------------------------
 */

if (!defined('MOD_VERSION')) {
    exit('No direct access.');
}
global $config;
@unlink($config['paths']['root'].'.htaccess');
@unlink($config['paths']['root'].'.htpasswd');
$action = 'status';

// todo -> give user info about success or failure of deleting action
