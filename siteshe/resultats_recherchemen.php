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
	if ($res) { echo '<script>alert(\'Registered search !\')</script>'; }
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

	
	<section style="position:relative;width:62%;"><div class="corps_deposeruneannonce" style="margin-left:50%;">

		<h3>Results of your search;</h3>	

<?php foreach($homes as $home): ?>
	<div style="float:left;width:25%;box-sizing:border-box;margin:5px;background-color:#fff;">
		<b>Country : </b><?= $home['home_country'];?><br>
		<b>Region : </b><?= $home['home_region'];?><br>
		<b>City : </b><?= $home['home_ville'];?><br>
		<b>Address : </b><?= $home['adresse'];?><br>
		<a href="fiche_logementmen.php?id=<?= $home['id_home']; ?>">See the corresponding home</a>
	</div>
<?php endforeach; ?>
			
	</section>
	<?php include('inc/slider.php');?>
	<?php include('inc/footer_eng.php');?>

</body>