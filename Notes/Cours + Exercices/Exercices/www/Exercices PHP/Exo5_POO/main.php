<?php
//Programme principal utilisant la classe voiture

//Fusion avec la classe voiture
require('voiture.php');

//Début de la page html
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Coucou</title>
</head>
<body>
  <?php
  //J'achete une renault sport F1
  $maRenaultF1 = new voiture('FCK 081 RBR', 'Jaune', 650, 1001, 40, 1);

  //Je regarde le tableau de bord
  echo $maRenaultF1->getMessage() .'<br/>';
  $maRenaultF1->_setAssure(true);
  echo $maRenaultF1->getMessage() .'<br/>';
  var_dump($maRenaultF1).'<br/>';
  $bool = $maRenaultF1->repeindre();
  echo $maRenaultF1->getMessage() .'<br/>';
  echo $bool ? '<h4>true</h4>' : '<h4>false</h4>';
  var_dump($maRenaultF1).'<br/>';
  echo $maRenaultF1;



  ?>
</body>
</html>
