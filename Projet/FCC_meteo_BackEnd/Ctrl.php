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
require 'model/NamedObject.php';
require 'model/City.php';
require 'model/User.php';
require 'model/mdp.php';

//On accepte que les quetes avec un contenue "action"
if (!isset($_REQUEST['action'])) {
    echo 'BAD REQUEST';
}
else {
  //On récupère le contenue de action dans une variable
  $action = $_REQUEST['action'];
  switch ($action) {
    case 'inscription':
      http_response_code(201);
      echo 'Compte utilisateur créé avec succès !';
      break;

    default:
      http_response_code(400);
      echo 'Aucune requete connue coté BACKEND';
      break;
  }
}

 ?>
