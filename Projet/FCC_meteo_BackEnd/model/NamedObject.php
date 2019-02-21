<?php
//Classe mere
abstract class NamedObject {

  //*********************************************
  //CONSTANTES
  //*********************************************
  const DEFAULT_ID = -1;
  const DEFAULT_STRING = 'A DEFINIR';

  //*********************************************
  //ATTRIBUTS
  //*********************************************
  private $_id;
  private $_name;

  //*********************************************
  //CONSTRUCTEUR
  //*********************************************
  protected function __construct(int $id = self::DEFAULT_ID, string $name = self::DEFAULT_STRING){
    //On set les valeurs par default à l'appel du constructeur.
    $this->setId($id);
    $this->setName($name);
  }

  //*********************************************
  //ACCESSEURS
  //*********************************************
  public function setId(int $id): void{
    $this->_id = $id ?? self::DEFAULT_ID;
  }

  public function getId(): int{
    return $this->_id;
  }

  public function setName(string $name): void{
    $this->_name = $name ?? self::DEFAULT_STRING;
  }

  public function getName(): string{
    return $this->_name;
  }
}
?>
