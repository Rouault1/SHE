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
		$req = $db->prepare('SELECT * FROM user WHERE id_user=:id');
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

		<legend><h2>Fiche membre</h2></legend>
		
		<article>
		
			<?php
			
			
			 $req=$db->query('SELECT user.id_user, last_name, first_name, email, user_id_user, id_home, home_id_home FROM user, echange, home WHERE user_id_user= id_user  AND home_id_home = id_home', PDO::FETCH_ASSOC);
			 $res = $req->fetchAll();

			 var_dump($res);
			 ?>

			
			<h3>Coordonnés</h3>
				<ul>
					<li><?= $res['last_name']; ?></li>
					<li><?= $res['first_name']; ?></li>
					<li><?= $res['email']; ?></li>
				</ul>

			
	</section>
	<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>
</body>			
