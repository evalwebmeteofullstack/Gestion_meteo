<?php
abstract class NamedObject {
    
    const DEFAULT_ID = -1;
    
    const DEFAULT_STRING = 'A DEFINIR';
    
    private $ID;
    
    private $name;
    
    /**
     * 
     * @param int $ID
     * @param string $name
     */
    protected function __construct(
        int $ID = self::DEFAULT_ID,
        string $name = self::DEFAULT_STRING) 
    {
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setId($ID);
        $this->setName($name);
    }
    
    /**
     * 
     * @param int $ID
     */
    public function setUserID(int $ID): void {
        $this->ID = $ID ?? self::DEFAULT_ID;
    }
    
    /**
     * 
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }
    
    /**
     * 
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
    
    /**
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name ?? self::DEFAULT_STRING;
    }
}
?>