<?php
session_start();
include 'Codraz.php';

//	Génération de la clé de chiffrage
$key = htmlentities(Codraz::genKey(20));

// Chiffrage du texte
$_SESSION['inout'] = htmlentities(Codraz::crypt($_SESSION['inout'], $key));
$_SESSION['key'] = $key;
$_CODRAZ['SUC'] = "Message crypter avec succès.";

// Redirection à la page d'accueil
header("Location: " . $_SESSION['homePage']);
