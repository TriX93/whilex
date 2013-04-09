<div id="content" class="color-white"><br />
<?php
if(isset($_GET['start'])){
	  include "mod/login/login.class.php";
	  $login = new account();
	  $login->account_register($_POST['nickname'],$_POST['email'],$_POST['pass1'],$_POST['pass2']);
	  echo "<br /><br />";
}
?>
<form method="POST" action="?page=reg&start=1">
	<table>
	<tr><td>Username:</td><td> <input type="text" name="nickname" value=""><br /><br /></td></tr>
	<tr><td>Password:</td><td> <input type="password" name="pass1" value=""><br /><br /></td></tr>
	<tr><td>Password (ripeti):</td><td><input type="password" name="pass2" value=""><br /><br /></td></tr>
	<tr><td>Email (ripeti): </td><td><input type="text" name="email" value=""><br /><br /></td></tr>
	</table>
	Per coloro che hanno guardato il codice del sito su github ci scusiamo per la poca documentazione, errori e ritondanze. Il sito e l'idea sono stati partoriti in 36h, comunque come avrete capito tutto il codice del sito attuale verrà riscritto in maniera organizzata e secondo le direttive dei sondaggi: la community la si crea insieme :)
	<br /><br /><input type="submit" value="registra">
</form>
</div>
