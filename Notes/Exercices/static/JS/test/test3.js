function perimetre() {
var resultat = 0;
var nom = 0;
// test si au moins un paramètre reçu
if (arguments.length == 0) 
	{
		resultat = 0;
		nom = "Pas de forme ";
	}
else if (arguments.length == 1) 
	{
		resultat = 4*arguments[0];
		nom = "Carre ";// 1 param recu : carré
	}
else if (arguments.length == 2)
{
	resultat = (arguments[0] + arguments[1])*2;
	nom = "Rectangle ";// 2 param : rectangle
}
else if (arguments.length == 3)
{
	for (i in arguments) resultat += arguments[i];
	nom = "Triangle ";// 3 param : triangle
}
else {
	for (i in arguments) resultat += arguments[i];
	nom = "Polygone ";// polygone
}
console.log(nom+resultat);
}
perimetre(); // affiche 0
perimetre(5); // affiche 20
perimetre(9,6); // affiche 30
perimetre(9,6,5);
perimetre(3,7,20,8); // affiche 38