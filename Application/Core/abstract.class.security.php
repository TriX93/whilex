<?php
abstract class phpSecurityClass {

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
	
	public function text($input)
	{
		if (preg_match("/^([A-Za-z0-9_\-\.\à\ù\ò\è\é\È\É\ \Ò\?\!\À\Ù\ì\í\Ì\Í\'\s])+$/", $input))
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
		return sha1($input);
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