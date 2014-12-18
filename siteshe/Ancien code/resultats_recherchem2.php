<?php

session_start();

if (!empty($_POST)) {
	$params = array();

	try {
		$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		die("Erreur:". $e->getMessage());
	}

	function parametre ($nom, $type = 'text') {
		global $params;
		if (!isset($_POST[$nom])) { return false; }
		switch ($type) {
			case 'bool':
				if ($_POST[$nom] === 'on') { $params[$nom] =  1; }
				break;
			default:
				if (!empty($_POST[$nom])) { $params[$nom] = $_POST[$nom]; }
				break;
		}
	}

	parametre('home_country');
	parametre('home_region');
	parametre('home_ville');
	parametre('caracteristiques_sejour');
	parametre('caracteristiques_pieces');
	parametre('caracteristiques_personnes');
	parametre('parking', 'bool');
	parametre('piscine', 'bool');
	parametre('climatisation', 'bool');
	parametre('wifi', 'bool');
	parametre('animaux', 'bool');
	parametre('equipement', 'bool');
	parametre('handicape', 'bool');
	parametre('sport', 'bool');
	parametre('fumeur', 'bool');
	parametre('commerces', 'bool');
	parametre('debut');
	parametre('fin');
	parametre('remarque');

	foreach ($params as $key => $v) {
		if (!isset($sql)) {
			$sql = $key . '=:' . $key;
			$sql1 = '';
		}
		$sql1 .= $key . ', ';
		$sql .= ' AND ' . $key . '=:' . $key;
	}
	$sql1 = trim($sql1, ', ');

	$req=$db->prepare('SELECT * FROM home WHERE ' . $sql);
	$req->execute($params);
	$homes = $req->fetchAll();

	$params['user_id'] = $_SESSION['id'];
	
	$req = $db->prepare('INSERT INTO recherche (user_recherche, ' . $sql1 . ') VALUES (:user_id, ' . preg_replace('/([a-z_]+,? ?)/', ':$1', $sql1) . ')');
	$req->execute($params);
	$res = $db->lastInsertId();
	if ($res) { echo '<script>alert(\'Recherche enregistrée !\')</script>'; }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_resultat_recherchenm.css" />
		<title>resultat_recherchenm</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('inc/slider.php');?>

	
	
	
	
	<section style="position:absolute;width:62%;">

				
<?php foreach($homes as $home): ?>
	<div style="float:left;width:25%;box-sizing:border-box;margin:5px;background-color:#fff;">
		<b>Pays : </b><?= $home['home_country'];?><br>
		<b>Region : </b><?= $home['home_region'];?><br>
		<b>Ville : </b><?= $home['home_ville'];?><br>
		<b>Adresse : </b><?= $home['adresse'];?><br>
		<a href="fiche_logementm.php?id=<?= $home['id_home']; ?>">Consulter la maison</a>
	</div>
<?php endforeach; ?>
			
	</section>
	<img class="fond2"src="images/fond.jpg" />
<?php include('footer.php'); ?>
			

</body>