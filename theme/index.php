<?php
include "skinning.class.php"; 

if(!isset($_SESSION)) session_start();
	
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = 0;
}

$view =  new skinning();

if(isset($_GET['page']) && $_GET['page'] == "reg")
	$view->render("register.php"); 
else if(isset($_GET['page']) && $_GET['page'] == "poll" && $_SESSION['login'] == 1)
	$view->render("poll.php"); 
else
	$view->render("home.php"); 
	
?>
