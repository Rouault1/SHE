<?php session_start(); ?>
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
		
		<fieldset>
		<p>
		Votre logement a bien été enregistré
		</p>
		</fieldset>
	</section>
						<?php
							
							$req=$db->query('SELECT deposer.home_id_home, home.id_home FROM deposer, home WHERE deposer.home_id_home=home.id_home',PDO::FETCH_ASSOC);
							//$req->execute(array($home));
							$homes = $req->fetchAll();
						?>

						<?php
							$params['user_id'] = $_SESSION['id'];
							$req=$db->query('INSERT INTO deposer(user_id_user,home_id_home) VALUES($_SESSION["id"], :id_home)');
							$res = $db->lastInsertId();
						?>
						
						

		<img class="fond2"src="images/fond.jpg" />
		
		<?php include('footer.php');?>

			</body>