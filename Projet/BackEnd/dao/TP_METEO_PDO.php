<?php

class myPDO
{
    const DB_NAME = 'tp_meteo';
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const PORT = '3306';

    /**
     * fonction de connexion à notre base de données
     *
     * @throws PDOException en cas d'échec de connexion à la BDD
     * @return PDO : la connexion PDO établie à la BDD
     */
    public static function Connect_PDO()
    {
        $dns = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME . ';port="' . self::PORT;
        try {
            $connection = new PDO($dns, self::USER, self::PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // permet d'éviter l'erreur d'encodage UTF-8 au passage en JSON
            $connection->query("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            throw $e;
        } finally {
            /*
             * on peux par exemple faire un fichier avec les détails
             * de la connexion comme la date et l'heure
             */
        }
        return $connection;
    }
    
    /**
     * fonction de déconnexion de notre base de données
     * 
     * @param PDO : $PDO connexion PDO à la BDD à déconnecter
     * @param PDOStatement : $res à clôturer 
     */
    public static function Disconnect_PDO($res, $PDO)
    {
        $res->closeCursor();
        unset($PDO);
    }
}