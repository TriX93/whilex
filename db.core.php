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

class setup
{
	public function install($db,$dbhost,$dbuser,$dbpwd)
	{
		$url = "http://".$_SERVER['SERVER_NAME']."/";
		$dbtype = "mysql:host=$dbhost";
		$mysql = new PDO($dbtype , $dbuser, $dbpwd);
		
		$query = $mysql->prepare("
			CREATE DATABASE IF NOT EXISTS ? DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
			USE ?;
			
			CREATE TABLE IF NOT EXISTS `users` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `surname` varchar(100) NOT NULL,
			  `pass` varchar(100) NOT NULL,
			  `email` varchar(100) NOT NULL,
			  `url` varchar(100) NOT NULL,
			  `url_avatar` varchar(100) NOT NULL,
			  `description` varchar(100) NOT NULL,
			  `permission` bigint(20) NOT NULL DEFAULT '0',
			  `del_status` bigint(20) NOT NULL DEFAULT '0',
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

			CREATE TABLE IF NOT EXISTS `post` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `url` varchar(100) NOT NULL,
			  `title` varchar(100) NOT NULL,
			  `content` TEXT NOT NULL,
			  `seo_rank` float NOT NULL DEFAULT '0.7',
			  `seo_keys` varchar(100) NOT NULL,
			  `seo_desc` varchar(100) NOT NULL,
			  `status` bigint(20) NOT NULL DEFAULT '0',
			  `del_status` bigint(20) NOT NULL DEFAULT '0',
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
			
			CREATE TABLE IF NOT EXISTS `pull` (
			  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			  `url` varchar(100) NOT NULL,
			  `title` varchar(100) NOT NULL,
			  `content` TEXT NOT NULL,
			  `seo_rank` float NOT NULL DEFAULT '0.7',
			  `seo_keys` varchar(100) NOT NULL,
			  `seo_desc` varchar(100) NOT NULL,
			  `status` bigint(20) NOT NULL DEFAULT '0',
			  `del_status` bigint(20) NOT NULL DEFAULT '0',
			  `time` date NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
		"); 
		$query->execute(array($db,$db));

		mysql_kill($mysql);
		//unlink("install_core.php");
		//unlink("install.php");
	}
}
?>
