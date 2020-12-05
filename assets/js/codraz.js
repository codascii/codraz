/************************************
	Auteur : Codascii
	Date   : 2018/03/11
	Site   : https://mohamedhoumadi.fr
*************************************/

// La page est chargé
document.addEventListener("DOMContentLoaded", function () {
	///////////////////////////////////////////////////////
	// 				Gestion des boutons radio
	///////////////////////////////////////////////////////
	var actions = document.querySelectorAll("div.radio");

	for (var i = actions.length - 1; i >= 0; i--) {
		actions[i].addEventListener("click", function (e) {
			// On effectue un traitement que si le bouton n'est pas déjà cocher
			if (!this.classList.contains("checked")) {
				// Suppression de la class "checked" pour l'autre radio
				document.querySelector("div.radio.checked").classList.remove("checked");

				// Ajout de la class "checked" au bouton radio cliqué
				this.classList.add("checked");

				if (this.classList.contains("chiffrer")) {
					document.querySelector("input#chiffrer").click();
					document.getElementById("bt").value = "Chiffrer";
				} else {
					document.querySelector("input#dechiffrer").click();
					document.getElementById("bt").value = "Déchiffrer";
				}
			}
		});
	}

	// Gestion du click sur les labels
	var labels = document.querySelectorAll("div#action label");
	for (var i = labels.length - 1; i >= 0; i--) {
		labels[i].addEventListener("click", function (e) {
			// Quand on click sur le label
			// On va chercher le div associé pour déclencher un click
			document.getElementById(this.htmlFor).click();
		});
	}

	///////////////////////////////////////////////////////
	// 				Changement de thème
	///////////////////////////////////////////////////////	
	var body = document.querySelector('body');
	var darkBtn = document.getElementById('dark-btn');
	var lightBtn = document.getElementById('light-btn');
	var img = document.getElementById('codraz-title');

	darkBtn.addEventListener('click', function (e) {
		if (body.classList.contains('light')) {
			//	On commance par changer l'image
			img.src = "images/codraz-dark.png";

			lightBtn.classList.remove('active');
			darkBtn.classList.add('active');

			body.classList.add('dark');
			body.classList.remove('light');
		}
	});

	lightBtn.addEventListener('click', function (e) {
		if (body.classList.contains('dark')) {
			//	On commance par changer l'image
			img.src = "images/codraz-light.png";

			darkBtn.classList.remove('active');
			lightBtn.classList.add('active');


			body.classList.add('light');
			body.classList.remove('dark');
		}
	});
});

