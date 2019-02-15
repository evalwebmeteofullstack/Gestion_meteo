<?php

class City extends NamedObject
{
    
    const DEFAULT_HITCOUNT = 0;
    const DEFAULT_CODE = "00000";
    
    private $code;

    private $hitcount;

    public function __construct(
        int $id = self::DEFAULT_ID,
        string $name = self::DEFAULT_STRING,
        string $code = self::DEFAULT_CODE,
        int $hitcount = self::DEFAULT_HITCOUNT)
    {
        // appel du constructeur parent
        parent::__construct($id, $name);
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setHitcount($hitcount);
        $this->setCode($code);
    }
    
    public function setCode(string $code): void
    {
        // avant PHP 7 on aurait écrit:
        //$this->code = (isset($code) ? $code : self::DEFAULT_CODE);
        // en php 7 ca va plus vite : (https://wiki.php.net/rfc/isset_ternary)
        $this->code = $code ?? self::DEFAULT_CODE;
    }
    
    public function getCode(): string
    {
        return $this->code;
    }
    
    public function setHitcount(int $hitcount): void
    {
        // avant PHP 7 on aurait écrit:
        //$this->hitcount = (isset(hitcount) ? hitcount : self::DEFAULT_HITCOUNT);
        // en php 7 ca va plus vite : (https://wiki.php.net/rfc/isset_ternary)
        $this->hitcount = $hitcount ?? self::DEFAULT_HITCOUNT;
    }
    
    public function getHitcount(): int
    {
        return $this->hitcount;
    }
}

?>