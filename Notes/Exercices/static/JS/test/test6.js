document.getElementById("butCtrl").addEventListener("click", ctrltxt);

function ctrltxt() {
	var monTexte;
	if (document.getElementById("Ztxt").value.length === 0)
		{
			alert("Vous devez saisir une adresse mail");
		}
	else
		{
			monTexte = document.getElementById("Ztxt").value;
			alert("Vous avez saisi : " + monTexte);
			document.getElementById("form1").submit();
		}
 }
