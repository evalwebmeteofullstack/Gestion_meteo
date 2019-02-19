/**
 * 
 */
(function() {
	chargerListePersonnages();
})();


function chargerListePersonnages() {
	var maRequete = new XMLHttpRequest();
	maRequete.open("GET", "http://hp-api.herokuapp.com/api/characters", true);
	maRequete.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				afficherListePersonnages(this.responseText);
			} else {
				
			}
		} else {

		}
	}
	maRequete.send();
}

function afficherListePersonnages(rep) {
	var lstPersonnages = JSON.parse(rep);
	lstPersonnages.sort(function(v1, v2) {
		return v1.name.localeCompare(v2.name);
	});

	for (var i = 0; i < lstPersonnages.length; i++) {
		ajouterDivPersonnes(lstPersonnages[i])
	}
}

function ajouterDivPersonnes(personne) {
	var container = document.createElement("div");
	document.getElementById("classeur").appendChild(container);
	var nom = document.createElement("h1");
	var espece = document.createElement("h2");

	container.setAttribute("class", "fiche");
	container.style.backgroundImage = "url('" + personne.image + "')";

	container.appendChild(nom);
	container.appendChild(espece);

	nom.innerHTML = personne.name;
	espece.innerHTML = personne.species;
	
	
}