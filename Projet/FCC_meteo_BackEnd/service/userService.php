<?php
/**
* @desc Classe statique pour gérér les échanges avec la base de
*
*/
class userService {

  public static function createNewAccount(User $user){
    //Connexion à la base via le fichier myPDO
    $connection = myPDO::Connect_PDO();

    try {
      $connection->beginTransaction();

      //Insérer le nouvel utilisateur
      $sql =
      'INSERT INTO utilisateurs (PSEUDO, EMAIL, PASSWORD)
      VALUES (:pseudo, :email, :pwd)';
      $rs = $connection->prepare($sql);

      $tmpName = $user->getName();
      $rs->bindParam(':pseudo', $tmpName);

      $tmpEmail = $user->getEmail();
      $rs->bindParam(':email', $tmpEmail);

      $tmpPwd = $user->getPassword();
      $rs->bindParam(':pwd', $tmpPwd);

      $rs->execute();

      //On récupère la clé primaire de l'insertion
      $id_newuser = $connection->lastInsertId();
      //Intval = Retourne une valeur numérique d'une variable
      $user->setId(intval($id_newuser));
      $connection->commit();

    } catch (PDOException $e) {
      $connection->rollBack();
      throw $e;
    }finally {
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
?>
