<?php include("inc/header.php");?>
			
<div id="blank">
</div>
		<div class="cadre_1">
<h1 class="titre_fiche">Inscription<h1>
<form method="post" action="inscrp_verif.php">


<h2>Vos Coordonnées<h2> 
<label>Nom:*</label>
<input type="text" name="nom" id="nom" required/>
<label>Prénom:*</label>
<input type="text" name="prenom" id="prenom" required/>
<label>Mot de Passe:*</label>
<input type="password" name="password" value="password" id="password" required/>
<label> Confirmer Mot de Passe:*</label>
<input type="password" name="password_2" value="password_2" id="password_2" required/>
<label> Date de naissance:*</label>
<input type="date" name="date_naissance" id="date_naissance" required/>
<label> Adresse Email:*</label>
<input type="email" name="mail" id="mail" required/>
<label> Confirmer Adresse Email:*</label>
<input type="email" name="mail_2" id="mail_2" required/>
<label> Telephone Portable:*</label>
<input type="tel" name="tel1" id="tel1" maxlength="10" required />   
<label> Téléphone Fixe:</label>
<input type="tel" name="tel2" id="tel2" maxlength="10" />
<label>Photo d'identité:*</label>
<input  class="photo_id" type="file" name="photo_id" id="photo_id" value="Ajouter une photo"required/> 
<h2>Votre Adresse<h2>
<label>Adresse1:*</label>
    <input type="text" name="adresse1" id="adresse1" required/>
<label>Adresse2:</label>
    <input type="text" name="adresse2" id="adresse2"/>    
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
<optgroup label="Amerique du Nord">
   <option value="Etats_Unis">Etats-Unis</option>
   <option value="Canada">Canada</option>
</optgroup>
<optgroup label="Asie">   
   <option value="Chine">Chine</option>
   <option value="Japon">Japon</option>
   <option value="Corée_du_sud">Corée du Sud</option>
</optgroup>
<optgroup label="Afrique">
   <option value="Maroc">Maroc</option>
   <option value="Algérie">Algérie</option>
   <option value="Afrique_du_Sud">Afrique du Sud</option>
</optgroup>

</select>  
<label> Région/Etat: </label>
<input type="text" name="region" id="region"/> 
</br>  
<div>  
<input type="checkbox" name="conditions_utilisation" id="cond" required /> 
<label for="conditions_utilisation" class="inline2">Je certifie avoir lu et approuvé les conditions d'utilisation générale de ce site*</label>
</div>
<br/>
<input type="submit" value="Valider"/>
<label class="chp">*Champs Obligatoires</label>
</form>
</div>
<?php include("inc/footer.php");?>