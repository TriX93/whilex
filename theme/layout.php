<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="it-IT"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="cdn/css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:700|Quantico:700' rel='stylesheet' type='text/css'>
<title>while($x) { Developer Community }</title>
</head>
<body>
<div id="container">
<!-- Logo by Mte90 -->
	<div class="logo">
		<h1 class="logo-name">while <span class="logo-bracket">(</span><span class="logo-symbol">$x</span><span class="logo-bracket">)</span></h1>
		<h3 class="logo-subtitle">Italian Developers Community</h3>
	</div>
<!-- Logo by Mte90 -->
    <div id="wrapper">
		<h1>Home</h1>
		<ul id="nav">
			<li><a href="./">Home</a></li>
			<?php if($_SESSION['login'] == 0){ ?>
			<li><a href="?page=reg">Register</a></li>
			<?php } ?>
			<?php if($_SESSION['login'] == 1){ ?>
			<li><a href="?page=poll">Sondaggi</a></li>
			<li><a href="?page=logout">Logout</a></li>
			<?php } ?>
		</ul>
		
        <?php $this->pageContent(); ?>
		
		<div id="foot">Copyleft 2013</div>
    </div>
</div>
<script type="text/javascript" src="cdn/js/jquery.min.js"></script>
</body>
</html>