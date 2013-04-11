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
	if(!isset($_SESSION)) session_start();
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
	/**
	* function __autoload 
	* @param $className - String - the name of the class that is required (automatically insert)
	* TODO:
	*   - instead of "die" maybe it's usefull a redirect to an offline page or someting more readable
	**/
	function __autoload($className){
		if(file_exists(dirname(__FILE__).'/Application/Core/'.$className.'/class.'.strtolower($className).'.php')){
	        require_once(dirname(__FILE__).'/Application/Core/'.$className.'/class.'.strtolower($className).'.php');    
	    }else{
	        die("Unable to run. ".$className." nor Defined and Found");
	    }
	}
	/************** END Global Configuration ********************************************/
	// Starting the Application 
	$whilex = Database::init();

	
	//$db="whilex";
	//$dbhost="localhost";
	//$dbuser="root";
	//$dbpwd="password";
	//$debug = 0; with MODE_ENV we don't need this ....
	/**
	* function mysql_start()
	* Starting the mysql database
	* @version 0.2
	* TODO :
	*   - Create a general handler for database like POSTGRE, Access, ORACLE etc...
	* @deprecated
	*function mysql_start(){ // Throwable PDOException
	*	//$db="whilex";
	*	//$dbhost="localhost";
	*	//$dbuser="root";
	*	//$dbpwd="password";
	*
	*	$dbtype = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.'';
	*	try{
	*		$mysql = new PDO($dbtype , DB_USER, DB_PASSWORD);
	*	}catch(PDOException $e) {
	*		// It's better if we create an exception handler here
	*		echo 'MySQL Error: ' . $e->getMessage();
	*	}
	*	mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die(mysql_error());
	*	mysql_select_db(DB_NAME) or die(mysql_error()); 
	*	return $mysql;
	*}
	**
	* function mysql_kill
	*
	*function mysql_kill($mysql){
	*	$mysql = null;
	*return 1;
	*}*/
?>
