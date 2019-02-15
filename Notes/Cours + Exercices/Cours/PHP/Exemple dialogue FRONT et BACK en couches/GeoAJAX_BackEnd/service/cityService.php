<?php

/**
 * @desc Classe statique pour gérér les échanges avec la base de
 * donnée MySQL météo.
 * @author Haydar BONAUD - AFPA Balam
 *
 */

class cityService {
    
    public static function getTopSearchedCities() {
        try {
            $connection = myPDO::Connect_PDO();
            $sql = 'SELECT * FROM villes ORDER BY HITCOUNT DESC;';
            $rs = $connection->prepare($sql);
            $rs->execute();
            $data = $rs->fetchAll(PDO::FETCH_ASSOC);
            myPDO::Disconnect_PDO($rs, $connection);
        } catch (Exception $e) {
            // @TODO : gestion de la remonté de l'erreur de connexion PDO
        }
        return $data;
    }
    
    public static function createNewCity(City $city) {
        try {
            $connection = myPDO::Connect_PDO();
            $sql = 'INSERT INTO villes (NOM, CODE) VALUES (:nomVille, :codeVille)';
            $rs = $connection->prepare($sql);
            
            $tmpName = $city->getName();
            $rs->bindParam(':nomVille', $tmpName);
            
            $tmpCode = $city->getCode();
            $rs->bindParam(':codeVille', $tmpCode);
            $rs->execute();
            $id_city = $connection->lastInsertId();
            myPDO::Disconnect_PDO($rs, $connection);
        } catch (Exception $e) {
            // @TODO : gestion de la remonté de l'erreur de connexion PDO
        }
        return intval($id_city);
    }
    
    public static function checkIfCityAlreadyExists(City $city){
        $connection = myPDO::Connect_PDO();
        $sql = 'SELECT * FROM villes WHERE code = :codeVille;';
        $rs = $connection->prepare($sql);
        
        $tmpCode = $city->getCode();
        $rs->bindParam(':codeVille', $tmpCode);
        $rs->execute();
        
        if ($rs->rowCount()==0) {// est-ce que des résultats ont été trouvés ?
            return false; // NON : ce code postal n'existe pas dans la BDD
        } else {
            return true; //  OUI : cet code postal existe bien dans la BDD
        }
        
        //return !($rs->rowCount()==0);
    }
    
    public static function getCityIdByZipCode(City $city){
        $connection = myPDO::Connect_PDO();
        $sql = 'SELECT id FROM villes WHERE code = :codeVille;';
        $rs = $connection->prepare($sql);
        
        $tmpCode = $city->getCode();
        $rs->bindParam(':codeVille', $tmpCode);
        $rs->execute();
        $response = $rs->fetch();
        $id_city = $response['id'];
        myPDO::Disconnect_PDO($rs, $connection);
        return intval($id_city);
    }
    
    public static function updateCityHitCount($nomVille) {
        try {
            $connection = myPDO::Connect_PDO();
            $sql = 'UPDATE villes SET hitcount = hitcount+1 WHERE name = :nomVille;';
            $rs = $connection->prepare($sql);
            $rs->bindParam(':nomVille', $nomVille);
            $rs->execute();
            myPDO::Disconnect_PDO($rs, $connection);
        } catch (Exception $e) {
            // @TODO : gestion de la remonté de l'erreur de connexion PDO
        }
    }
    
}