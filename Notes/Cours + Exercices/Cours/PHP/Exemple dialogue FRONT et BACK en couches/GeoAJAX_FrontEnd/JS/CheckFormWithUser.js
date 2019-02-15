/**
 * 
 */
var monUser;

(function() {
	// On charge la liste des département en 1er pour fluidifier la navigation
	chargerListeDepts();

	// neutralisation de comportement par défaut de la soumission du formulaire
	// (utilisation de la variable 'form' pour limiter la répétition du code)
	// 'DRY' Don't Repeat Yourself
	// 'KISS' Keep It Simple & Stupid
	var monForm = document.getElementById("monFormulaire");
	monForm.addEventListener("submit", function(event) {
		event.preventDefault()
	});
	monForm.addEventListener("submit", verifierSaisie);
	monForm.addEventListener("reset", resStyles);

	document.getElementById("prenom").addEventListener("input", verifierPrenom);

	document.getElementById("nom").addEventListener("input", verifierNom);

	document.getElementById("email").addEventListener("input", verifierEmail);

	document.getElementById("pwd").addEventListener("input", verifierMdp);

	document.getElementById("departements").addEventListener("change",
			verifierDpt);

	document.getElementById("villes").addEventListener("change", verifierVille);

	document.getElementById("departements").addEventListener("change",
			chargerListeVille);

	monUser = new MyUser();
})();

function chargerListeVille() {
	var maRequete = new XMLHttpRequest();
	maRequete.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				console.log("reponse reçue :) ")
				afficherListeVilles(this.responseText);
			} else {
				console.log(this.status + " oops !")
			}
		} else {
			console.log(this.readyState + " --> j'en suis là ! ")
		}
	}
	var monSelect = document.getElementById("departements");
	var codeDpt = monSelect.options[monSelect.selectedIndex].value;
	maRequete.open("GET", "https://geo.api.gouv.fr/departements/" + codeDpt
			+ "/communes", true);
	maRequete.send();
}

function afficherListeVilles(rep) {
	var lstVilles = JSON.parse(rep);
	lstVilles.sort(function(v1, v2) {
		return v1.nom.localeCompare(v2.nom);
	});

	var monSelect = document.getElementById("villes");

	while (monSelect.options.length > 0) {
		monSelect.remove(0);
	}

	var monOptionDefault = document.createElement("option");
	monOptionDefault.text = "Choisir votre ville...";
	monOptionDefault.value = "-1";
	monSelect.add(monOptionDefault, monSelect[0])

	for (var i = 0; i < lstVilles.length; i++) {
		var maVille = lstVilles[i];
		var monOption = document.createElement("option");
		monOption.text = maVille.nom;
		monOption.value = maVille.codesPostaux;
		monSelect.add(monOption, monSelect[i + 1]);
	}
}

function chargerListeDepts() {
	var maRequete = new XMLHttpRequest();
	maRequete.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				console.log("reponse reçue :) ")
				afficherListeDepts(this.responseText);
			} else {
				console.log(this.status + " oops !")
			}
		} else {
			console.log(this.readyState + " --> j'en suis là ! ")
		}
	}
	maRequete.open("GET", "https://geo.api.gouv.fr/departements", true);
	maRequete.send();
}

function afficherListeDepts(rep) {
	var lstDpt = JSON.parse(rep);
	lstDpt.sort(function(d1, d2) {
		return d1.code.localeCompare(d2.code);
	});

	var monSelect = document.getElementById("departements");

	for (var i = 0; i < lstDpt.length; i++) {
		var monDpt = lstDpt[i];
		var monOption = document.createElement("option");
		monOption.text = monDpt.code + " - " + monDpt.nom;
		monOption.value = monDpt.code;
		monSelect.add(monOption, monSelect[i + 1]);
	}
}

function resStyles() {
	document.getElementById("prenom").setAttribute("class", "unsetvalue");
	document.getElementById("nom").setAttribute("class", "unsetvalue");
	document.getElementById("email").setAttribute("class", "unsetvalue");
	document.getElementById("pwd").setAttribute("class", "unsetvalue");
	document.getElementById("departements").setAttribute("class", "unsetvalue");
	document.getElementById("villes").setAttribute("class", "unsetvalue");
}

function verifierSaisie() {
	var ok = 
		verifierPrenom() & 
		verifierNom() & 
		verifierEmail() & 
		verifierMdp() & 
		verifierDpt() & 
		verifierVille();
	if (ok) {
		envoyerFormulaire();
	} else {
		alert("!!!!!!!!!!!!!!!!!!!!!");
	}
}

