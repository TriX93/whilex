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
define("ROOT_PATH", dirname(dirname(__FILE__)).'/'); // Suck but it works now...
require_once ROOT_PATH.'abstract.class.security.php'; // NAMESPACE INSTEAD!!!
require_once ROOT_PATH.'Database/class.database.php'; // Dunno if namespace works
class Login extends phpSecurityClass{
 
	public function __construct($nick,$pass){
		$mysql = Database::init(); //mysql_start();
		if(!$this->nickname($nick)){
			$_SESSION['login'] = 0;
			return 0;
		}
		$pass = sha1($pass);
		$users = $mysql->select('users')->fields(array('id'))
		->where('nick', $nick)->andwhere('pass',$pass)
		->run()->fetchAllAssoc();
		//$sql = "SELECT id FROM users WHERE nick = '$nick' AND pass = '$pass' AND hide = 0 LIMIT 1";
		//$result = $mysql->query($sql);
		//$row = $result->fetch(PDO::FETCH_ASSOC);
		if(empty($users[0]['id']))
			$_SESSION['login'] = 0;
		else{
			$_SESSION['login'] = 1;
			$_SESSION['userid'] = $row['id'];
		}
		//mysql_kill($mysql);
		return 1;
	}

	/*public function doLogin($nick,$pass){
		$mysql = Database\Database::init(); //mysql_start();
		if(!$this->nickname($nick)){
			$_SESSION['login'] = 0;
			return 0;
		}
		$pass = sha1($pass);
		$sql = "SELECT id FROM users WHERE nick = '$nick' AND pass = '$pass' AND hide = 0 LIMIT 1";
		$result = $mysql->query($sql);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		if(empty($row['id']))
			$_SESSION['login'] = 0;
		else{
			$_SESSION['login'] = 1;
			$_SESSION['userid'] = $row['id'];
		}
		mysql_kill($mysql);
		return 1;
	}*/
	
	public function account_enable($hash,$mail)
	{
		$mysql = mysql_start();
		
		$sql = "SELECT id FROM users WHERE email = '$mail' AND hash = '$hash'";
		$array = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($array);
		
		if(!empty($row['id']) && $this->code($hash) && $this->email($mail)){
			$sql = "UPDATE users SET hide = '0' WHERE email = '$mail' AND hash = '$hash' LIMIT 1"; 		
			$result = mysql_query($sql) or die(mysql_error());
			
			echo "<script>alert('Account Abilitato');</script>";
		}else{
			echo "Error: contatta ptkdev@gmail.com";
		}

	
	 return 0;
	}
	
	public function account_register($nick,$mail,$pass1,$pass2)
	{
		$mysql = mysql_start();
		$returned = 0;
		
		$data=time(); 
	    $iptime=date('Y-m-d H:i:s', $data);
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $iphost = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			
		if (!$this->email($mail)){
			if (!$this->nickname($nick)){
				$returned = 1;	
			}	
		}
		
		if($pass1 != $pass2){
			$returned = 0;	
		}else{
			$pass = sha1($pass1);
			$returned = 1;	
		}
		
		if($returned == 1){
			$hash = md5(rand(0,999999));
			
			$sql = "SELECT id FROM users WHERE email = '$mail' OR nick = '$nick' LIMIT 1";
			$array = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($array);
			if(empty($row['id'])){
				mysql_query("INSERT INTO 
								users (`nick`,`email`,`pass`,`ip`,`iphost`,`iptime`,`hash`,`hide`)
								VALUES ('$nick','$mail','$pass','$ip','$iphost','$iptime','$hash','1')
								")
				or die(mysql_error()); 
				
				mail($mail, 'whilex($x) - Verifica Email', "Conferma la registrazione clickando qui: http://www.whilex.it/confirm.php?hash=$hash&mail=$mail");
			}else{
				$returned = 2;
			}
		}
		
		if($returned == 1){
			echo "Hai registrato il tuo account.<br/>Conferma l'email per accedere.";
		}else if($returned == 2){
			echo "Errore: Email già presente nel database";
		}

		
	 return 0;
	}
	
}