<?php

class City extends NamedObject
{
    
    const DEFAULT_CODE = "00000";
 
    // attributs
    // le nom et l'ID herite de la classe NameObject
    private $City_code;
    
    private $City_zipCode;

    private $City_country;

    public function __construct(
        int $City_ID = self::DEFAULT_ID,
        string $City_name = self::DEFAULT_STRING,
        string $City_country = self::DEFAULT_STRING,
        int $City_code = self::DEFAULT_CODE,
        int $City_zipCode = self::DEFAULT_CODE)
    {
        // appel du constructeur parent
        parent::__construct($City_ID, $City_name);
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setCityCode($City_code);
        $this->setCityZipCode($City_zipCodeode);
        $this->setCityCountry($City_country);
    }
    
    /**
     * *********************
     * Getters & Setters
     * ********************
     */
    
    public function setCityCode(string $City_code): void
    {
        $this->City_code = $City_code ?? self::DEFAULT_CODE;
    }
    
    public function getCityCode(): string
    {
        return $this->City_code;
    }
    
    public function setCityZipCode(string $City_zipCode): void
    {
        $this->City_zipCode = $City_zipCode ?? self::DEFAULT_CODE;
    }
    
    public function getCityZipCode(): string
    {
        return $this->City_zipCode;
    }
    
    public function setCityCountry($City_country) 
    {
        $this->City_country = $City_country ?? self::DEFAULT_CODE;
    }
    
    public function getCityCountry(): string
    {
        return $this->City_country ;
    }
}

?>