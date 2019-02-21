(function() {
  hideAll();
  document.getElementById("divRech").style.display = 'flex';
  comportement();
})();

function hideAll() {
  document.getElementById("divRech").style.display = 'none';
  document.getElementById("divLog").style.display = 'none';
  document.getElementById("return").style.display = 'none';
  document.getElementById("divTitre").style.display = 'none';
  document.getElementById("divSem").style.display = 'none';
  document.getElementById("divFav").style.display = 'none';
  document.getElementById("divHeure").style.display = 'none';
  document.getElementById("divConnex").style.display = 'none';
  document.getElementById("divInscri").style.display = 'none';
}

function comportement() {
  document.getElementById("return").addEventListener("click", returnP1);
  document.getElementById("manUser").addEventListener("click", manUser1);
  document.getElementById("butCo").addEventListener("click", connex1);
  document.getElementById("butIns").addEventListener("click", inscr1);
  document.getElementById("butChxVille").addEventListener("click", recherche);
  document.getElementsByClassName("boxStyleDetail").addEventListener("click", detailJour);
}

function returnP1() {
  hideAll();
  document.getElementById("divRech").style.display = 'flex';
}

function recherche() {
  document.getElementById("divSem").style.display = 'flex';
}

function manUser1() {
  var off = document.getElementById("divLog").style.display === 'none';
  if (!off){
    document.getElementById("divLog").style.display = 'none';
  }
  else {
    document.getElementById("divLog").style.display = 'flex';
  }
}

function connex1() {
  hideAll();
  document.getElementById("return").style.display = 'flex';
  document.getElementById("divConnex").style.display = 'flex';
}

function inscr1() {
  hideAll();
  document.getElementById("return").style.display = 'flex';
  document.getElementById("divInscri").style.display = 'flex';
}

function detailJour() {
  hideAll();
  document.getElementById("divHeure").style.display = 'flex';
}
