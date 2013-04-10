<!DOCTYPE html>
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
  include "config.php";
  include "mod/login/login.class.php";
  $login = new account();
?>
<html>
	<head>
		<title>while($x) { conferma email }</title>
		<meta charset="utf-8">
	</head>

	<body>
		<p>
		<?php   
			if(!empty($_GET['hash']) && !empty($_GET['mail'])){
				$login->account_enable($_GET['hash'],$_GET['mail']);
			}
			header( "refresh:1;url=http://www.whilex.it/" ); 
		?>
		</p>
		
		<br />
	</body>
</html>
