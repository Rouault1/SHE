<?php


session_start();

try {
	$db=new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}


try{
	$req=$db->prepare('SELECT * FROM home, user WHERE user.id_user=home.id_user AND id_home=:id_home');
	$req->execute(array('id_home' => $_GET['id']));
	$home = $req->fetch();
} catch(Exception $e) {
	if ($e) { $e->getMessage(); }
}

?>
<!DOCTYPE html>
<html>
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
			
			<form method="post" action="demandeaccepte.php?id=<?= $_GET['id']; ?>">
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
					
						 <div class="envoyer">
							
							<input class="soumettre" type="submit" value="Enregistrer la demande" />
						 </div>

							<a href="fiche_membre.php?id=<?= $home['id_user']; ?>">Fiche membre <?= $home['first_name'] . ' ' . $home['last_name']; ?></a>
				</article>
				</form>
		</fieldset>
				
				<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>

			</body>