<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_fiche_logementnm.css" />
		<title>Effectuer_une_recherche</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('nonconnecter.php');?>

	<img class="fond1"src="images/fond1.jpg" />
		
		<aside>
			<img class="fond"src="images/fond.jpg" />
			<p>Villa</p>
		</aside>
		
		<aside>
			<img class="fond"src="images/famille.jpg" />
			<p>Week-end en famille</p>
		</aside>
		
		<aside>
			<img class="fond"src="images/paris.jpg" />
			<p>Appartement parisien</p>
		</aside>
	<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {

	// PDO
	try {
		$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		die("Erreur:". $e->getMessage());
	}

	try{
		$req = $db->prepare('SELECT * FROM home WHERE id_home=:id');
		$req->execute(array('id' => $_GET['id']));
		$home = $req->fetch();
	} catch (Exception $e){
		echo $e->getMessage();
	}

	// echo '<pre>';
	// var_dump($home);
	// echo '</pre>';

}

?>
	<section>
		
		<fieldset>

		<legend><h2>Le logement que vous avez sélectionné</h2></legend>
		
		<article>
			
			<h3>Se situe</h3>
				<ul>
					<li><?= $home['home_country']; ?></li>
					<li><?= $home['home_region']; ?></li>
					<li><?= $home['home_ville']; ?></li>
					<li><?= $home['adresse']; ?></li>
				</ul>


			<h3>Caractéristiques du logement</h3>	
				<ul>
					<li><?= $home['caracteristiques_sejour']; ?></li>
					<li><?= $home['caracteristiques_pieces']; ?></li>
					<li><?= $home['caracteristiques_personnes']; ?></li>
				</ul>
			
			<h3>Aménagements extérieurs</h3>
				<ul>
					<li><?php echo ( isset($home['parking']) ? 'Parking' : ''); ?></li>
					<li><?php echo ( isset($home['piscine']) ? 'Piscine' : ''); ?></li>
				</ul>
			
			<h3>Contraintes et services</h3>
				<ul>
					<li><?php echo ( isset($home['climatisation']) ? 'Climatisation' : ''); ?></li>
					<li><?php echo ( isset($home['wifi']) ? 'Wifi' : ''); ?></li>
					<li><?php echo ( isset($home['animaux']) ? 'Animaux autorisés' : ''); ?></li>
					<li><?php echo ( isset($home['equipement']) ? 'Equipements pour enfants' : ''); ?></li>
					<li><?php echo ( isset($home['handicape']) ? 'Installation adaptée pour les handicapés' : ''); ?></li>
					<li><?php echo ( isset($home['sport']) ? 'Installation sportive à proximité' : ''); ?></li>
					<li><?php echo ( isset($home['fumeur']) ? 'Fumeur' : ''); ?></li>
					<li><?php echo ( isset($home['commerces']) ? 'Commerces à proximité' : ''); ?></li>
				</ul>
			
			<h3>Disponibilités</h3>
				<div class="calendrier"><?= $home['debut']; ?><?= $home['fin']; ?></div>
			
			<h3>Note des membres de S.H.E</h3>
				<div class="etoiles">système étoilé</div>
			
			<h3>Commentaires des membres de S.H.E<h3>
				<textarea name="remarque" id="remarque" rows="10" cols="50"><?= $home['remarque']; ?></textarea> <br/>
			<?php

			 $home['id_home'] = isset($_POST["id_home"]) ? $_POST["id_home"] : '';
			 $req=$db->prepare('SELECT * FROM home, demande WHERE user_id_user=id_user AND home_id_home=id_home ');
			 $req->execute($user);
			 $homes = $req->fetchAll();
			 
			 ?>

				<a href="demande.php?id=<?= $home['id_home']; ?>">Demander un échange <?= $home['id_home']; ?></a>
	</section>
	<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>
</body>			

