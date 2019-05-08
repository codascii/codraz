<?php
session_start();
include 'Codraz.php';

//	Génération de la clé de chiffrage
$key = (empty($_SESSION['key'])) ? (htmlentities(Codraz::genKey(20))) : htmlentities($_SESSION['key']);

// Chiffrage du texte
$message = htmlentities(Codraz::crypt($_SESSION['message'], $key));
$_CODRAZ['SUC'] = "Message crypter avec succès.";

// Redirection à la page d'accueil
//header("Location: /codraz");
$results['error'] = false;
$results['key'] = $key;
$results['message'] = $message;
//$results['key'] = $key;

echo json_encode($results);

