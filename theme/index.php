<?php
if(isset($_GET['page']) && $_GET['page'] == "reg")
	include "register.php"; 
else if(isset($_GET['page']) && $_GET['page'] == "poll" && $_SESSION['login'] == 1)
	include "poll.php"; 
else
	include "home.php"; 
	
include "footer.php"; 
?>
