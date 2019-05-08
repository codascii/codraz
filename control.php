<?php
session_start();
include 'Codraz.php';

if(!isset($_POST['bt']) OR !isset($_POST['key']) OR !isset($_POST['action']) OR !isset($_POST['inout'])) {
	// Redirection à la page d'accueil
	header("Location: /codraz");
	die();
}


if (empty($_POST['action']) OR empty($_POST['inout'])) {
	// Redirection à la page d'accueil
	// header("Location: /codraz");
	// die();
}

//var_dump($_POST);die();

$action = htmlspecialchars(htmlentities($_POST['action']));
//$_SESSION['inout'] = $_POST['inout'];

switch ($action) {
	case CODRAZ::CHIFFRER:
		$_SESSION['message'] = htmlspecialchars(htmlentities($_POST['inout']));
		$_SESSION['key'] = $_POST['key'];
		// Redirection à la page de chiffrage
		header("Location: chiffrer.php");
		die();
		break;

	case CODRAZ::DECHIFFRER:
		if (empty($_POST['key'])) {
			// Redirection à la page d'accueil
			echo json_encode(['error' => true, 'status'=> CODRAZ::NO_KEY_GIVEN, 'errorMessage' => 'Vous devez renseigner une clé pour déchiffrer']);
			die();

		}

		// Récupération de la clé pour le déchiffrage
		$_SESSION['key'] = $_POST['key'];
		$_SESSION['message'] = $_POST['inout'];

		// Redirection à la page de déchiffrage
		header("Location: dechiffrer.php");
		die();
		break;
	
	default:
		// Redirection à la page d'accueil
		header("Location: /codraz");
		die();
		break;
}