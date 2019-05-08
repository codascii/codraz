<?php
session_start();
include 'Codraz.php';

$key = htmlentities($_SESSION['key']);
$message = Codraz::decrypt(htmlspecialchars_decode($_SESSION['message']), $key);
//$_CODRAZ['SUC'] = "Message décrypter avec succès.";

// Redirection à la page d'accueil
//header("Location: /codraz");
$results['error'] = false;
$results['key'] = $key;
$results['message'] = $message;
//$results['key'] = $key;

echo json_encode($results);