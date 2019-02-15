<?php
abstract class NamedObject {
    
    const DEFAULT_ID = -1;
    
    const DEFAULT_STRING = 'A DEFINIR';
    
    private $id;
    
    private $name;
    
    /**
     * 
     * @param int $id
     * @param string $name
     */
    protected function __construct(
        int $id = self::DEFAULT_ID,
        string $name = self::DEFAULT_STRING) 
    {
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setId($id);
        $this->setName($name);
    }
    
    /**
     * 
     * @param int $id
     */
    public function setId(int $id): void {
        //$this->id = $id;
        // avant PHP 7 on aurait écrit:
        //$this->id = (isset($id) ? $id : self::DEFAULT_ID);
        // en php 7 ca va plus vite : (https://wiki.php.net/rfc/isset_ternary)
        $this->id = $id ?? self::DEFAULT_ID;
    }
    
    /**
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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