<?php

class User extends NamedObject
{
    private $firstName;
    
    private $email;
    
    private $password;

    private $city;

    public function __construct(
        int $id = self::DEFAULT_ID, 
        string $lastName = self::DEFAULT_STRING, 
        string $firstName = self::DEFAULT_STRING,
        string $email = self::DEFAULT_STRING,
        string $password = self::DEFAULT_STRING, 
        City $city = null)
    {
        // en 1er on appel le constructeur du PARENT
        parent::__construct($id, $lastName);
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setFirstName($firstName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setCity(new City());
    }
    
    public function __toString(){
        return 'Je suis créé avec l\'id : ' . $this->getId() . ' id de ma ville est : ' . $this->city->getId();
    }
    
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName ?? self::DEFAULT_STRING;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string 
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email ?? self::DEFAULT_STRING;
    }
    
    /**
     * @return mixed
     */
    public function getPassword(): string 
    {
        return $this->password;
    }
    
    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password ?? self::DEFAULT_STRING;
    }
    
    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }
    
    /**
     * @param City $city
     */
    public function setCity(City $city = null)
    {
        $this->city = $city ?? null;
    }
    
}

?>