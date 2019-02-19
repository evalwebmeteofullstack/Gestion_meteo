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

require 'dao/myPDO.php';
require 'model/NamedObject.php';
require 'model/City.php';
require 'model/User.php';
require 'model/mdp.php';
require 'service/userService.php';
require 'service/cityService.php';

// On ne connait que les requêtes contenant un attribut 'action'
if (!isset($_REQUEST['action'])) {
    echo 'BAD REQUEST';
} else {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'inscription':
            // instantiation d'un USER
            $user = new User();
            // instantiation d'une CITY
            $city = new City();
            // Alimentation de l'objet User
            $user->setName($_REQUEST['lastname']);
            $user->setFirstName($_REQUEST['firstname']);
            $user->setEmail($_REQUEST['email']);
            $user->setPassword($_REQUEST['pwd']);
            
            $city->setCode($_REQUEST['zipcode']);
            $city->setName($_REQUEST['cityname']);
            
            $user->setCity($city);
            
            try {
                if (cityService::checkIfCityAlreadyExists($city)) {
                    $user->getCity()->setId(cityService::getCityIdByZipCode($city));
                } else {
                    $user->getCity()->setId(cityService::createNewCity($city));
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            try {
                userService::createNewAccount($user);
                echo 'Compte utilisateur créé avec succès ! il nous dit >> ' . $user;
                unset($user);
                unset($city);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            http_response_code(201);
            break;
        case 'verifmail':
            $tmp = userService::checkIfEmailAlreadyExists($_REQUEST['email']);
            if ($tmp == true) {
                http_response_code(400);
            } else {
                http_response_code(200);
            }
            break;
        default:
            http_response_code(400);
            echo 'oui mais moi pas comprendre toi';
    }
}

?>