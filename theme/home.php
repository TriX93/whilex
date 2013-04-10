<div id="content" class="color-white">   
	<br />
	<?php
	if(isset($_GET['page']) && $_GET['page'] == "login"){
		  include "mod/login/login.class.php";
		  $login = new account();
		  $login->login($_POST['nickname'],$_POST['pass']);
		  header ("location: index.php");
	}
	if(isset($_GET['page']) && $_GET['page'] == "logout"){
		 session_start(); 
		 session_unset(); 
		 session_destroy();
		 if(!isset($_SESSION)) session_start();
		
		 if(!isset($_SESSION['login'])){
			$_SESSION['login'] = 0;
		 }  
		  header ("location: index.php");
	}
	?>
	<?php if($_SESSION['login'] == 0){ ?>
	<form method="POST" action="?page=login">
		<table cellpadding="2" cellspacing="2">
		<tr><td>Username:</td><td> <input type="text" name="nickname" value=""><br /><br /></td></tr>
		<tr><td>Password:</td><td> <input type="password" name="pass" value=""></td></tr>
		<tr><td> <input type="submit" value="Accedi"></td><td></td></tr>
		</table><br /><br />
	</form>
	<?php } ?>
	<h2>Cosa è?</h2>
	<p>while($x) è una community italiana di developer totalmente opensource con la politica democratica alla debian.</p><br />
	
	<h2>Come Funziona?</h2>
	<p>Per avere una community di developer bisogna prima svilupparla, 
	   e cosa c'è di meglio di una piattaforma per developer creata da developer? L'idea è molto semplice:
	   <br />
	   Il 10 Aprile ore 21:00 aprono le registrazioni ai developer che potranno accedere alla sezione "sondaggi".<br />
	   Una volta nella sezione tutti i developer, insieme, faranno le loro proposte:<br />
	   - Sviluppiamo una sezione stile stackoverflow?<br />
	   - Facciamo un login tramite facebook?<br />
	   - Sviluppiamo un app android/iphone del progetto?<br />
	   - Usiamo PDO al posto di MYSQLi?<br />
	   A queste domande (di esempio) voteranno i developer MASTER, al raggiungimento del 50% + 1 dei voti di approvazione la domanda verrà spostata nella sezione sviluppo e i developer impegnati al progetto la realizzeranno.
	</p><br />
	<h2>L'Obiettivo qual è?</h2>
	<p>L'obiettivo di questi sondaggi è di creare qualcosa che serve a noi developer. Ognuno propone di realizzare la piattaforma in un determinato modo perchè è di quei elementi e di quei strumenti che ha bisogno. Collaborando e trovando approvazione di tutti si realizzano cose insieme che servono a tutti.</p>
	<br />
	<h2>Developer Master?</h2>
	<p>Esistono due tipi di developer del progetto: MASTER / SUPPORTER.<br />
		I primi master di questo progetto sono stati scelti da me (<a href="http://twitter.com/ptkdev">@PTKDev</a>). Hanno due ruoli diversi:<br />
		I <b>master</b>: votano i sondaggi, creano sondaggi, possono fare commit, hanno accesso al database mysql e hanno un account ftp di whilex.it<br />
		I <b>supporter</b>: creano sondaggi e possono fare commit (ma devono essere approvati da uno dei master).<br /><br />
		
		La scelta di questa gerarchia è dovuta al fatto che chiunque può diventare master a patto che abbia la fiducia degli altri (in quanto si hanno accessi elevati alla piattaforma e database), nello stesso modo si può votare anche per far diventare un master un supporter se c'è un motivo valido. (escluso <a href="http://twitter.com/ptkdev">@PTKDev</a> che ha la responsabilità del dominio registrato a nome suo).<br />
	</p><br />
	<br />
	<h2>Come Si Diventa Developer Master?</h2>
	<p>Semplice. Nella sezione sondaggi chiedi di essere eletto come master! Mostri cosa hai fatto e quali contributi hai dato al progetto!<br /></p>
	<br />
	<h2>Come Si Lavora?</h2>
	<p>GitHub! Il progetto verrà interamente sviluppato su github e chiunque potrà codare! Tutti verranno ringraziati nei credits anche per un contributo piccolo: tutto è importante!</p>
	<br />
	<h2>GPL</h2>
	<p>Tutto il progetto è sotto licenza AGPLv3 / GPLv3</p>
	<br />
	<h2>IRC</h2>
	<p>Si comunica via IRC. Siamo nel server freenode: <a href="http://webchat.freenode.net?channels=whilex">#whilex</a></p>
	<br />
	<h2>Quando si inizia?</h2>
	<p>Il 10 aprile vengono aperte le iscrizioni come developer di tipo "supporter". 
	I developer master sono stati scelti per offrire un team equilibrato fra developer, 
	grafici, sviluppatori android. </p><br />
	
	<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	</script>
	<table><div id="fb-root"></div>
		<tr>
			<td class="valign-bottom"><div class="g-plusone" data-size="medium" data-href="http://www.whilex.it"></div>
				  <script type="text/javascript">
				  window.___gcfg = {lang: 'it'};

				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</td>
			<td class="valign-bottom">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="while_x " data-lang="it">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</td>
			<td class="valign-bottom"><div class="fb-like" data-send="false" data-layout="button_count" data-width="130" data-show-faces="false"></div></td>
		</tr>
	</table><br />
</div>
