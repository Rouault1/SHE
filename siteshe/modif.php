<?php session_start();
include('inc/header.php');
include('inc/esp_membre.php'); 
include('inc/slider.php');
?>
<div class="cadre_modif">
<h1 class="titre_modif">Vos informations</h1>
<ul class="coord">
	<li class="coord">Nom: <?= $_SESSION['nom']; ?></li>
	<li class="coord">Prénom: <?= $_SESSION['prenom']; ?></li>
	<li class="coord">E-mail: <?= $_SESSION['email']; ?></li>
	<li class="coord">Téléphone fixe: <?= $_SESSION['n_fixe']; ?></li>
	<li class="coord">Téléphone mobile: <?= $_SESSION['n_port']; ?></li>
	<li class="coord">Adresse: <?= $_SESSION['adresse']; ?></li>
	<li class="coord">Code postal: <?= $_SESSION['code_p']; ?></li>
	<li class="coord">Ville: <?= $_SESSION['city']; ?></li>
	<li class="coord">Pays: <?= $_SESSION['pays']; ?></li>
	<li class="coord">Region: <?= $_SESSION['region']; ?></li>
</ul>
<ul>
	<li class="lien_modif"><a class="lien_modif" href="modif_mdp.php">Modifier mon mot de passe</a>
	<li class="lien_modif"><a class="lien_modif" href="modif_coord.php">Modifier mes coordonnées</a>
	<li class="lien_modif"><a class="lien_modif" href="avatar.php">Ajouter un avatar</a>
</ul>
</div>		
<?php include('inc/footer.php'); ?>