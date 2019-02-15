<?php

/**
 * @desc Classe statique pour gérér les échanges avec la base de
 * donnée MySQL météo.
 * @author Haydar BONAUD - AFPA Balam
 *
 */

class userService {
    
    public static function createNewAccount(User $user) {
        $connection = myPDO::Connect_PDO();
        try {
            $connection->beginTransaction();
            // inserer le nouvel utilisteur
            $sql =
            'INSERT INTO utilisateurs (NOM, PRENOM, EMAIL, PASSWORD)
                    VALUES (:lname, :fname, :email, :pwd)';
            $rs = $connection->prepare($sql);
            
            $tmpName = $user->getName();
            $rs->bindParam(':lname', $tmpName);
            
            $tmpFname = $user->getFirstName();
            $rs->bindParam(':fname', $tmpFname);
            
            $tmpEmail = $user->getEmail();
            $rs->bindParam(':email', $tmpEmail);
            
            $tmpPass = PasswordUtil::hash($user->getPassword());
            $rs->bindParam(':pwd', $tmpPass);
            
            $rs->execute();
            // recuperer la clé primaire générée par cette insertion
            $id_newuser = $connection->lastInsertId();
            $user->setId(intval($id_newuser));
            
            // insérer dans la table d'association villes_utilisateurs les deux ID récupérés :
            // l'id de l'utilisateur fraichement créé
            // l'id de la ville de l'utilisateur
            $id_city = $user->getCity()->getId();
            $sql = 'INSERT INTO villes_utilisateurs (id_utilisateur, id_ville)
                        VALUES (:idUser, :idCity)';
            $rs = $connection->prepare($sql);
            
            $rs->bindParam(':idUser', $id_newuser);
            $rs->bindParam(':idCity', $id_city);
            $rs->execute();
            
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        } finally {
            myPDO::Disconnect_PDO($rs, $connection);
        }
    }
    
    public static function checkIfEmailAlreadyExists($email){
        $connection = myPDO::Connect_PDO();
        $sql = 'SELECT * FROM utilisateurs WHERE email = :email;';
        $rs = $connection->prepare($sql);
        $rs->bindParam(':email', $email);
        $rs->execute();        
        if ($rs->rowCount()==0) {// est-ce que des résultats ont été trouvés ?
            return false; // NON : cet email $email n'existe pas dans la BDD
        } else {
            return true; //  OUI : cet email $email existe bien dans la BDD
        }
        
        //return !($rs->rowCount()==0);
    }
    
}