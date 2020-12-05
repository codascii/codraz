<?php

/**
 * 
 */
class CODRAZ
{
	const CHIFFRER = "chiffrer";
	const DECHIFFRER = "dechiffrer";

	public static function crypt($text, $key)
	{
		//	Initialisation du tableau contenant les caractères chiffrable
		for ($i = 33; $i <= 126; $i++) {
			// char chr(ascii) : retourne un char à partir de son code ascii
			$tab[chr($i)] = chr($i);
		}

		//	Récupération dela longueur du tableau
		$tabLength = count($tab);

		//	Récupération de la somme des codes ascii des caractère de la clé
		$sumAscii = self::getSumAscii($key);

		//	Calcule de l'indice de décalage à partir de la somme des codes ascii
		$ind = ($sumAscii % $tabLength) + 33;

		//	Parcours à nouveau du tableau contenant les carctères chiffrable
		//	Pour faire correspondre chaque à caractère son caractère chiffré
		for ($i = 33; $i <= 126; $i++) {
			// 60 : code ascii du "<" et 62 celui du ">"
			// On ne les prend pas pour ne pas avoir une erreur d'affichage du html
			//$ind = ($ind == 60 OR $ind == 62) ? 63 : $ind;

			$tab[chr($i)] = chr($ind);
			$ind++;
			$ind = ($ind > 126) ? 33 : $ind;
		}

		//	Parcours du texte à chiffrer
		for ($i = 0; $i < strlen($text); $i++) {
			//	Parcours du tableau finale
			for ($j = 33; $j <= 126; $j++) {
				if ($text[$i] == chr($j)) {
					$text[$i] = $tab[chr($j)];
					break;
				}
			}
		}

		return $text;
	}

	public static function decrypt($text, $key)
	{
		//	Initialisation du tableau contenant les caractères déchiffrable
		for ($i = 33; $i <= 126; $i++) {
			// char chr(ascii) : retourne un char à partir de son code ascii
			$tab[chr($i)] = chr($i);
		}

		//	Récupération dela longueur du tableau
		$tabLength = count($tab);

		//	Récupération de la somme des codes ascii des caractère de la clé
		$sumAscii = self::getSumAscii($key);

		//	Calcule de l'indice de décalage à partir de la somme des codes ascii
		$ind = ($sumAscii % $tabLength) + 33;

		//	Parcours à nouveau du tableau contenant les carctères déchiffrable
		//	Pour faire correspondre chaque à caractère son caractère déchiffré
		for ($i = 33; $i <= 126; $i++) {
			$tab[chr($ind)] = chr($i);
			$ind++;
			$ind = ($ind > 126) ? 33 : $ind;
		}

		//	Parcours du texte à déchiffrer
		for ($i = 0; $i < strlen($text); $i++) {
			//	Parcours du tableau finale
			for ($j = 33; $j <= 126; $j++) {
				if ($text[$i] == chr($j)) {
					$text[$i] = $tab[chr($j)];
					break;
				}
			}
		}

		return $text;
	}

	public static function genKey($length = 5)
	{
		$length = ($length <= 0) ? 5 : $length;

		$key = ""; // Initialisation de la clé à une chaîne vide
		for ($i = 1; $i <= $length; $i++) {
			$ascii = rand(33, 125);

			// 60 : code ascii du "<" et 62 celui du ">"
			// On ne les prend pas pour ne pas avoir une erreur d'affichage du html
			if ($ascii == 60 or $ascii == 62) $i--;
			else $key .= chr($ascii);
		}
		return $key;
	}

	public static function getSumAscii($key)
	{
		$keyLength = strlen($key);
		$sum = 0;

		for ($i = 0; $i < $keyLength; $i++) {
			$sum += ord($key[$i]);
		}
		return $sum;
	}
}
