function MyUser(){

  //*********************************************
  //CONSTANTES
  //*********************************************
  //Expression régulière concernant l'adresse mail
  const MAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  //Constante longueur mini et maxi num d'utilisateur
  const LPSEUDO_MIN_LENGTH = 1;
  const LPSEUDO_MAX_LENGTH = 256;
  //Constante longueur mini et maxi mot de passe.
  const PWD_MIN_LENGTH = 8;
  const PWD_MAX_LENGTH = 256;

  //*********************************************
  //PROPRIETES EXPOSEE
  //*********************************************
  this._pseudo = "";
  this._email = "";

  //*********************************************
  //ATTRIBUT PRIVE
  //*********************************************
  var _pwd = "";

  //*********************************************
  //METHODES DE CLASSES
  //*********************************************

  //Retourne true si la longueur du pseudo est respectée.
  this.checkPseudo = function(s) {
    return ((s.length >= LPSEUDO_MIN_LENGTH) && (s.length <= LPSEUDO_MAX_LENGTH));
  }

  //Retourne true si la longueur du password est respectée.
  this.checkPwd = function(s) {
		return ((s.length >= PWD_MIN_LENGTH) && (s.length <= PWD_MAX_LENGTH));
	}

  //vérifie s'il y a une correspondance entre un texte et une expression
  this.checkEmail = function(s) {
		return MAIL_REGEX.test(s);
	}

}
