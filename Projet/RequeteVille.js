/*(function() {
  // On charge la liste des département en 1er pour fluidifier la navigation
  chargerVilles();*/

  // neutralisation de comportement par défaut de la soumission du formulaire
  // (utilisation de la variable 'form' pour limiter la répétition du code)
  // 'DRY' Don't Repeat Yourself
  // 'KISS' Keep It Simple & Stupid
  /*var monForm = document.getElementById("monInscription");
  monForm.addEventListener("submit", function(event) {
  event.preventDefault()
});*/

/*})();*/
/*
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
}*/
function myFunction() {
  var text = document.getElementById("ville").value;
  chargerVilles(text);
}

function chargerVilles(search) {
  var maRequete = new XMLHttpRequest();
  maRequete.onreadystatechange = function() {
    if (this.readyState === 4) {
      if (this.status === 200) {
        console.log("reponse reçue :) ")
        afficherVilles(this.responseText);
      } else {
        console.log(this.status + " oops !")
      }
    } else {
      console.log(this.readyState + " --> j'en suis là ! ")
    }
  }
  maRequete.open("GET", "https://geo.api.gouv.fr/communes?nom="+search+"&fields=departement&boost=population", true);
  maRequete.send();
}

function afficherVilles(rep) {
  var lstDpt = JSON.parse(rep);
  /*lstDpt.sort(function(d1, d2) {
    return d1.code.localeCompare(d2.code);
  });*/

  var monSelect = document.getElementById("test");

  for (var i = 0; i < lstDpt.length; i++) {
    var monDpt = lstDpt[i];
    var monOption = document.createElement("option");
    monOption.text = monDpt.nom;
    monSelect.add(monOption, monSelect[i + 1]);
  }
}

/*
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
}*/
