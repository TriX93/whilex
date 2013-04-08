<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="it-IT"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="cdn/css/style.css" />
<title>Home</title>
</head>
<body>
<div id="container">
	<div id="logo"></div>
    <div id="wrapper">
		<h1>Home</h1>
		<ul id="nav">
			<li><a href="#!home" onClick="javascript:loadXMLDoc('theme/register.php')">Register</a></li>
			<li><a href="#!about" onClick="javascript:loadXMLDoc('theme/login.php')">Login</a></li>
			<li><a href="#!portfolio" onClick="javascript:loadXMLDoc('theme/pull.php')">Pull</a></li>
		</ul>
		<div id="content">    	
			<h2>Home Page</h2>
			<p>Text</p>
		</div>
		<div id="foot">Copyright 2013</div>
    </div>
</div>
<script type="text/javascript" src="cdn/js/jquery.min.js"></script>
<script>
function loadXMLDoc(page){
$.ajax({
    url : page,
    success : function (data,stato) {
		$('#wrapper').append('<span id="load">LOADING...</span>');
		$('#load').fadeIn('fast');
        $("#content").hide().html(data).fadeIn('slow');
        $('#load').fadeOut('fast');
    }
});
}
</script>
</body>
</html>
