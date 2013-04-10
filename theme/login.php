<?php
if(isset($_GET['login'])){
	$setup->login($_POST['nick'],$_POST['pass']);
	header ("location: index.php#!poll");
}
?>
