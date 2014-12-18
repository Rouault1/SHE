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
		<?php include('inc/header_eng.php'); ?>
	
		<?php include('inc/esp_membre_eng.php');?>
	
		<?php include('inc/slider.php');?>

	<section class='ficheloge' style="margin-top:2%; margin-bottom:2%;">

		<legend><h2>Your choice</h2></legend>
		
		<article>
			
			<h3>Location</h3>
				<ul>
					<li>Country: <?= $home['home_country']; ?></li>
					<li>Region: <?= $home['home_region']; ?></li>
					<li>City: <?= $home['home_ville']; ?></li>
					<li>Address: <?= $home['adresse']; ?></li>
				</ul>


			<h3>Housing characteristics</h3>	
				<ul>
					<li>Type of stay: <?= $home['caracteristiques_sejour']; ?></li>
					<li>Number of rooms: <?= $home['caracteristiques_pieces']; ?></li>
					<li>Number of people: <?= $home['caracteristiques_personnes']; ?></li>
				</ul>
			
			<h3>Outer arrangements</h3>
				<ul>
					<li><?php echo (isset($home['parking']) ? 'Parking' : ''); ?></li>
					<li><?php echo (isset($home['piscine']) ? 'Pool' : ''); ?></li>
				</ul>
			
			<h3>Constraints and services</h3>
				<ul>
					<li><?php echo (isset($home['climatisation']) ? 'Air conditionning' : ''); ?></li>
					<li><?php echo (isset($home['wifi']) ? 'Wifi' : ''); ?></li>
					<li><?php echo (isset($home['animaux']) ? 'Pets allowed' : ''); ?></li>
					<li><?php echo (isset($home['equipement']) ? 'Child\'s adapted equipments' : ''); ?></li>
					<li><?php echo (isset($home['handicape']) ? 'Disabled access' : ''); ?></li>
					<li><?php echo (isset($home['sport']) ? 'Sport equipements' : ''); ?></li>
					<li><?php echo (isset($home['fumeur']) ? 'Smoking' : ''); ?></li>
					<li><?php echo (isset($home['commerces']) ? 'Shop nearby' : ''); ?></li>
				</ul>
			
			<h3>Availabilities</h3>
				<div class="calendrier">From: <?= $home['debut']; ?></br>To: <?= $home['fin']; ?></div>
			
			<h3>Members'evaluation</h3>
				<div class="etoiles">système étoilé</div>
			
				<h3>Commentaries of the members<h3>
				<textarea name="remarque" id="remarque" rows="10" cols="50"></textarea><br>


				<a href="demandeen.php?id=<?= $home['id_home']; ?>">Ask for an exchange</a><br>
				<a href="fiche_membre_eng.php?id=<?= $home['id_user']; ?>"><?= $home['first_name'] . ' ' . $home['last_name']; ?></a>
	</section>
	
		<?php include('inc/footer_eng.php');?>
</body>			
