<?php
//Classe fille qui hérite de NamedObject
class City extends NamedObject{
  //*********************************************
  //CONSTANTES
  //*********************************************
  const DEFAULT_HITCOUNT = 0;
  const DEFAULT_CODE = "00000";

  //*********************************************
  //ATTRIBUTS
  //*********************************************
  private $_code;
  private $_hitCount;

  //*********************************************
  //CONSTRUCTEUR
  //********************************************
  public function __construct(
    int $id = self::DEFAULT_ID,
    string $name = self::DEFAULT_STRING,
    string $code = self::DEFAULT_CODE,
    int $hitcount = self::DEFAULT_HITCOUNT)
    {
      // Appel du constructeur parent
      parent::__construct($id, $name);
      // initialisation des attributs avec les paramètres d'entrée du constructeur
      $this->setHitcount($hitcount);
      $this->setCode($code);
    }

    //*********************************************
    //ACCESSEURS
    //*********************************************
    public function setCode(string $code): void
    {
      $this->_code = $code ?? self::DEFAULT_CODE;
    }

    public function getCode(): string
    {
      return $this->_code;
    }

    public function setHitcount(int $hitCount): void
    {
      $this->_hitCount = $hitCount ?? self::DEFAULT_HITCOUNT;
    }

    public function getHitcount(): int
    {
      return $this->_hitCount;
    }
  }

  ?>
