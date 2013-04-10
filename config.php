<?php
/*
 * While($x) 
 *   Copyright (C) 2013  While($x) Team
 * 
 *   WebSite: http://www.whilex.it/
 *   GitHub: https://github.com/whilex
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
	/**
	* function compress(String $buffer)
	* This function can be use to "compress" the output in browser to minimize the payload
	* @param String $buffer - The buffer sent from ob_start() (usually)
	* @return String $buffer - The output compressed as fuck
	* @author Claudio Ludovico Panetta (@Ludo237)
	* @version 0.1 _Tested (PHP_UNIT)
	* @example For the maximum result use it w/ ob_start() function.
	*/
	function compress($buffer) {
	    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer); // remove comments
	    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer); // remove tabs, spaces, newlines, etc.
	    $buffer = str_replace('{ ', '{', $buffer); // remove unnecessary spaces.
	    $buffer = str_replace(' }', '}', $buffer);
	    $buffer = str_replace('; ', ';', $buffer);
	    $buffer = str_replace(', ', ',', $buffer);
	    $buffer = str_replace(' {', '{', $buffer);
	    $buffer = str_replace('} ', '}', $buffer);
	    $buffer = str_replace(': ', ':', $buffer);
	    $buffer = str_replace(' ,', ',', $buffer);
	    $buffer = str_replace(' ;', ';', $buffer);
	    return $buffer;
	}
	/**
	* Start global configuration Settings
	* @version 0.1 _NOTTESTED
	* ChangeLog:
	*   - Add first define & useful functions
	* TODO:
	*   - Testing everything will be better
	*   - Check and confirm the define constant for the database
	*/
	ob_start('ob_gzhandler'); // Flushing with include and echo
	ob_start('compress'); // After zipping, lets compress everything
	header('Content-type: text/html; charset=utf-8'); // Set the charset to UTF-8 for the global site
	/*********** Improve PHP configuration to prevent issues *************/
	ini_set('upload_max_filesize', '100M'); // Set an upload more big
	ini_set('default_charset', 'utf-8'); // Set the charset, again.
	ini_set('magic_quotes_runtime', 0); // Prevent the magic quote
	/*********** END PHP IMPROVEMENT ***************/
	define('MODE_ENV', TRUE); // Usefull to setup a global "Mode" for the envirorment
	define("DEFAULT_TIMEZONE","Europe/Rome"); // Set the default timezone
	date_default_timezone_set(DEFAULT_TIMEZONE); // Set the default time zone.
	setlocale(LC_ALL,'it_IT.utf-8'); // Set the default locale.
	// define("DB_NAME","whilex");
	// define("DB_HOST","localhost");
	// define("DB_USER","root");
	// define("DB_PASSWORD","password");
	if(MODE_ENV){ // Set the ENV mode of the site
		ini_set('display_errors',1); // Do not show errors(0) or showing (1)
		ini_set('error_reporting', E_ALL | E_STRICT | E_WARNING | E_NOTICE | E_COMPILE_ERROR); // Display every errors
	}else{
		@ini_set('display_errors',0);
		@ini_set('error_reporting', E_STRICT | E_NOTICE | E_COMPILE_ERROR); // Display every errors
	}
	if (!defined('PHP_VERSION_ID')){ // Using for testing purpose usefull for PHP_Unit & Stuff...
	    $version = explode('.', PHP_VERSION);
	    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
	}
	/************** END Global Configuration ********************************************/
	$db="whilex";
	$dbhost="localhost";
	$dbuser="root";
	$dbpwd="password";
	//$debug = 0; with MODE_ENV we don't need this ....

	/**
	* function mysql_start
	*/
	function mysql_start(){
		$db="whilex";
		$dbhost="localhost";
		$dbuser="root";
		$dbpwd="password";
	
		$dbtype = "mysql:dbname=$db;host=$dbhost";

		try {
			$mysql = new PDO($dbtype , $dbuser, $dbpwd);
		} catch (PDOException $e) {
			echo 'MySQL Error: ' . $e->getMessage();
		}
		
		mysql_connect($dbhost,$dbuser,$dbpwd) or die(mysql_error());
		mysql_select_db($db) or die(mysql_error()); 
		
		return $mysql;
	}
	/**
	* function mysql_kill
	*/
	function mysql_kill($mysql){
		$mysql = null;
		
		return 1;
	}
?>
