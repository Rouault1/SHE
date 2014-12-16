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
		<link rel="stylesheet" href="style_site_she.css" />
		<title>Recherche_membre</title>
	</head>

	<body>
		<?php include('inc/header_eng.php'); ?>
	
		<?php include('inc/esp_membre_eng.php');?>
	
	
	
	<section><div class="corps_deposeruneannonce">

		
		
			<form method="post" action="demandeaccepteen.php?id=<?= $_GET['id']; ?>">
				<legend><h2>Request of Exchange</h2></legend>
			<article>
			
						<h3>Availabilities</h3>
						<div class="disponibilites">
							<label class="debut" for="debut"id="debut">From</label><br />
							<input class="debut" type="date" name="debut" id="debut">
						</div>
						<div class="disponibilites">
							<label class="fin"for="fin"id="fin">To</label><br />
							<input class="fin"type="date" name="fin" id="fin">
						</div>
					
						 <div class="envoyer" style="margin-top:5%;">
							
							<input class="soumettre" type="submit" value="Register" />
						 </div>

							<a href="fiche_membre.php?id=<?= $home['id_user']; ?>">Members' informations <br><?= $home['first_name'] . ' ' . $home['last_name']; ?></a>
				</article>
				</form>
	
				</section>
				</div>

				
		<?php include('inc/slider.php');?>
	    <?php include('inc/footer_eng.php');?>

			</body>