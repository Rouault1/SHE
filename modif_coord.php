<?php session_start();

function error ($nom) {
	global $errors;
	echo (isset($errors[$nom]) ? $errors[$nom] : '');
}
if(!empty($_POST))
{
// Contient les données vérifiées du formulaire
	$form = array();
	// Contient les erreurs du formulaire
	$errors = array();

	// Définition de quelques fonctions
	function message ($message, $type = null) {
		$color = $type === 'error' ? '#ff0000' : '#1E824c';
		return '<div style="font-size:16px;color:' . $color . ';">' . $message . '</div>';
	}
	function verif ($motif, $nom, $cle) {
		global $form;
		global $errors;
		$valeur = isset($_POST[$cle]) ? $_POST[$cle] : null;
		if (!empty($valeur)) {
			$valeur = htmlspecialchars($valeur);
			if (preg_match($motif, $valeur)) {
				$form[$cle] = $valeur;
			} else {
				$errors[$cle] = message('Le champ ' . $nom . ' ' . $valeur . ' n\'est pas valide.', 'error');
			}
		} else {
			$errors[$cle] = message('Le champ ' . $nom . ' doit être rempli.', 'error');
		}
	}
	verif("#^(homme|femme)$#", 'Genre', 'genre');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Nom', 'nom');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Prénom', 'prenom');
	verif("#([0-9]{2}[-./ ][0-9]{2}[-./ ][0-9]{4}|[0-9]{4}[-./ ][0-9]{2}[-./ ][0-9]{2})#", 'Date de naissance', 'date_naissance');
	verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'email');
	verif("#^0[1-59]([-. ]?[0-9]{2}){4}$#", 'Numéro fixe', 'tel1');
	verif("#^0[67]([-. ]?[0-9]{2}){4}$#", 'Numéro mobile','tel2');
	verif("#^[1-9]([0-9]?){2,5}[a-zàéèëêÏÖôüûÿ ,.'-]+([a-zàéèêëïôöüûÿ ,.'-]?){2,}$#i", 'Adresse', 'adresse');
	verif("#^[0-9]([0-9]){4}$#", 'code postal', 'code_postal');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Ville', 'ville');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Pays', 'pays');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Region', 'region');
	// Vérifie s'il n'y a pas d'erreurs
	if (empty($errors)) {
		if (isset($_POST['cond']) && $_POST['cond'] === 'on') {
					$form['genre'] = $form['genre'] === 'femme' ? 1 : 0;
					$form['date_naissance'] = preg_replace('/(\d{2})[-\.\/ ](\d{2})[-\.\/ ](\d{4})/', '$3-$2-$1', $form['date_naissance']);
					// Initialisation de l'objet PDO
					try {
						$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "root");
						// Permet d'afficher les erreurs envoyés par SQL
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} 
					catch (Exception $e) {
						die("Erreur:". $e->getMessage());
					}
					// Génération de la requête SQL
					$req = $db->prepare('UPDATE user SET gender = :genre, last_name = :nom, first_name = :prenom, birth_date = :date_naissance, email = :email, n_fixe =:tel1, :n_port=:tel2, adress=:adresse, code_p =:code_postal, city = :ville, pays =:pays, region =:region WHERE id_user = '.$_SESSION['id'].'');

					// On essaie d'éxécuter la requête
					try {

						$req->execute($form);
						$res = $db->lastInsertId();

						if ($res) {
							$errors['global'] = message('Vos informations ont bien été modifiées.');
							// Envoyer un mail de validation du compte
							$insc = true;						
						}
					} 
					catch (Exception $e) {
						// Les données ne sont pas uniques
						if ($e->errorInfo[1] === 1062) {
							$errors['global'] = message('Cet utilisateur existe déjà.', 'error');
						} 
						else {
							die('Erreur non gérée : '. $e->getMessage());
						}
					}
		}			
		else {
				$errors['cond'] = message('Vous devez confirmer vos changements.', 'error');
		}
	}
}				
include('inc/header.php');
include('inc/slider.php'); ?>
<div id="cadre_1">
<h1 class="titre_fiche2">Modifiez vos coordonnées</h1>
<form method="post" action="" id="form_modif">
	<label>Genre:</label>
	<input type="radio" name="homme" value="homme" id="homme"/><label for="homme" class="inline">Homme</label>
	<input type="radio" name="femme" value="femme" id="femme"/><label for="femme" class="inline">Femme</label>
	<label>Nom:</label>
	<input type="text" name="nom" id="nom" value="<?= $_SESSION['nom']?>"/>
	<?php error('nom'); ?>
	<label>Prénom:</label>
	<input type="text" name="prenom" id="prenom" value="<?= $_SESSION['prenom']?>"/>
	<?php error('prenom'); ?>
	<label>Date de naissance:</label>
	<input type="text" name="date_naissance" id="date_naissance" value="<?= $_SESSION['date_naiss']?>">
	<?php error('date_naissance'); ?>
	<label>Téléphone fixe:</label>
	<input type="text" name="tel1" id="tel1" value="<?= $_SESSION['n_fixe']?>"/>
	<?php error('tel1'); ?>
	<label>Téléphone portable:</label>
	<input type="text" name="tel2" id="tel2" value="<?= $_SESSION['n_port']?>"/>
	<?php error('tel2'); ?>
	<label>Adresse Email:</label>
	<input type="text" name="email" id="email" value="<?= $_SESSION['email']?>"/>
	<?php error('email'); ?>
	<label>Adresse:</label>
	<input type="text" name="adresse" id="adresse" value="<?= $_SESSION['adresse']?>"/>
	<?php error('adresse'); ?>
	<label>Code Postal:</label>
	<input type="text" name="code_postal" id="code_postal" value="<?= $_SESSION['code_p']?>"/>
	<?php error('code_postal'); ?>
	<label>Ville:</label>
	<input type="text" name="ville" id="ville" value="<?= $_SESSION['city']?>"/>
	<?php error('ville'); ?>
	<label>Pays:</label>
	<input type="text" name="pays" id="pays" value="<?= $_SESSION['pays']?>"/>
	<?php error('pays'); ?>
	<label>Région/Etat:</label>
	<input type="text" name="region" id="region" value="<?= $_SESSION['region']?>"/>
	<?php error('nom'); ?><br>
<div>
			<input type="checkbox" name="cond" id="cond" >
			<label for="cond" class="inline2">Je valide mes changements.</label>
	<?php error('cond'); ?>
</div>
<br>
	<input type="submit" value="modifier"/>
</form>
</div>

<?php	
include('inc/footer.php');
?>