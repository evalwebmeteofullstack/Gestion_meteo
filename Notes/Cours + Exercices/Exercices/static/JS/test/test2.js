var nomExterne = "Hein ";
function portee(nom) {
var prenom = "Terieur ";
nomGlobale = "Halle ";
console.log(window.nomGlobale + nom + prenom);
console.log(nomGlobale + nomExterne + prenom);
console.log(nomExterne);
}
portee("Ex ");
console.log(nomExterne);// provoque une erreur