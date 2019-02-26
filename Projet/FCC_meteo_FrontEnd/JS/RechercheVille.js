document.getElementById("ville").addEventListener("input", myFunction);
document.getElementById("butChxVille").addEventListener("click", getMeteoVille);

function myFunction() {
  var input = document.getElementById("ville");
  var text = input.value;
  chargerVilles(text);
}

function chargerVilles(recherche) {
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
  maRequete.open("GET", "https://geo.api.gouv.fr/communes?nom="+recherche+"&fields=departement&boost=population", true);
  maRequete.send();
}



function afficherVilles(rep) {
  var lstVilles = JSON.parse(rep);
  var maDivVilles = document.getElementById("contentResultCity");
  var option = '';

  while (maDivVilles.firstChild) {
    maDivVilles.removeChild(maDivVilles.firstChild);
  }
  if (lstVilles.length === 0) {
    maDivVilles.innerHTML = option;
  }
  else{
    var i = 0;
    while ((i < lstVilles.length)&&(i < 7)) {
      //On récupère une ville
      var maVille = lstVilles[i];
      //On créé une simple div
      var element = document.createElement("div");
      //On ajoute du texte à l'intérieur concaténé à la ville
      element.appendChild(document.createTextNode(maVille.nom+"-"+maVille.departement.code));
      //On ajoute un ID qui s'incrémente
      element.setAttribute("id", "div"+[i]);
      //On insère cette div dans la div parent
      maDivVilles.appendChild(element);
      //On récupère l'id de cette div fille
      var monId = element.getAttribute("id");
      //On envoi en paramètre l'id de cette div à la fonction.
      getVilleFromDiv(monId);
      i++;
    }
  }
}

function getVilleFromDiv(id){
  //On récupère une div avec son ID
  var maSelect = document.getElementById(id);
  //On ajoute un evenement click sur cette div
  maSelect.addEventListener("click", function(){
    //On récupère son texte.
    var valuSelect = maSelect.innerHTML
    //On valorise la value de la textBox avec le texte de la div.
    document.getElementById("ville").value = valuSelect;
  });
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
	var elem = document.getElementById("ville");
	var ville = elem.value;

	maRequete.open("GET", "https://www.prevision-meteo.ch/services/json/" + ville, true);
	maRequete.send();
}


function afficherImageMeteo(repServ) {
	meteoVille = JSON.parse(repServ);
	document.getElementById("imgSun1").style.backgroundImage = "url('" + meteoVille.fcst_day_0.icon + "')";
	document.getElementById("tempTest").innerHTML = meteoVille.fcst_day_0.tmin;
	document.getElementById("ventTest").innerHTML = meteoVille.fcst_day_0.tmax;
  document.getElementById("divRech").style.display = 'flex';
  document.getElementById("divTitre").style.display = 'flex';
  document.getElementById("divSem").style.display = 'flex';
}
