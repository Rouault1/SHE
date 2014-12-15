<!DOCTYPE html>
<html>
<?php
try {
	$db=new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}
?>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="styledeposerannonce.css" />
		<title>Deposer une annonce</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('menu.php');?>
	
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
	
	<section>
		<article>
			<h2>Demande d'échange</h2>
			
			<form method="post" action="traitement.php">
				<h3>Caractéristiques du logement</h3><br/>
				
					<div class="caracteristiquesechange"><br/>
					<label for="biens">Biens proposés</label><br/>
					<select name="biens" id="biens">
						<option value="villa">Villa</option>
						<option value="château">Château</option>
						<option value="maison">Maison</option>
						<option value="appartement">Appartement</option>
					</select>
				</div>
				<div class="datededebut">
					<label for="datededebut">Date de début</label><br/>
					<textarea name="datededébut" id="datededébut"></textarea>
				</div>
				<div class="datedefin">
					<label for="datedefin">Date de fin</label><br/>
					<textarea name="datedefin" id="datedefin"></textarea>
				</div>
			<div class="charte">
			<input type="checkbox" name="charte" id="charte" /> <label for="charte">Je m'engage à respecter les contrainte et services relatives à ce bien.</label><br />
			</div>
			
		<div class="terminer">	
		<input class="envoi" type="submit" value="Envoyer" />
		</div>
	
			</form>
		</section>
		<img class="fond2"src="images/fond.jpg" />
		
		<?php include('footer.php');?>

			</body>
				