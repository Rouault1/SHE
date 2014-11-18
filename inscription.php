
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/style_inscr.css" />
		<title>Sweet Home Exchange : échangez vos propriétés en toute sûreté !</title>
	</head>
	<body>
			<ul id="header">
			<img src="images/logo_shev3d_mini.png" />
		</ul>
			<ul id="menu1">
			<li class="bouton_1"><a href="index.php">Accueil</a></li>
			<li class="bouton_1"><a href="offres.php">Voir les offres</a></li>
			<li class= "bouton_1"><a href="acc_forum.php">Forum</a></li>
			</ul>
			
		<div id="intro">
			<?php echo "Bienvenue sur S.H.E !"; ?>
		</p>
		</div>
<h1 class="titre_fiche">Inscription<h1>
<form method="post" action="inscr_verif.php">


<fieldset>
     <legend>Vos Coordonnées</legend> 
<label>Nom:*</label>
<input type="text" name="nom" id="nom" required/>
<label>Prénom:*</label>
<input type="text" name="prenom" id="prenom" required/>
<label>Genre:*</label>
<input type="radio" name="genre" value="homme" id="homme"/><label for="homme" class="inline">Homme</label>
<input type="radio" name="genre" value="femme" id="femme"/><label for="femme" class="inline">Femme</label>
<label> Adresse Email:*</label>
<input type="text" name="mail" id="mail" required/>
<label> Telephone Portable:*</label>
<input type="tel" name="tel1" id="tel1" maxlenght="10"/>       
<label> Téléphone Fixe:</label>
    <input type="tel" name="tel2" id="tel2" maxlenght="10" required/>
    <label>Photo d'identité:*</label>
    <input type="file" name="photo_id" class="photo_id" value="Ajouter une photo" required/>
</fieldset> 
<fieldset>
	<legend>Votre Adresse</legend>
<label>Adresse1:*</label>
    <input type="text" name="adresse1" id="adresse1" required/>
<label>Adresse2:</label>
    <input type="text" name="adresse2" id="adresse2" required/>    
<label> Code Postal:*</label>
	<input type="text" name="code_postal" id="code_postal" maxlength="5" required/>
<label> Ville:*</label>
    <input type="text" name="ville*" id="ville" required/>
    <label for="pays"> Pays:*</label>
<select name="pays" id="pays" required>
	<optgroup label="Europe">
   <option value="France" selected>France</option>
   <option value="Allemagne">Allemagne</option>
   <option value="Royaumes_Unis">Royaumes-Unis</option>
   <option value="Italie">Italie</option>
   <option value="Espagne">Espagne</option>
</optgroup>
<optgroup label="Amerique">
   <option value="Etats_Unis">Etats-Unis</option>
   <option value="Canada">Canada</option>
</optgroup>
<optgroup label="Asie">   
   <option value="Chine">Chine</option>
   <option value="Japon">Japon</option>
</optgroup>   
</select>  
<label> Région/Etat </label>
<input type="text" name="region" id="region"/> 
</fieldset>   
  
<input type="checkbox" name="conditions_utilisation" id="conditions_utilisation" required /> <label for="conditions_utilisation" class="inline2">Je certifie avoir lu et approuvé les conditions d'utilisation générale de ce site*</label><br/>
<label class="chp">*Champs Obligatoires</label>
<input type="submit" value="Valider"/>
</form>
<div id="footer">
		<ul>
			<li><a href="faq.php">F.A.Q</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cgu.php">Mentions légales</a></li>
			<li classe="lien_4"><a href="a_propos.php">A propos</a></li>
		</ul>
		</div>
	</body>
</html>
			