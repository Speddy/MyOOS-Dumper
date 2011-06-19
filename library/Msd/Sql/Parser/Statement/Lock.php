<?php
/**
 * This file is part of MySQLDumper released under the GNU/GPL 2 license
 * http://www.mysqldumper.net
 *
 * @package    MySQLDumper
 * @subpackage SQL-Browser
 * @version    SVN: $Rev$
 * @author     $Author$
 */

require_once "Msd/Sql/Parser/Interface.php";
/**
 * Class to parse MySQL LOCK statements.
 * This enables you to analyze and modify MySQL queries, which the user has entered.
 *
 * @package         MySQLDumper
 * @subpackage      SQL-Browser
 */
class Msd_Sql_Parser_Statement_Lock implements Msd_Sql_Parser_Interface
{
    /**
     * Parse the statement.
     *
     * @param string $statement MySQL LOCK statement.
     *
     * @return void
     */
    public function parse($statement)
    {
        echo "$statement\n";
    }
}