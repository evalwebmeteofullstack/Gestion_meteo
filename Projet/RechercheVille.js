document.getElementById("ville").addEventListener("input", myFunction);

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

  var option = '';
  var maDataLst = document.getElementById("cityname");

  if (lstVilles.length === 0) {
    maDataLst.innerHTML = option;
  }
  else{
    if (lstVilles.length < 7) {
      for (var i = 0; i < lstVilles.length; i++) {
        var maVille = lstVilles[i];
        option += '<option>'+maVille.departement.code+" - "+maVille.nom+'</option>';
        maDataLst.innerHTML = option;
      }
    }
    else {
      for (var i = 0; i < 7; i++) {
        var maVille = lstVilles[i];
        option += '<option>'+maVille.departement.code+" - "+maVille.nom+'</option>';
        maDataLst.innerHTML = option;
      }
    }
  }
}
