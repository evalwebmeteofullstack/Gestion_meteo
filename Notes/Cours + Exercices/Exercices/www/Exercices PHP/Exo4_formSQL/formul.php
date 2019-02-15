<?php
  $interet;
  $maRequete = 'insert into Matable values(';

  //récupération du nom et de l'age
  //$maRequete .= "'$_GET["nom"]',";

  $maRequete .= "'".$_GET["nom"]."',".$_GET["age"].",'".$_GET["situation"]."',";

  if (isset($_GET["internet"])){
    $maRequete .= "1,";
    $interet = "Internet";
  }
  else {
    $maRequete .= "0,";
  }
  if (isset($_GET["micro"])){
    $maRequete .= "1,";
    $interet = "Micro-informatique";
  }
  else {
    $maRequete .= "0,";
  }
  if (isset($_GET["jv"])){
    $maRequete .= "1)";
    $interet = "Jeux Vidéo";
  }
  else {
    $maRequete .= "0)";
  }

  echo $maRequete;
  echo '<h1>C\'est vide ta race</h1>';
?>
