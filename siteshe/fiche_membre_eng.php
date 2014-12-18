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
		<?php include('inc/header_eng.php'); ?>
	
		<?php include('inc/esp_membre_eng.php');?>

	<section><div class="corps_deposeruneannonce">
		
		
		<legend><h2>Member card</h2></legend>
		
		<article>
			<h3>Coordinates</h3>
				<ul>
					<li><strong>Last name: </strong><?= $user['last_name']; ?></li></br>
					<li><strong>First Name: </strong><?= $user['first_name']; ?></li></br>
					<li><strong>E-mail: </strong><?= $user['email']; ?></li>
				</ul>

			
	</section>
	
		<?php include('inc/slider.php');?>
	    <?php include('inc/footer_eng.php');?>

</body>			
