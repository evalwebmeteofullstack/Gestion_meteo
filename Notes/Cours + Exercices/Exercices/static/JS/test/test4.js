document.getElementById("monBut").onclick = function() {
	maFonction()
};

function maFonction() {
	var etat;
	if (document.getElementById("radSem").checked) {
		etat = document.getElementById("radSem").value; 
		document.getElementById("Ztxt").value = etat;
	}
	if (document.getElementById("radWE").checked) {
		etat = document.getElementById("radWE").value;
		document.getElementById("Ztxt").value = etat;
	}

}