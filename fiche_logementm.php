<?php


session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {

	// PDO
	try {
		$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		die("Erreur:". $e->getMessage());
	}

	try{
		$req = $db->prepare('SELECT * FROM home, user WHERE user.id_user=home.id_user AND id_home=:id');
		$req->execute(array('id' => $_GET['id']));
		$home = $req->fetch();
	} catch (Exception $e){
		echo $e->getMessage();
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_site_she.css" />
		<title>Effectuer_une_recherche</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('inc/esp_membre.php');?>
	
		<?php include('inc/slider.php');?>

	<section class='ficheloge' style="margin-top:2%; margin-bottom:2%;">

		<legend><h2>Le logement que vous avez sélectionné</h2></legend>
		
		<article>
			
			<h3>Se situe</h3>
				<ul>
					<li>Pays: <?= $home['home_country']; ?></li>
					<li>Région: <?= $home['home_region']; ?></li>
					<li>Ville: <?= $home['home_ville']; ?></li>
					<li>Adresse: <?= $home['adresse']; ?></li>
				</ul>


			<h3>Caractéristiques du logement</h3>	
				<ul>
					<li>Type de séjour: <?= $home['caracteristiques_sejour']; ?></li>
					<li>Nombre de pièces: <?= $home['caracteristiques_pieces']; ?></li>
					<li>Nombre de personnes: <?= $home['caracteristiques_personnes']; ?></li>
				</ul>
			
			<h3>Aménagements extérieurs</h3>
				<ul>
					<li><?php echo (isset($home['parking']) ? 'Parking' : ''); ?></li>
					<li><?php echo (isset($home['piscine']) ? 'Piscine' : ''); ?></li>
				</ul>
			
			<h3>Contraintes et services</h3>
				<ul>
					<li><?php echo (isset($home['climatisation']) ? 'Climatisation' : ''); ?></li>
					<li><?php echo (isset($home['wifi']) ? 'Wifi' : ''); ?></li>
					<li><?php echo (isset($home['animaux']) ? 'Animaux autorisés' : ''); ?></li>
					<li><?php echo (isset($home['equipement']) ? 'Equipements pour enfants' : ''); ?></li>
					<li><?php echo (isset($home['handicape']) ? 'Installation adaptée pour les handicapés' : ''); ?></li>
					<li><?php echo (isset($home['sport']) ? 'Installation sportive à proximité' : ''); ?></li>
					<li><?php echo (isset($home['fumeur']) ? 'Fumeur' : ''); ?></li>
					<li><?php echo (isset($home['commerces']) ? 'Commerces à proximité' : ''); ?></li>
				</ul>
			
			<h3>Disponibilités</h3>
				<div class="calendrier">Date de début: <?= $home['debut']; ?></br>Date de fin: <?= $home['fin']; ?></div>
			
			<h3>Note des membres de S.H.E</h3>
				<div class="etoiles">système étoilé</div>
			
				<h3>Commentaires des membres de S.H.E<h3>
				<textarea name="remarque" id="remarque" rows="10" cols="50"></textarea><br>


				<a href="demande.php?id=<?= $home['id_home']; ?>">Demander un échange</a><br>
				<a href="fiche_membre.php?id=<?= $home['id_user']; ?>"><?= $home['first_name'] . ' ' . $home['last_name']; ?></a>
	</section>
	
		<?php include('footer.php');?>
</body>			
