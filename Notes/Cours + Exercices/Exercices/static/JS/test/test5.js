document.getElementById("butAf").onclick = function() {
	afficheDiv()
};

document.getElementById("butCach").onclick = function() {
	cachDiv()
};

document.getElementById("label1").onmouseover = function() {
	afficheOver()
};

document.getElementById("label1").onmouseout = function() {
	cachDiv()
};


function afficheDiv() {
	document.getElementById("postIt").style.visibility = "visible";
	document.getElementById("postIt").innerHTML = "Vous avez cliqué sur le bouton 'Affiche'";
}

function cachDiv(){
	document.getElementById("postIt").style.visibility = "hidden";
}

function afficheOver() {
	document.getElementById("postIt").style.visibility = "visible";
	document.getElementById("postIt").innerHTML = "C'est gentil de me survoler";
}

