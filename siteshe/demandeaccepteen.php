<?php


session_start();

try {
	$db=new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}

if (isset($_POST['debut']) && isset($_POST['fin'])) {
	$req = $db->prepare('INSERT INTO echange (user_id_user, home_id_home, debut, fin) VALUES (:user_id, :home_id, :debut, :fin)');
	$req->execute(array('user_id' => $_SESSION['id'], 'home_id' => $_GET['id'], 'debut' => $_POST['debut'], 'fin' => $_POST['fin']));
	$res = $db->lastInsertId();
	if ($res) { echo '<script>confirm(\'Your request has been submitted.\')</script>'; }
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_site_she.css" />
		<title>Recherche_membre</title>
	</head>

	
		<?php include('inc/header_eng.php'); ?>
	
		<?php include('inc/esp_membre_eng.php');?>
	<body>
	<section><div class="corps_deposeruneannonce">
	<p style="text-align: center;" >
	<strong>Your request has been submitted.</strong>
	</p>
	</section>
	<?php include('inc/slider.php');?>
	<?php include('inc/footer_eng.php');?>

	</body>
</html>