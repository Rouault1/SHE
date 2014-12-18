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

	try {
		$req = $db->prepare('SELECT * FROM user WHERE id_user=:id');
		$req->execute(array('id' => $_GET['id']));
		$user = $req->fetch();
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

	<section><div class="corps_deposeruneannonce">
		
		
		<legend><h2>Fiche membre</h2></legend>
		
		<article>
			<h3>Coordonnés</h3>
				<ul>
					<li><strong>Nom: </strong><?= $user['last_name']; ?></li></br>
					<li><strong>Prénom: </strong><?= $user['first_name']; ?></li></br>
					<li><strong>Adresse e-mail: </strong><?= $user['email']; ?></li>
				</ul>

			
	</section>
	
		<?php include('inc/slider.php');?>
	    <?php include('inc/footer.php');?>

</body>			
