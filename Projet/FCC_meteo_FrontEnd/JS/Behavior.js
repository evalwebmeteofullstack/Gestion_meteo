var page;
var pageX;

(function() {
  hideAll();
  document.getElementById("divRech").style.display = 'flex';
  page = 0;
  comportement();
  page0 = true;
})();

function hideAll() {
  document.getElementById("divRech").style.display = 'none';
  document.getElementById("divLog").style.display = 'none';
  document.getElementById("return").style.visibility = 'hidden';
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
  document.getElementById("test").addEventListener("click", detailJour);

}

function returnP1() {
  hideAll();
  if (page === 0){
    document.getElementById("divRech").style.display = 'flex';
  }
  if (page === 1){
    recherche();
  }
  if (page === 2){
    recherche();
  }
  if (page === 3 || page === 4){
    detailJour();
  }
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

function recherche() {
  hideAll();
  document.getElementById("divRech").style.display = 'flex';
  document.getElementById("divTitre").style.display = 'flex';
  document.getElementById("divSem").style.display = 'flex';
  page = 1;
}

function connex1() {
  hideAll();
  document.getElementById("return").style.visibility = 'visible';
  document.getElementById("divConnex").style.display = 'flex';
  if (page === 2 || page === 4){
    page = 3;
  }
}

function inscr1() {
  hideAll();
  document.getElementById("return").style.visibility = 'visible';
  document.getElementById("divInscri").style.display = 'flex';
  if (page === 2 || page === 3){
    page = 4;
  }
}

function detailJour() {
  hideAll();
  document.getElementById("return").style.visibility = 'visible';
  document.getElementById("divTitre").style.display = 'flex';
  document.getElementById("divHeure").style.display = 'flex';
  page = 2;

}
