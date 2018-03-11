<?php
session_start();
include 'Codraz.php';

$key = htmlentities($_SESSION['key']);
$_SESSION['inout'] = Codraz::decrypt(htmlspecialchars_decode($_SESSION['inout']), $key);
$_CODRAZ['SUC'] = "Message décrypter avec succès.";

// Redirection à la page d'accueil
header("Location: /codraz");