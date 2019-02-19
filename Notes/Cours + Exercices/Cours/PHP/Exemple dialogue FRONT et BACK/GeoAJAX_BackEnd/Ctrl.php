<?php
// On ne connait que les requ�tes contenant un attribut 'action'
if (!isset($_REQUEST['action'])) {
    echo 'BAD REQUEST';
} else {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'inscription':
            echo "\n";
            echo '*******Je suis l\'API Back-End*******';
            echo "\n";
            echo 'J\'ai reçu les informationS suivantes :';
            echo "\n";
            echo print_r($_REQUEST);
            echo "\n";
            echo '1- je vérifié en BDD si le mail est  déjà pris';
            echo "\n";
            echo '  1.1- si OUI je rejete la demande avec un : http_response_code(406) - Not Acceptable';
            echo "\n";
            echo '  1.1- si NON je passe à la suite';
            echo "\n";
            echo '2- je vérifie si la ville existe déjà en BDD';
            echo "\n";
            echo '  2.1- si OUI je fait +1 sur le nombre d\abonnés pour cette ville et récupère sa CLE PRIMAIRE';
            echo "\n";
            echo '  2.2- si NON je crée cette ville dans la BDD et récupère la CLE PRIMAIRE générée';
            echo "\n";
            echo '3- je créé le nouveau compte et je répond CREATED avec un : http_response_code(201) - CREATED';
            http_response_code(201);
            break;
        default:
            http_response_code(400);
            echo 'oui mais moi pas comprendre toi';
    }
}

?>