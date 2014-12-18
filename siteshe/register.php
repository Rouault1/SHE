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
				$errors[$cle] = message('Le ' . $nom . ' ' . $valeur . ' n\'est pas valide.', 'error');
			}
		} else {
			$errors[$cle] = message('Le champ ' . $nom . ' doit être rempli.', 'error');
		}
	}

	// Vérification des champs du formulaire
	verif("#^(homme|femme)$#", 'Genre', 'genre');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Nom', 'nom');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Prénom', 'prenom');
	verif("#([0-9]{2}[-./ ][0-9]{2}[-./ ][0-9]{4}|[0-9]{4}[-./ ][0-9]{2}[-./ ][0-9]{2})#", 'Date de naissance', 'date_naissance');
	verif("#^.+$#", 'Mot de passe', 'password');
	verif("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", 'Email', 'mail');
	verif("#^0[1-59]([-. ]?[0-9]{2}){4}$#", 'Numéro fixe', 'tel1');
	verif("#^0[67]([-. ]?[0-9]{2}){4}$#", 'Numéro mobile','tel2');
	verif("#^[1-9]([0-9]?){2,5}[a-zàéèëêÏÖôüûÿ ,.'-]+([a-zàéèêëïôöüûÿ ,.'-]?){2,}$#i", 'Adresse', 'adresse');
	verif("#^[0-9]([0-9]){4}$#", 'code postal', 'code_postal');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Ville', 'ville');
	verif("#^[a-zàéèëïÖü -]+$#i", 'Pays', 'pays');
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
						$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
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
							$errors['global'] = message('Votre compte a bien été enregistré. Vous allez recevoir un mail de confirmation.');
							// Envoyer un mail de validation du compte
							$insc = true;						
						}
					} catch (Exception $e) {
						// Les données ne sont pas uniques
						if ($e->errorInfo[1] === 1062) {
							$errors['global'] = message('Cet utilisateur existe déjà.', 'error');
						} else {
							die('Erreur non gérée : '. $e->getMessage());
						}
					}
				} else {
					$errors['cond'] = message('Vous devez valider les conditions d\'utilisation du site.', 'error');
				}
			} else {
				$errors['mail_2'] = message('Les deux adresses mail doivent être identiques.', 'error');
			}
		} else {
			$errors['password_2'] = message('Les deux mots de passes doivent être identiques.', 'error');
		}
	}
}

include('inc/slider.php');

if(!$insc)
{
	include('inc/header_inv.php');
	include('inc/form.php');
	include("inc/footer.php");
}
else{
	include('inc/header_inv.php'); ?>	
	<h1 class="titre_verif">Merci de votre inscription !</h1>
	<div class="verif">
		<h3 class="verif2">Votre inscription a bien été prise en compte. Vous allez recevoir un mail de confirmation.</h3>
		<a class="lien_verif" href="index.php">Retour à l'accueil</a>
	</div>	
	<?php include("inc/footer.php");

}
?>


