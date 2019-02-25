<?php
/* Prog Principal utilisant la classe User */ 
// fusion classe user 
require ('BackEnd/model/User.php');
require ('BackEnd/model/NamedObject.php');
// début de page HTML  
?> 
 
<!DOCTYPE html>  
<html> 
<meta charset="uth-8" />  
<head> 
<title>New Utilisateur</title> 
</head> 
<body> 
<?php  
// je creer un nouvel utilisateur 
$YannickFABRE = new User(
'yannick',
'fabre',
'test@free.fr',
'pwd123456',
'testpseudo'); 

echo $YannickFABRE; ///PB liaison avec USER
//exploitation objet 
var_dump($YannickFABRE); 

// fin de page HTML
?>
</body>

</html>

