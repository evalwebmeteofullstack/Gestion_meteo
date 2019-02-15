<?php
/**
* Classe voiture
* Ecrite par CousinCorbin - 13/02/19
*/
class voiture
{
  //CONSTANTE
  const DEFAULT_FUEL= 5.0;
  const DEFAULT_ASSURE= false;
  const DEFAULT_MESSAGE= "Je suis une voiture neuve";

  //ATTRIBUTS
  private $_immatriculation; //String
  private $_couleur; //String
  private $_poids; //int
  private $_puissance; //int
  private $_capacite_reservoir; //float
  private $_niveau_essence; //float
  private $_nombre_places; //int
  private $_assure; //bool
  private $_message; //String

  //CONSTRUCTEUR DE LA CLASSE COURANTE
  public function __construct($immat, $color, $weight, $power, $fuelCapa, $seat){

    $this->_immatriculation = $immat;
    $this->_couleur = $color;
    $this->_poids = $weight;
    $this->_puissance = $power;
    $this->_capacite_reservoir = $fuelCapa;
    $this->_nombre_places = $seat;
    $this->_niveau_essence = self::DEFAULT_FUEL;
    $this->_assure = self::DEFAULT_ASSURE;
    $this->_message = self::DEFAULT_MESSAGE;

  }

  //LES ACCESSEURS

  //GETTERS
  public function getImmat(){
    return $this->_immatriculation;
  }

  public function getCouleur(){
    return $this->_couleur;
  }

  public function getPoid(){
    return $this->_poids;
  }

  public function getPuissance(){
    return $this->_puissance;
  }

  public function getCapa(){
    return $this->_capacite_reservoir;
  }

  public function getNbplace(){
    return $this->_nombre_places;
  }

  public function getNiveaufuel(){
    return $this->_niveau_essence;
  }

  public function getAssure(){
    return $this->_assure;
  }

  public function getMessage(){
    return $this->_message;
  }

  //SETTERS
  public function _setAssure($vraiOuFaux){
    $this->_assure = $vraiOuFaux;

    if ($this->_assure)
      $this->_message = "Merci de m'avoir assurée !!!";
    else
      $this->_message = "Attention !! Je ne suis pas assurée !!!";
  }

  //METHODES PUBLICS
  //Le $nvlcouleur = null est un parametre par défault si aucune
  //Paramètre n'est pas defini.
  public function repeindre($nvlcouleur = null) : bool{
    if (isset($nvlcouleur)){
      if ($this->_couleur==$nvlcouleur){
        $this->_message = "C'est déjà ma couleur mais merci pour ce rafraichissement :) !!!";
      }
      else {
        $this->_couleur = $nvlcouleur;
        $this->_message = "Merci pour cette nouvelle couleur ".$nvlcouleur." :) !!!";
      }
      return true;
    }
    else {
      $this->_message = "Vous ne m'avez pas renseigné de couleur";
      return false;
    }
  }

  public function __toString(){
    $msg= 'Véhicule %s; puissance %d cv; couleur %s';
    return sprintf($msg, $this->_immatriculation, $this->_puissance, $this->_couleur);
  }




}

?>
