<?php if($_SESSION['login'] == 1){ ?>
<div id="content" class="color-white">   
	<br />
	<?php
	include "mod/poll/poll.class.php";
	$poll = new poll();
	if(isset($_GET['page']) && isset($_GET['quest']) && $_GET['page'] == "poll" && $_GET['quest'] == "send"){
		  $poll->send($_POST['title'],$_POST['text'],$_POST['type']);
		  header ("location: index.php?page=poll");
	}
	
	if(isset($_GET['page']) && isset($_GET['quest']) && isset($_GET['view']) && $_GET['page'] == "poll" && $_GET['quest'] == "subsend"){
		  $poll->subsend($_POST['text'],$_GET['view']);
		  header ("location: index.php?page=poll&view=".$_GET['view']."");
	}
	?>
	
	Il nostro obbiettivo è creare una piattaforma per sviluppatori da zero. Completa di tutto ciò che abbiamo bisogno. Fai una domanda focalizzandoti su questo concetto: cosa ti serve? cosa vorresti in una community? quali soluzioni hai in mente?
	<br /><br />
	<?php if(!isset($_GET['view'])){ ?>
	<form method="POST" action="index.php?page=poll&quest=send">
		<table cellpadding="2" cellspacing="2">
		<tr><td>Domanda:</td><td> <input type="text" name="title" value=""><br /><br /></td></tr>
		<tr><td>Tipologia:</td><td> <select name="type"><option value="1">Generale</option><option value="2">Richiesta Up/Down DevMaster</option><option value="3">Framework</option><option value="4">Moduli/Classi</option><option value="1">Sezioni/Categorie</option></select><br /><br /></td></tr>
		<tr><td>Contenuto:</td><td> <textarea type="text" name="text"></textarea></td></tr>
		<tr><td> </td><td><br /><input type="submit" value="Pubblica"></td></tr>
		</table><br /><br />
	</form>
	<?php $poll->quest(); ?>
	<?php }else if(isset($_GET['view'])){ 
	$poll->idquest($_GET['view']);
	?>
	<form method="POST" action="index.php?page=poll&view=<?php echo $_GET['view']; ?>&quest=subsend">
		<table cellpadding="2" cellspacing="2">
		<tr><td> <textarea type="text" name="text"></textarea></td></tr>
		<tr><td><br /><input type="submit" value="Rispondi"></td></tr>
		</table><br /><br />
	</form>
	
	<?php } ?>
</div>
<?php } ?>
