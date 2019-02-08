document.getElementById("btnSend").addEventListener("click", sendInfos);

alert(navigator.appCodeName);

function sendInfos(){
var nombre = document.getElementById("ZtxtN").value; 
var texte = document.getElementById("ZtxtT").value;

sessionStorage.setItem("nombre", nombre);
sessionStorage.setItem("texte", texte);

location.href='7embis-code.html?';

}

/*
document.getElementById("btnSend").addEventListener("click", sendInfos);

nombre = document.getElementById("ZtxtN");
texte = document.getElementById("ZtxtT");

function sendInfos(){
	var nb = nombre.value;
	var txt = texte.value;
	var adresse = '7embis-code.html?'+'='+nombre.name+'='+nb+'&'+texte.name+'='+txt;
	location.href=adresse;
}
*/