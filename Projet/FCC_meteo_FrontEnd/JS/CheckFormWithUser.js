//Déclaration d'un objet
var monUser;
// (utilisation des variables pour limiter la répétition du code)
var monForm = document.getElementById("formInscri");
var boxPseudo = document.getElementById("pseudoInscr");
var boxEmail = document.getElementById("emailInscr");
var boxPwd1 = document.getElementById("mdp1Inscr");
var boxPwd2 = document.getElementById("mdp2Inscr");
var classPseudo = boxPseudo.className;
var classEmail = boxEmail.className;
var classPwd1 = boxPwd1.className;
var classPwd2 = boxPwd2.className;

//Fonction auto exécutante
(function() {
  // neutralisation de comportement par défaut de la soumission du formulaire
  monForm.addEventListener("submit", function(event) {
    event.preventDefault()
  });

  //Ajout d'un evenement lors du submit du formulaire
  monForm.addEventListener("submit", verifierSaisie);
  resStyles();

  //Ajout des evenements sur les textBoxs du formulaire
  boxPseudo.addEventListener("input", verifierPseudo);
  boxEmail.addEventListener("input", verifierEmail);
  boxPwd1.addEventListener("input", verifierMpdOne);
  boxPwd2.addEventListener("input", verifierMpdTwo);

  //Instance d'un objet MyUser
  monUser = new MyUser();
})();

//Fonction qui applique une classe default aux textBoxs
function resStyles() {
  var defaultClass = boxPseudo.className;
  boxPseudo.className = defaultClass + " " + "unsetvalue";
  defaultClass = boxEmail.className;
  boxEmail.className = defaultClass + " " + "unsetvalue";
  defaultClass = boxPwd1.className;
  boxPwd1.className = defaultClass + " " + "unsetvalue";
  defaultClass = boxPwd2.className;
  boxPwd2.className = defaultClass + " " + "unsetvalue";
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

//Communication avec le backEnd.
function envoyerFormulaire() {
  //URL du serveur BACKEND
  var urlBack = "http://localhost:8080/Gestion_meteo/Projet/FCC_meteo_BackEnd/Ctrl.php";
  //Objet pour realiser les requetes
  var maReq = new XMLHttpRequest();
  maReq.open("POST", urlBack, true);
  maReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  maReq.onreadystatechange = function() {
  if (this.readyState === 4) {
    console.log("REPONSE DE L'API DU BACK-END :")
    console.log("code " + this.status + " >>> " + this.responseText);
    if (this.status === 201) {
      alert('Nouveau compte créé avec succès');
      monForm.reset();
    } else {
      alert('Erreurrrrr !');
    }
  }
}

maReq.send(
    'action=' 		+ 'inscription');

}

//Fonction qui retourne true ou false sur la vérification du pseudo
//Et met en forme les textBoxs en fonction.
function verifierPseudo() {
  //On récupère le bool renvoyé par la fonction checkPeudo
  //De la classe User.
	var ok = monUser.checkPseudo(boxPseudo.value);
	if (ok) {
    boxPseudo.className = classPseudo + " " + "goodvalue";
	} else {
    boxPseudo.className = classPseudo + " " + "badvalue";
		boxPseudo.setAttribute("placeholder",
				"Le nom d'utilisateur doit faire au moins 1 lettre...");
	}
	return ok;
}

function verifierEmail() {
	var ok = monUser.checkEmail(boxEmail.value);
	if (ok) {
		boxEmail.className = classEmail + " " + "goodvalue";
	} else {
		boxEmail.className = classEmail + " " + "badvalue";
		boxEmail.setAttribute("placeholder", "Format de mail invalide...");
	}
	return ok;
}

function verifierMpdOne() {
	var ok = monUser.checkPwd(boxPwd1.value);
	if (ok) {
		boxPwd1.className = classPwd1 + " " + "goodvalue";
    verifierMpdTwo();
	} else {
		boxPwd1.className = classPwd1 + " " + "badvalue";
    verifierMpdTwo();
		boxPwd1.setAttribute("placeholder",
				"Le mot de passe doit faire entre 8 et 256 char...");
	}
	return ok;
}

function verifierMpdTwo() {
  if((boxPwd1.value === boxPwd2.value) && (monUser.checkPwd(boxPwd1.value))){
    boxPwd2.className = classPwd2 + " " + "goodvalue";
    return true;
  } else {
    boxPwd2.className = classPwd2 + " " + "badvalue";
		boxPwd2.setAttribute("placeholder",
				"Les mots de passe ne correspondent pas...");
    return false;
  }
}
