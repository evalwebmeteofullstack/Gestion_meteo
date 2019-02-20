//Déclaration d'un objet
var monUser;

//Fonction auto exécutante
(function() {
  // (utilisation des variables pour limiter la répétition du code)
  var monForm = document.getElementById("formInscri");
  var boxPseudo = document.getElementById("pseudoInscr");
  var boxEmail = document.getElementById("emailInscr");
  var boxPwd1 = document.getElementById("mdp1Inscr");
  var boxPwd2 = document.getElementById("mdp2Inscr");

  // neutralisation de comportement par défaut de la soumission du formulaire
  monForm.addEventListener("submit", function(event) {
    event.preventDefault()
  });

  //Ajout d'un evenement lors du submit du formulaire
  monForm.addEventListener("submit", verifierSaisie);

  //Ajout des evenements sur les textBoxs du formulaire
  boxPseudo.addEventListener("input", verifierPseudo);
  boxEmail.addEventListener("input", verifierEmail);
  boxPwd1.addEventListener("input", verifierMpdOne);
  boxPwd2.addEventListener("input", verifierMpdTwo);

  //Instance d'un objet MyUser
  monUser = new User();
})();

//Fonction qui applique une classe default aux textBoxs
function resStyles() {
	boxPseudo.setAttribute("class", "unsetvalue");
	boxEmail.setAttribute("class", "unsetvalue");
	boxPwd1.setAttribute("class", "unsetvalue");
	boxPwd2.setAttribute("class", "unsetvalue");
}

//Fonction qui appelle toutes les fonctions de vérifications des champs.
//True => Elle envoie le formulaire.
//False => Elle affiche une alerte.
function verifierSaisie() {
	var ok =
		verifierPseudo() &
		verifierEmail() &
		verifierMpdOne() &
		verifierMpdTwo();
	if (ok) {
		envoyerFormulaire();
	} else {
		alert("Erreur de saisie !!");
	}
}

//Fonction qui retourne true ou false sur la vérification du pseudo
//Et met en forme les textBoxs en fonction.
function verifierPseudo() {
	var elem = boxPseudo;
  //On récupère le bool renvoyé par la fonction checkPeudo
  //De la classe User.
	var ok = monUser.checkPseudo(elem.value);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder",
				"Le nom d'utilisateur doit faire au moins 1 lettre...");
	}
	return ok;
}

function verifierEmail() {
	var elem = boxEmail;
	var ok = monUser.checkEmail(elem.value);
	if (ok) {
		elem.setAttribute("class", "goodvalue");
	} else {
		elem.setAttribute("class", "badvalue");
		elem.setAttribute("placeholder", "Format de mail invalide...");
	}
	return ok;
}

function verifierMpdOne() {
	var elem = verifierMpdOne;
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
