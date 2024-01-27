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

define('OOS_VALID_MOD', true);

if (!@ob_start('ob_gzhandler')) {
    @ob_start();
}

global $config;

require './inc/header.php';
require MOD_PATH.'language/'.$config['language'].'/lang.php';
require MOD_PATH.'language/'.$config['language'].'/lang_help.php';
echo MODHeader(0);
echo headline($lang['L_CREDITS']);
readfile(MOD_PATH.'language/'.$config['language'].'/help.html');
echo MODFooter();
ob_end_flush();
exit();
