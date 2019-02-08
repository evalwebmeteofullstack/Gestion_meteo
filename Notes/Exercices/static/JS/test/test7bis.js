var nombre = sessionStorage.getItem("nombre");
var texte = sessionStorage.getItem("texte");

document.getElementById("nbrR").innerHTML = nombre;
document.getElementById("txtR").innerHTML = texte;

/*(function (){
	var urla = window.location;
	var urlb = decodeURI(urla);
	var tabUrl = urlb.split(/=|&/);
	var Kone;
	var Ktwo;

	
	

	for (var i = 0; i<4; i++){
		if (tabUrl[i] === "nombre")
			Kone = tabUrl[i+1];
		if (tabUrl[i] === "texte")
			Ktwo = tabUrl[i+1];
	}

	document.getElementById("nbrR").innerHTML = Kone;
	document.getElementById("txtR").innerHTML = Ktwo;

}());
*/