function envoyerFormulaire() {
	var url = "http://localhost:8080/GeoAJAX_BackEnd/Ctrl.php";

	var maReq = new XMLHttpRequest();
	maReq.open("POST", url, true);
	maReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	maReq.onreadystatechange = function() {
		if (this.readyState === 4) {
			console.log("REPONSE DE L'API DU BACK-END :")
			console.log("code " + this.status + " >>> " + this.responseText);
			if (this.status === 201) {
				alert('Nouveau compte créé avec succès');
				document.getElementById("monFormulaire").reset();
			} else {
				alert('Erreurrrrr !');
			}
		}
	}
	var villes = document.getElementById("villes");
	nomVille = villes.options[villes.selectedIndex].text;
	
	maReq.send(
			'action=' 		+ 'inscription' + 
			'&lastname=' 	+ document.getElementById("nom").value + 
			'&firstname=' 	+ document.getElementById("prenom").value + 
			'&email=' 		+ document.getElementById("email").value + 
			'&pwd=' 		+ document.getElementById("pwd").value + 
			'&zipcode=' 	+ villes.value + 
			'&cityname=' 	+ nomVille);

}

function verifierDpt() {
	var elem = document.getElementById("departements");
	var ok = (elem.selectedIndex > 0);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
	}
	return ok;
}

function verifierVille() {
	var elem = document.getElementById("villes");
	var ok = (elem.selectedIndex > 0);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
		getMeteoVille(elem.value);
	} else {
		elem.setAttribute("class", "badvalue");
	}
	return ok;
}

function getMeteoVille() {
	var maRequete = new XMLHttpRequest();
	maRequete.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				console.log("reponse reçue :) ")
				afficherImageMeteo(this.responseText);
			} else {
				console.log(this.status + " oops !")
			}
		} else {
			console.log(this.readyState + " --> j'en suis là ! ")
		}
	}
	var elem = document.getElementById("villes");
	var ville = elem.options[elem.selectedIndex].text;
	
	maRequete.open("GET", "https://www.prevision-meteo.ch/services/json/" + ville, true);
	maRequete.send();
}

function afficherImageMeteo(repServ) {
	meteoVille = JSON.parse(repServ);
	document.getElementById("imageMeteo").style.backgroundImage = "url('" + meteoVille.fcst_day_0.icon_big + "')";
	document.getElementById("minT").innerHTML = meteoVille.fcst_day_0.tmin;
	document.getElementById("maxT").innerHTML = meteoVille.fcst_day_0.tmax;
}

function verifierPrenom() {
	var elem = document.getElementById("prenom");
	var ok = monUser.checkFName(elem.value);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder",
				"le prénom doit faire au moins 1 lettre...");
	}
	return ok;
}

function verifierNom() {
	var elem = document.getElementById("nom");
	var ok = monUser.checkLName(elem.value);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder",
				"le nom doit faire au moins 1 lettre...");
	}
	/*
	 * elem.setAttribute( "class", (elem.value.length > 1) ?
	 * "goodvalue":"badvalue");
	 */
	return ok;
}

function verifierEmail() {
	var elem = document.getElementById("email");
	var ok = monUser.checkMail(elem.value);
	if (ok) {
		verifierEmailAJAX(elem);
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder", "format de mail invalide...");
	}
	return ok;
}

function verifierEmailAJAX(elem) {
	var maRequete = new XMLHttpRequest();
	maRequete.open("POST", "http://localhost:8080/GeoAJAX_BackEnd/Ctrl.php", true);
	maRequete.setRequestHeader(
			"Content-type", 
			"application/x-www-form-urlencoded");
	maRequete.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				console.log("MAIL OK --> PAS DEJA PRIS");
				elem.setAttribute("class", "goodvalue");
			} else {
				console.log("MAIL PAS DISPO --> DEJA PRIS");
				elem.setAttribute("class", "badvalue");
				elem.setAttribute("placeholder", "Ce mail est déjà pris...");
			}
		} 
	}	
	maRequete.send(
			'action=' 	+ "verifmail" + 
			'&email=' 	+ elem.value);
	
}

function verifierMdp() {
	var elem = document.getElementById("pwd");
	var ok = monUser.checkPwd(elem.value);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder",
				"le mdp doit faire entre 8 et 256 char...");
	}
	return ok;
}