<?php 
include("inc/header.php");
$form = array();
    function verif($motif, $nom, $valeur)
  {
    $valeur = htmlspecialchars($valeur); 

   if (preg_match($motif, $valeur)) {
        $form[$nom] = $valeur;
    } else {
       echo('<div style="font-size: 16;color: red;">Le ' . $nom . ' ' . $valeur . ' n\'est pas valide.</div>');
    }
}


try {
  $db=new PDO("mysql:host=localhost;dbname=mydb", "root", "root");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
  die("Erreur:". $e->getMessage());
}
?>

			
<div id="blank">
</div>
		<div class="cadre_1">
<h1 class="titre_fiche">Inscription<h1>
<form method="post" action="inscription2.php">


<h2>Vos Coordonnées<h2> 
<label>Nom:*</label>
<input type="text" name="nom" id="nom" required/>
<?php 
 if (isset($_POST['nom']))
 {
  verif("#^[a-z '-]+([a-z '-]?){2,}$#i", "nom", $_POST['nom']);
 }
?>
<label>Prénom:*</label>
<input type="text" name="prenom" id="prenom" required/>
<?php 
 if (isset($_POST['prenom']))
 {
  verif("#^[a-zëïÖ -]+([a-z -]?){2,}$#i", "prenom", $_POST['prenom']);
 }
?>
<label>Mot de Passe:*</label>
<input type="password" name="password" id="password" required/>
<label> Confirmer Mot de Passe:*</label>
<input type="password" name="password_2" id="password_2" required/>
<?php 
 if ($_POST['password_2'] != $_POST['password'])
 {
   echo '<div style="font-size: 16;color: red;">Les deux mots de passes doivent être identiques.</div>';
 }
 else{

 }
?>

<label> Date de naissance:*</label>
<input type="date" name="date_naissance" id="date_naissance" required/>
<label> Adresse Email:*</label>
<input type="email" name="mail" id="mail" required/>
<?php 
 if (isset($_POST['mail']))
 {
  verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", "mail", $_POST['mail']);
 }
?>
<label> Confirmer Adresse Email:*</label>
<input type="email" name="mail_2" id="mail_2" required/>
<?php 
 if ($_POST['mail_2'] != $_POST['mail'])
 {
   echo '<div style="font-size: 16;color: red;">Les deux adresses mail doivent être identiques.</div>';
 }
 else{

 }
?>
<label> Telephone Fixe:*</label>
<input type="tel" name="tel1" id="tel1" required />   
<?php 
 if (isset($_POST['tel1']))
 {
  verif("#^0[1-59]([-. ]?[0-9]{2}){4}$#", "tel1", $_POST['tel1']);
 }
?>

<label> Téléphone Mobile:</label>
<input type="tel" name="tel2" id="tel2" required />
    <?php 
 if (isset($_POST['tel2']))
 {
  verif("#^0[67]([-. ]?[0-9]{2}){4}$#", "tel2", $_POST['tel2']);
 }
?>
<label>Photo d'identité:*</label>
<input  class="photo_id" type="file" name="photo_id" id="photo_id" value="Ajouter une photo"required/> 
<h2>Votre Adresse<h2>
<label>Adresse1:*</label>
    <input type="text" name="adresse1" id="adresse1" required/>
<?php
     if (isset($_POST['adresse']))
 {
  verif("#^[1-9]([0-9]?){2,5}[a-z ,.'-]+([a-z ,.'-]?){2,}$#i", "lieu", $_POST['adresse']);
 }
?>
<label>Adresse2:</label>
    <input type="text" name="adresse2" id="adresse2"/>  
            <?php 
 if (isset($_POST['adresse2']) && !empty($_POST['adresse2']))
 {
  verif("#^[1-9]([0-9]?){2,5}[a-z ,.'-]+([a-z ,.'-]?){2,}$#i", "lieu", $_POST['adresse2']);
 }
?>    
<label> Code Postal:*</label>
	<input type="text" name="code_postal" id="code_postal" maxlength="5" required/>
      <?php 
 if (isset($_POST['code_postal']))
 {
  verif("#^[0-9]([0-9]){4}$#", "code postal", $_POST['code_postal']);
 }
?>  
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
<?php if (isset($_FORM['cond']))
{}
else{
  echo '<div style="font-size: 16;color: red;">Vous devez valider les conditions d\'utilisation du site.</div>';
}
?>
<br/>
<input type="submit" value="Valider"/>
<label class="chp">*Champs Obligatoires</label>
</form>
</div>
<?php include("inc/footer.php");?>