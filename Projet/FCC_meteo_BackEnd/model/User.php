<?php
//Classe fille qui hérite de NamedObject
class User extends NamedObject {

  //*********************************************
  //ATTRIBUTS
  //*********************************************
  private $_email;
  private $_password;
  private $_city;

  //*********************************************
  //CONSTRUCTEUR
  //*********************************************
  public function __construct(
    int $id = self::DEFAULT_ID,
    string $pseudo = self::DEFAULT_STRING,
    string $email = self::DEFAULT_STRING,
    string $password = self::DEFAULT_STRING,
    City $city = null)
    {
      // Appel du constructeur parent
      parent::__construct($id, $pseudo);
      // initialisation des attributs avec les paramètres d'entrée du constructeur
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setCity(new City());
    }

    //*********************************************
    //ACCESSEURS
    //*********************************************
    public function setEmail(string $email): void
    {
      $this->_email = $email ?? self::DEFAULT_STRING;
    }

    public function getEmail(): string
    {
      return $this->_email;
    }

    public function setPassword(string $password): void
    {
      $this->_password = $password ?? self::DEFAULT_STRING;
    }

    public function getPassword(): string
    {
      return $this->_password;
    }

    //Si $city n'est pas renseigné alors égale à null
    public function setCity(City $city = null): void
    {
      $this->_city = $city ?? null;
    }

    public function getCity(): City
    {
      return $this->_city;
    }

    //*********************************************
    //PUBLICS FONCTIONS
    //*********************************************
    public function __toString(){
      return 'Je suis créé avec l\'id : ' . $this->getId() . ' id de ma ville est : ' . $this->city->getId();
    }

  }

  ?>
