<?php

class User extends NamedObject
{

    // attributs
    // le nom et l'ID herite de la classe NameObject
    private $User_firstName;

    private $User_email;

    private $User_password;

    private $User_pseudo;

    // constructeur
    public function __construct(int $User_ID = self::DEFAULT_ID, string $User_name = self::DEFAULT_STRING, string $User_firstName = self::DEFAULT_STRING, string $User_email = self::DEFAULT_STRING, string $User_password = self::DEFAULT_STRING, string $User_pseudo = self::DEFAULT_STRING)
    {
        // en 1er on appel le constructeur du PARENT
        parent::__construct($User_ID, $User_name);
        // initialisation des attributs avec les paramètres d'entrée du constructeur
        $this->setUserFirstName($User_firstName);
        $this->setUserEmail($User_email);
        $this->setUserPassword($User_password);
        $this->setUserPseudo($User_pseudo);
    }

    public function __toString()
    {
        return 'Je suis créé avec l\'id : ' . $this->getId();
    }

    /**
     * *********************
     * Getters & Setters
     * ********************
     */

    /**
     * First Name - return string
     */
    public function getUserFirstName(): string
    {
        return $this->User_firstName;
    }

    /**
     * First Name - @param string $User_firstName
     */
    public function setUserFirstName(string $User_firstName): void
    {
        $this->User_firstName = $User_firstName ?? self::DEFAULT_STRING;
    }

    /**
     *
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->UserEmail;
    }

    /**
     *
     * @param string $email
     */
    public function setUserEmail(string $email): void
    {
        $this->UserEmail = $UserEmail ?? self::DEFAULT_STRING;
    }

    /**
     *
     * @return mixed
     */
    public function getUserPassword(): string
    {
        return $this->User_password;
    }

    /**
     *
     * @param string $User_password
     */
    public function setUserPassword(string $User_password): void
    {
        $this->password = $User_password ?? self::DEFAULT_STRING;
    }

    /**
     * Pseudo - return string
     */
    public function getUserPseudo(): string
    {
        return $this->User_pseudo;
    }

    /**
     * Pseudo - @param string $User_firstName
     */
    public function setUserPseudo(string $User_Pseudo): void
    {
        $this->User_Pseudo = $User_Pseudo ?? self::DEFAULT_STRING;
    }
}

?>
