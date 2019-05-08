<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenue sur Codraz - L'application de chiffrement symétrique variable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="theme-color" content="#007BFF">
        <meta name="application-name" content="Codraz"/>
        <link rel="icon" sizes="144x144" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/codraz.css"> 
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/codraz.js"></script>
	</head>
	<body class="light">
		<form id="codraz" method="post">
			<div id="name">
				<!-- Police image : Splincide -->
				<img src="images/codraz-light.png" id="codraz-title" alt="Logo Codraz" />
			</div>
			<div id="keyzone">
				<span>Clé de chiffrage</span>
				<input type="text" name="key" id="key" placeholder="Clé de chiffrage" />
				<div id="action-bloc">
					<img src="images/favicon.png" alt="Logo Codraz"/>
					<div id="action">
						<div class="radio-group">
							<div class="radio chiffrer checked" id="radio-chiffer"></div>
							<label for="radio-chiffer" class="label">Chiffrer</label>
						</div>
						<div class="radio-group">
							<div class="radio dechiffrer" id="radio-dechiffer"></div>
							<label for="radio-dechiffer" class="label">Déchiffrer</label>
						</div>
					</div>
				</div>			
			</div>
			<div id="help">
				<i>La clé est généré automatiquement pour les chiffrages. Pour un déchiffrage, vous devez indiquer la clé.</i>
			</div>
			<div id="action-hidden">
				<input type="radio" id="chiffrer" value="chiffrer" name="action" checked="checked" />
				<input type="radio" id="dechiffrer" value="dechiffrer" name="action"/>
			</div>
			<div id="inout">
				<textarea class="form-control" name="inout" placeholder="Tapez votre texte ici..."><?php if(isset($_SESSION['inout'])) { echo $_SESSION['inout']; unset($_SESSION['inout']); } ?></textarea>
				<div id="change-theme">
					<div class="theme-button active" id="light-btn" title="Passer au thème Light">Light</div>
					<div class="theme-button" id="dark-btn" title="Passer au thème Dark">Dark</div>
				</div>
			</div>
			<div id="submit">
				<input type="submit" name="bt" id="bt" value="Chiffrer"/>
			</div>
			<div id="copyright">
				<br/>
				<p>
					<a href="https://twitter.com/razmoscii" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="https://www.instagram.com/codascii" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://www.facebook.com/codascii" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://github.com/codascii" target="_blank"><i class="fa fa-github"></i></a>
					<a href="https://www.linkedin.com/in/mohamed-houmadi-73a10413a/" target="_blank"><i class="fa fa-linkedin"></i></a>
				</p>
				<p><strong>Mohamed HOUMADI</strong>&copy; Codraz <?= date('Y') ?>.<span>Tout droits réservés.</span></p>
			</div>
		</form>
	</body>
</html>
