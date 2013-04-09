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
 
class phpSecurityClass
{

	public function code($input)
	{
		if (preg_match("/^([A-Za-z0-9_\-\.])+$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function nickname($input)
	{
		if (preg_match("/^([A-Za-z0-9_\-\.])+$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function name($input)
	{
		if (preg_match("/^([A-Za-z\à\ù\ò\è\é\È\É\Ò\À\Ù\ì\í\Ì\Í\'\s])+$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function surname($input)
	{
		if (preg_match("/^([A-Za-z\à\ù\ò\è\é\È\É\Ò\À\Ù\ì\í\Ì\Í\'\s])+$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function email($input)
	{
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function emaildns($input)
	{
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $input)){
		  $domain = explode("@", $input);
		  if (checkdnsrr($domain[1], "MX"))
				return 1;
		}
		
		return 0;
	}
	
	public function password($input)
	{	
		return sha512($input);
	}
	
	public function url($input)
	{
		if (preg_match("/^(http:\/\/|https:\/\/)+([a-zA-Z0-9\.\,\?\'\\/\+&amp;%\$#\=~_\-@\:]*)*$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function ftp($input)
	{
		if (preg_match("/^(ftp.|ftps.)+([a-zA-Z0-9\.\,\?\'\\/\+&amp;%\$#\=~_\-@\:]*)*$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function phone($input)
	{
		if (preg_match("/^\d{3,10}$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function cap($input)
	{
		if (preg_match("/^\d{5}$/", $input))
			return 1;	
		
		return 0;
	}
	
	public function num($input)
	{
		if (preg_match("/^\d{1,15}$/", $input))
			return 1;	
		
		return 0;
	}
	
}
?>
