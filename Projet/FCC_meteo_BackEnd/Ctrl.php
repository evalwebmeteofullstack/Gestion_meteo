<?php
/**
* activation du mode "typage strict"
* dans ce mode, seule une variable du type exact correspondant
* au type attendu dans la déclaration sera acceptée sinon une
* exception du type TypeError sera levée.
* La seule exception à cette règle est qu'un entier (integer)
* peut être passé à une fonction attendant un nombre flottant
* (float). Les appels aux fonctions depuis des fonctions internes
* ne seront pas affectés par la déclaration strict_types.
*/
declare(strict_types = 1);

header("access-control-allow-origin: *");

//Include des fichiers à utiliser.
//Objet classe mere
require 'model/NamedObject.php';
//Objet classe fille
require 'model/City.php';
//Objet classe fille
require 'model/User.php';
require 'model/mdp.php';
//Fichier avec methodes de service static.
require 'service/userService.php';
//Fichier qui permet de se connecter à la base de donnée
require 'dao/myPDO.php';

//On accepte que les quetes avec un contenue "action"
if (!isset($_REQUEST['action'])) {
  echo 'BAD REQUEST';
}
else {
  //On récupère le contenue de action dans une variable
  $action = $_REQUEST['action'];
  switch ($action) {
    case 'inscription':
    //Instance d'un User
    $user = new User();
    //Alimentation de l'objet User
    $user->setName($_REQUEST['pseudo']);
    $user->setEmail($_REQUEST['email']);
    $user->setPassword($_REQUEST['pwd']);

    try {
      userService::createNewAccount($user);
      echo 'Compte utilisateur créé avec succès ! il nous dit >> ' . $user;
      unset($user);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    http_response_code(201);
    break;

    default:
    http_response_code(400);
    echo 'Aucune requete connue en BACKEND';
    break;
  }
}

?>
