<?php
session_start();

include 'Codraz.php';

if (!isset($_POST['bt']) or !isset($_POST['key']) or !isset($_POST['action']) or !isset($_POST['inout'])) {
	// Redirection à la page d'accueil
	header("Location: " . $_SESSION['homePage']);
	die();
}

if (empty($_POST['action']) or empty($_POST['inout'])) {
	// Redirection à la page d'accueil
	header("Location: " . $_SESSION['homePage']);
	die();
}

$action = htmlspecialchars(htmlentities($_POST['action']));
$_SESSION['inout'] = $_POST['inout'];

switch ($action) {
	case CODRAZ::CHIFFRER:
		// Redirection à la page de chiffrage
		header("Location: chiffrer.php");
		die();
		break;

	case CODRAZ::DECHIFFRER:
		if (empty($_POST['key'])) {
			// Redirection à la page d'accueil
			die();
		}

		// Récupération de la clé pour le déchiffrage
		$_SESSION['key'] = $_POST['key'];

		// Redirection à la page de déchiffrage
		header("Location: dechiffrer.php");
		die();
		break;

	default:
		// Redirection à la page d'accueil
		header("Location: " . $_SESSION['homePage']);
		die();
		break;
}
