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
 
if(!isset($_SESSION)) session_start();

final class setup {

	public function install($db,$dbhost,$dbuser,$dbpwd){
		$url = "http://".$_SERVER['SERVER_NAME']."/";
		$dbtype = "mysql:host=$dbhost";
		$mysql = new PDO($dbtype , $dbuser, $dbpwd);
		
		$query = $mysql->prepare("
			CREATE DATABASE IF NOT EXISTS $db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
			USE $db;
			
			CREATE TABLE IF NOT EXISTS `users` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `nick` varchar(100) NOT NULL,
			  `social_twitter` varchar(100),
			  `social_fb` varchar(100),
			  `social_gplus` varchar(100),
			  `name` varchar(100),
			  `surname` varchar(100),
			  `pass` varchar(256) NOT NULL,
			  `email` varchar(100) NOT NULL,
			  `url` varchar(100),
			  `url_avatar` varchar(100),
			  `description` varchar(100),
			  `permission` bigint(20) NOT NULL DEFAULT '0',
			  `del_status` bigint(20) NOT NULL DEFAULT '0',
			  `ip` varchar(100),
			  `iphost` varchar(100),
			  `iptime` varchar(100),
			  `hash` varchar(100),
			  `hide` tinyint(1),
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

			CREATE TABLE IF NOT EXISTS `main_poll` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `id_user_rif` bigint(20)  NOT NULL,
			  `title` varchar(100) NOT NULL,
			  `content` TEXT NOT NULL,
			  `status` bigint(20) NOT NULL DEFAULT '0',
			  `del_status` bigint(20) NOT NULL DEFAULT '0',
			  `qtype` int(10)  NOT NULL,
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
			
			CREATE TABLE IF NOT EXISTS `sub_poll` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `id_poll_rif` bigint(20)  NOT NULL,
			  `id_user_rif` bigint(20)  NOT NULL,
			  `content` TEXT NOT NULL,
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
			
			CREATE TABLE IF NOT EXISTS `poll_vote` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `id_poll_rif` bigint(20)  NOT NULL,
			  `id_user_rif` bigint(20)  NOT NULL,
			  `vote` tinyint(1)  NOT NULL DEFAULT '0',
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=INNODB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
		"); 
		$query->execute();

		mysql_kill($mysql);
		//unlink("install_core.php");
		//unlink("install.php");
	}
}
?>
