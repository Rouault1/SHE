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
		<link rel="stylesheet" href="stylerecherchem.css" />
		<title>Recherche_membre</title>
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
		
		<fieldset>
			
			<form method="post" action="#">
				<legend><h2>Demande d'échange</h2></legend>
			<article>
			
						<h3>Disponibilités</h3>
						<div class="disponibilites">
							<label class="debut" for="debut"id="debut">Date de début</label><br />
							<input class="debut" type="date" name="debut" id="debut">
						</div>
						<div class="disponibilites">
							<label class="fin"for="fin"id="fin">Date de fin</label><br />
							<input class="fin"type="date" name="fin" id="fin">
						</div>
					<?php
					$disponibilites['debut'] = isset($_POST["debut"]) ? $_POST["debut"] : '';
					$disponibilites['fin'] = isset($_POST["fin"]) ? $_POST["fin"] : '';

					$sql = 'INSERT INTO echange (debut, fin) VALUES (:debut, :fin)';
					$req = $db->prepare($sql);
					$req->execute($disponibilites);
					$res = $db->lastInsertId();
					?>
					
						<div class="envoyer">
							
							<input class="soumettre" type="submit" value="Enregistrer la demande" />
						</div>

				</article>
				</form>
		</fieldset>
				
				<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>

			</body>