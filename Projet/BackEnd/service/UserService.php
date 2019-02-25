<?php

/**
 * @desc Classe statique pour gérér les échanges avec la base de
 * donnée MySQL météo.
 */

class userService {
    
    public static function createNewAccount(User $user) {
        $connection = TP_METEO_PDO::Connect_PDO();
        try {
            $connection->beginTransaction();
            // inserer le nouvel utilisteur
            $sql =
            'INSERT INTO user (User_firstName,User_name,User_pseudo,User_password,User_email)
                    VALUES (:fname, :name,:pseudo,:pwd,:email)';
            $rs = $connection->prepare($sql);
            
            $tmpName = $user->getName();
            $rs->bindParam(':fname', $tmpName);
            
            $tmpFname = $user->getFirstName();
            $rs->bindParam(':name', $tmpFname);
            
            $tmpPseudo = $user->getPseudo();
            $rs->bindParam(':pseudo', $tmpFname);
            
            $tmpEmail = $user->getEmail();
            $rs->bindParam(':email', $tmpEmail);
            
            $tmpPass = PasswordUtil::hash($user->getPassword());
            $rs->bindParam(':pwd', $tmpPass);
            
            $rs->execute();
            // recuperer la clé primaire générée par cette insertion
            $id_newuser = $connection->lastInsertId();
            $user->setUserID(intval($id_newuser));
            
            // insérer dans la table d'association villes_utilisateurs les deux ID récupérés :
            // l'id de l'utilisateur fraichement créé
            $rs = $connection->prepare($sql);
            
            $rs->bindParam(':User_ID', $id_newuser);
            $rs->execute();
            
            $connection->commit();
        } catch (PDOException $e) {
            $connection->rollBack();
            throw $e;
        } finally {
            myPDO::Disconnect_PDO($rs, $connection);
        }
    }
    
    public static function checkIfEmailAlreadyExists($User_email){
        $connection = myPDO::Connect_PDO();
        $sql = 'SELECT * FROM user WHERE email = :email;';
        $rs = $connection->prepare($sql);
        $rs->bindParam(':email', $User_email);
        $rs->execute();        
        if ($rs->rowCount()==0) {// est-ce que des résultats ont été trouvés ?
            return false; // NON : cet email $email n'existe pas dans la BDD
        } else {
            return true; //  OUI : cet email $email existe bien dans la BDD
        }

    }
    
}