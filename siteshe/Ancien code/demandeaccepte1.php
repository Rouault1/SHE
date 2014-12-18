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
	if ($res) { echo '<script>confirm(\'Votre demande a bien été prise en compte\')</script>'; }
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_fiche_logementnm.css" />
		<title>Effectuer_une_recherche</title>
	</head>
	<body style="margin:0;">
	<p>
	Votre demande a bien été prise en compte.
	</p>
	</body>
</html>