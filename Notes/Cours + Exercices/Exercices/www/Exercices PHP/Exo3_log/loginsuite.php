<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">

    <title>
      <?php
          if (!(isset($_SESSION["usrnom"])))
          {
            echo "Erreur login !";
            header("refresh:3;url=login.html");
          }
          else {
            echo "Au menu...";
          }
      ?>
    </title>
  </head>
  <body>
    <?php
    if (!(isset($_SESSION["usrnom"])))
    {
      echo 'Erreur login !';
    }
    else {
      echo '<h1>'.$_SESSION["usrnom"]." ".'est cool !!!'.'</h1>';
    }
    ?>
  </body>
</html>
