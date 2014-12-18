<?php 
$insc = false;

function error ($nom) {
	global $errors;
	echo (isset($errors[$nom]) ? $errors[$nom] : '');
}

if(!empty($_POST)) {

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
				$errors[$cle] = message('The ' . $nom . ' ' . $valeur . ' is not valid.', 'error');
			}
		} else {
			$errors[$cle] = message('The ' . $nom . ' field must be completed.', 'error');
		}
	}

	// Vérification des champs du formulaire
	verif("#^(homme|femme)$#", 'Gender', 'genre');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Name', 'nom');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Surname', 'prenom');
	verif("#([0-9]{2}[-./ ][0-9]{2}[-./ ][0-9]{4}|[0-9]{4}[-./ ][0-9]{2}[-./ ][0-9]{2})#", 'Date of birth', 'date_naissance');
	verif("#^.+$#", 'Password', 'password');
	verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'mail');
	verif("#^0[1-59]([-. ]?[0-9]{2}){4}$#", 'Phone number', 'tel1');
	verif("#^0[67]([-. ]?[0-9]{2}){4}$#", 'Cellphone number','tel2');
	verif("#^[1-9]([0-9]?){2,5}[a-zàéèëêÏÖôüûÿ ,.'-]+([a-zàéèêëïôöüûÿ ,.'-]?){2,}$#i", 'Adress', 'adresse');
	verif("#^[0-9]([0-9]){4}$#", 'Zip code', 'code_postal');
	verif("#^[a-zàéèëïÖü -]+$#i", 'City', 'ville');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Country', 'pays');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Region', 'region');

	// Vérifie s'il n'y a pas d'erreurs
	if (empty($errors)) {
		// Vérifie si les champs mots de passes sont identiques
		if ($_POST['password'] === $_POST['password_2']) {
			// Vérifie si les champs mail sont identiques
			if ($_POST['mail'] === $_POST['mail_2']) {
				// Vérifie que les conditions d'utilisation du site sont cochées
				if (isset($_POST['cond']) && $_POST['cond'] === 'on') {
					$form['genre'] = $form['genre'] === 'femme' ? 1 : 0;
					$form['date_naissance'] = preg_replace('/(\d{2})[-\.\/ ](\d{2})[-\.\/ ](\d{4})/', '$3-$2-$1', $form['date_naissance']);
					// Génération d'un token
					$form['token'] = sha1(uniqid(rand()));
					// Cryptage du mot de passe
					$form['password'] = sha1($form['password']);

					// Initialisation de l'objet PDO
					try {
						$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "root");
						// Permet d'afficher les erreurs envoyés par SQL
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch (Exception $e) {
						die("Erreur:". $e->getMessage());
					}

					// Génération de la requête SQL
					$req = $db->prepare('INSERT INTO user (gender, last_name, first_name, date_birth, password, email, n_fixe, n_portable, adress, postcode, city, country, region, token, date_inscr) VALUES (:genre, :nom, :prenom, :date_naissance, :password, :mail, :tel1, :tel2, :adresse, :code_postal, :ville, :pays, :region, :token, NOW())');

					// On essaie d'éxécuter la requête
					try {

						$req->execute($form);
						$res = $db->lastInsertId();

						if ($res) {
							$errors['global'] = message('Your account has been registered. You will receive a confirmation email .');
							// Envoyer un mail de validation du compte
							$insc = true;						
						}
					} catch (Exception $e) {
						// Les données ne sont pas uniques
						if ($e->errorInfo[1] === 1062) {
							$errors['global'] = message('This user already exists.', 'error');
						} else {
							die('Unknown error : '. $e->getMessage());
						}
					}
				} else {
					$errors['cond'] = message('You must accept the terms of use.', 'error');
				}
			} else {
				$errors['mail_2'] = message('Both email addresses must be identical.', 'error');
			}
		} else {
			$errors['password_2'] = message('Both passwords must be identical.', 'error');
		}
	}
}

include('inc/slider.php');

if(!$insc)
{
	include('inc/header_inv_eng.php');
	include('inc/form_eng.php');
	include("inc/footer_eng.php");
}
else{
	include('inc/header_inv_eng.php'); ?>	
	<h1 class="titre_verif">Thank you for your registration !</h1>
	<div class="verif">
		<h3 class="verif2">Your registration has been taken into account. You will receive a confirmation email.</h3>
		<a class="lien_verif" href="index.php">Back to home</a>
	</div>	
	<?php include("inc/footer_eng.php");

}
?>


