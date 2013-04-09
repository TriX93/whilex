<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="it-IT"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="../cdn/css/style.css" />
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
			<li><a href="#!home">Home</a></li>
		</ul>
		<div id="content">    	
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
			   A queste domande (di esempio) voteranno i developer MASTER, al raggiungimento del 51% dei voti di approvazione la domanda verrà spostata nella sezione sviluppo e i developer impegnati al progetto la realizzeranno.
			</p><br />
			<h2>L'Obietivo qual è?</h2>
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
			<p>Si comunica via IRC. Siamo nel server freenode: #whilex</p>
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
