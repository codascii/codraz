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
		$_CODRAZ['ERR'] = "Aucun message à décrypter.";
	}
} else {
	// Pas de traitement...
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Codraz</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="lg-4 offset-4">
					<p>&nbsp;</p><p>&nbsp;</p>
						<h1>Bienvenue sur Codraz</h1>
						<p>&nbsp;</p>
						<div class="input-group">
							<span class="input-group-addon">Clé de chiffrage :</span>
							<input type="text" name="key" id="r_key" value="<?= $key ?>" class="form-control"/><p>&nbsp;</p>
						</div>
						<p>&nbsp;</p>
						<?php if(isset($_CODRAZ['ERR'])) { echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_CODRAZ['ERR'].'</div>'; unset($_CODRAZ['ERR']); } ?>
						<?php if(isset($_CODRAZ['SUC'])) { echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_CODRAZ['SUC'].'</div>'; unset($_CODRAZ['SUC']);} ?>
						<form method="post" action="#">
							<h4>Tapez votre message ici :</h4>
							<textarea class="form-control" name="text" style="padding:20px;width:100%; height:100px;border: 1px solid #dedede;border-radius: 10px; background-color: white; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;" placeholder="Votre message..."></textarea>
							<input type="hidden" name="key" id="f_key"/>
							<input type="submit" name="btc" value="Crypter" class="form-control btn btn-primary" style="border-top-left-radius: 0px; border-top-right-radius: 0px;" />
							<input type="submit" name="btd" value="Décrypter" class="form-control btn btn-primary" style="border-top-left-radius: 0px; border-top-right-radius: 0px;" />
						</form>
						<p>&nbsp;</p><p>&nbsp;</p>
						<h4>Voici votre message crypter :</h4>
						<textarea class="form-control" style="padding:20px;width:100%; height:100px;border: 1px solid #dedede;border-radius: 10px; background-color: white;"><?php if(isset($result)) echo $result; ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
