<?php
include 'Codraz.php';
$key = "";

if(isset($_POST['btc'])) {
	if(isset($_POST['text']) AND !empty($_POST['text'])) {
		$key = htmlentities(Codraz::genKey(20));
		$result = htmlentities(Codraz::crypt($_POST['text'], $key));
		$_CODRAZ['SUC'] = "Message crypter avec succès.";
	} else {
		$_CODRAZ['ERR'] = "Veuillez taper un message à crypter.";
	}
} elseif (isset($_POST['btd'])) {
	if(isset($_POST['text']) AND !empty($_POST['text']) AND isset($_POST['key']) AND !empty($_POST['key'])) {
		$key = htmlentities($_POST['key']);
		$result = Codraz::decrypt(htmlspecialchars_decode($_POST['text']), $key);
		$_CODRAZ['SUC'] = "Message décrypter avec succès.";
	} else {
		$_CODRAZ['ERR'] = "Renseigner le message et la clé associé svp.";
	}
} else {
	// Pas de traitement...
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenue sur Codraz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="theme-color" content="#007BFF">
        <meta name="application-name" content="Codraz"/>
        <link rel="icon" sizes="144x144" href="images/favicon.png">
		<link rel="stylesheet" href="assets/css/codraz.css"> 
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script type="text/javascript" language="javascript">
            window.onload = function() {
                var key = document.getElementById("r_key");
                var keyForm = document.getElementById("f_key");

                key.onblur = function() { 
                	keyForm.value = key.value;
                };
            };
        </script>
	</head>
	<body>
		<form id="codraz" method="post" action="control.php">
			<div id="name">
				<!-- Police image : Splincide -->
				<img src="images/codraz.png" alt="Logo Codraz" />
			</div>
			<div id="logo">				
				<img src="images/favicon.png" alt="Logo Codraz" />
			</div>
			<div id="keyzone">
				<span>Clé de chiffrage</span>
				<input type="text" name="key" id="key"/>
				<div id="action">
					<div class="radio-group">
						<div class="radio checked"></div>
						<label>Chiffrer</label>
					</div>
					<div class="radio-group">
						<div class="radio"></div>
						<label>Déchiffrer</label>
					</div>
				</div>				
			</div>
			<div id="action-hidden">
				<input type="radio" name="action" checked="checked" />
				<input type="radio" name="action"/>
			</div>
			<div id="inout">
				<textarea class="form-control" name="inout" placeholder="Tapez votre texte ici..."></textarea>
			</div>
			<div id="submit">
				<input type="submit" name="bt" id="bt" value="Chiffrer"/>
			</div>
			<div id="copyright">
				<p><strong>Mohamed HOUMADI</strong>&copy; Codraz 2018.<span>Tout droits réservés.</span></p>
			</div>
		</form>
	</body>
</html>
