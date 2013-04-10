<?php if($_SESSION['login'] == 0){ ?>
<div id="content" class="color-white"><br />
<?php
if(isset($_GET['start'])){
	  include "mod/login/login.class.php";
	  $login = new account();
	  $login->account_register($_POST['nickname'],$_POST['email'],$_POST['pass1'],$_POST['pass2']);
	  $_SESSION['login'] = 0;
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
	Il codice attuale del sito (su github) è un abbozzo sviluppato in meno di 36h. Siamo stati concentrati a sviluppare un minimo di sicurezza e un abbozzo per scrivere i sondaggi. Il progetto vero e proprio si inizia da zero stabilendo delle regole per tutti :)
	<br /><br /><input type="submit" value="registra">
</form>
</div>
<?php } ?>
