<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <?php
  setlocale(LC_TIME, "fr");
  date_default_timezone_set ('Europe/Paris');
  $cetteJournee = getdate();
  $moisFr = utf8_encode(strftime('%B'));
  echo "<h1> En ce ".$cetteJournee['mday']." ".$moisFr." ".$cetteJournee['year'].", sur le serveur ".getenv("SERVER_NAME").", il est ".$cetteJournee['hours']."h".$cetteJournee['minutes'];

  //var_dump($cetteJournee);
  /*
  echo '<h1>Variable HTTP serveur (getenv())</h1>';
  echo '<table border="1">';
  echo '<tr>';
  echo '<td><b>Variable</b></td>';
  echo '<td><b>Valeur</b></td>';
  echo '<tr>';
  echo '<td>GATEWAY_INTERFACE</td>';
  echo '<td>'.getenv("GATEWAY_INTERFACE").'</td>';
  echo '</table>';
  */
  echo '<table border="1">';
  foreach ($_SERVER as $key => $value) {
    echo '<tr>';
    echo '<td>'.$key.'</td>';
    echo '<td>'.$value.'</td>';
    echo '<tr>';


  }
  echo '</table>';
  ?>

</body>
</html>
