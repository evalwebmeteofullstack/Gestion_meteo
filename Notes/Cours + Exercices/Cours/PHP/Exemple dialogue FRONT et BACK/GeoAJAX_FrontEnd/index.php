<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="CSS\styles.css" />
<link rel="stylesheet" type="text/css" href="CSS\small.css" media="screen and (max-width:500px)" />
<link rel="stylesheet" type="text/css" href="CSS\medium.css" media="screen and (min-width:501px) and (max-width:800px)" />
<link rel="stylesheet" type="text/css" href="CSS\large.css" media="screen and (min-width:801px)" />
<title>Insert title here</title>
</head>
<body>
	<form id="monFormulaire" name="monFormulaire">
		<div class="ligne">
			<label for="prenom">Prénom</label>
			<input class="unsetvalue" type="text" id="prenom" name="prenom" placeholder="Votre prénom..">
		</div>
		<div class="ligne">
			<label for="nom">Nom</label>
			<input class="unsetvalue" type="text" id="nom" name="nom" placeholder="Votre nom..">
		</div>
		<div class="ligne">
			<label for="email">e-Mail</label>
			<input class="unsetvalue" type="email" id="email" name="email" placeholder="Votre email..">
		</div>
		<div class="ligne">
			<label for="pwd">Mot de passe</label>
			<input class="unsetvalue" type="password" id="pwd" name="mdp" placeholder="Votre mot de passe..">
		</div>
		<div class="ligne">
			<label for="departements">Département</label>
			<select class="unsetvalue" id="departements" name="departements">
				<option value="-1">Choisir votre département...</option>
			</select>
		</div>	
		<div class="ligne">
			<label for="villes">Villes</label>
			<select class="unsetvalue" id="villes" name="villes">
				<option value="-1">Choisir votre ville...</option>
			</select>
		</div>		
		<div class="ligne">
			<input type="submit" value="Envoyer">
			<input type="reset" value="R A Z" id="resbtn">
		</div>
	</form>
	<script type="text/javascript" src="JS/User.js"></script>
	<script type="text/javascript" src="JS/CheckFormWithUser.js"></script>
</body>
</html>