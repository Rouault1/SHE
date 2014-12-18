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
	<section>
		
		<fieldset>
		<legend><h2>Fiche membre</h2></legend>
		
		<article>
			<h3>Coordonnés</h3>
				<ul>
					<li><?= $user['last_name']; ?></li>
					<li><?= $user['first_name']; ?></li>
					<li><?= $user['email']; ?></li>
				</ul>

			
	</section>
	<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>
</body>			
