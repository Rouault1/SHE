<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}

$localisation['pays']= isset($_POST["pays"]) ? $_POST["pays"] : '';
$localisation['region']= isset($_POST["region"]) ? $_POST["region"] : '';
$localisation['ville']= isset($_POST["ville"]) ? $_POST["ville"] : '';
$caracteristiques['sejour']= isset($_POST["sejour"]) ? $_POST["sejour"] : '';
$caracteristiques['pieces']= isset($_POST["pieces"]) ? $_POST["pieces"] : '';
$caracteristiques['personnes']= isset($_POST["personnes"]) ? $_POST["personnes"] : '';
$amenagement['parking'] = isset($_POST["parking"]) && $_POST["parking"] === 'on' ? 1 : 0;
$amenagement['piscine'] = isset($_POST["piscine"]) && $_POST["piscine"] === 'on' ? 1 : 0;
$contraintes['climatisation'] = isset($_POST["climatisation"]) && $_POST['climatisation'] === 'on' ? 1 : 0;
$contraintes['wifi'] = isset($_POST["wifi"]) && $_POST['wifi'] === 'on' ? 1 : 0;
$contraintes['animauxautorises'] = isset($_POST["animauxautorises"]) && $_POST['animauxautorises'] === 'on' ? 1 : 0;
$contraintes['equipement'] = isset($_POST["equipement"]) && $_POST['equipement'] === 'on' ? 1 : 0;
$contraintes['acceshandicape'] = isset($_POST["acceshandicape"]) && $_POST['acceshandicape'] === 'on' ? 1 : 0;
$contraintes['equipementssportifs'] = isset($_POST["equipementssportifs"]) && $_POST['equipementssportifs'] === 'on' ? 1 : 0;
$contraintes['fumeur'] = isset($_POST["fumeur"]) && $_POST['fumeur'] === 'on' ? 1 : 0;
$contraintes['commerces'] = isset($_POST["commerces"]) && $_POST['commerces'] === 'on' ? 1 : 0;
$disponibilites['debut'] = isset($_POST["debut"]) ? $_POST["debut"] : '';
$disponibilites['fin'] = isset($_POST["fin"]) ? $_POST["fin"] : '';

$sql = '';
$req=$db->prepare('SELECT * FROM home WHERE home_country=:pays AND home_region=:region AND home_ville=:ville AND caracteristiques_sejour=:sejour AND caracteristiques_pieces=:pieces AND caracteristiques_personnes=:personnes AND parking=:parking AND piscine=:piscine AND climatisation=:climatisation AND wifi=:wifi AND animaux=:animauxautorises AND equipement=:equipement AND handicape=:acceshandicape AND sport=:equipementssportifs AND fumeur=:fumeur AND commerces=:commerces AND debut=:debut AND fin=:fin');
$req->execute(array(
	'pays'		=> $localisation['pays'],
	'region'	=> $localisation['region'],
	'ville'		=> $localisation['ville'],
	'sejour'		=> $caracteristiques['sejour'],
	'pieces'	=> $caracteristiques['pieces'],
	'personnes'		=> $caracteristiques['personnes'],
	'parking'		=> $amenagement['parking'],
	'piscine'	=> $amenagement['piscine'],
	'climatisation'		=> $contraintes['climatisation'],
	'wifi'	=> $contraintes['wifi'],	
	'animauxautorises'		=> $contraintes['animauxautorises'],
	'equipement'		=> $contraintes['equipement'],
	'acceshandicape'	=> $contraintes['acceshandicape'],	
	'equipementssportifs'		=> $contraintes['equipementssportifs'],
	'fumeur'		=> $contraintes['fumeur'],
	'commerces'	=> $contraintes['commerces'],
	'debut'		=> $disponibilites['debut'],
	'fin'	=> $disponibilites['fin']
	));
$homes = $req->fetchAll();
					
if(!empty($_POST)) {
	$localisation['pays'] = isset($_POST["pays"]) ? $_POST["pays"] : '';
	$localisation['region'] = isset($_POST["region"]) ? $_POST["region"] : '';
	$localisation['ville'] = isset($_POST["ville"]) ? $_POST["ville"] : '';
	$caracteristiques['sejour'] = isset($_POST["sejour"]) ? $_POST["sejour"] : '';
	$caracteristiques['pieces'] = isset($_POST["pieces"]) ? $_POST["pieces"] : '';
	$caracteristiques['personnes'] = isset($_POST["personnes"]) ? $_POST["personnes"] : '';
	$amenagement['parking'] = isset($_POST["parking"]) && $_POST["parking"] === 'on' ? 1 : 0;
	$amenagement['piscine'] = isset($_POST["piscine"]) && $_POST["piscine"] === 'on' ? 1 : 0;
	$contraintes['climatisation'] = isset($_POST["climatisation"]) && $_POST['climatisation'] === 'on' ? 1 : 0;
	$contraintes['wifi'] = isset($_POST["wifi"]) && $_POST['wifi'] === 'on' ? 1 : 0;
	$contraintes['animauxautorises'] = isset($_POST["animauxautorises"]) && $_POST['animauxautorises'] === 'on' ? 1 : 0;
	$contraintes['equipement'] = isset($_POST["equipement"]) && $_POST['equipement'] === 'on' ? 1 : 0;
	$contraintes['acceshandicape'] = isset($_POST["acceshandicape"]) && $_POST['acceshandicape'] === 'on' ? 1 : 0;
	$contraintes['equipementssportifs'] = isset($_POST["equipementssportifs"]) && $_POST['equipementssportifs'] === 'on' ? 1 : 0;
	$contraintes['fumeur'] = isset($_POST["fumeur"]) && $_POST['fumeur'] === 'on' ? 1 : 0;
	$contraintes['commerces'] = isset($_POST["commerces"]) && $_POST['commerces'] === 'on' ? 1 : 0;
	$disponibilites['debut'] = isset($_POST["debut"]) ? $_POST["debut"] : '';
	$disponibilites['fin'] = isset($_POST["fin"]) ? $_POST["fin"] : '';
	$remarques['remarque'] = isset($_POST["remarque"]) ? $_POST["remarque"] : '';


	$sql = 'INSERT INTO recherche (home_country, home_region, home_ville,  caracteristiques_sejour, caracteristiques_pieces, caracteristiques_personnes, parking, piscine, climatisation, wifi, animaux, equipement, handicape, sport, commerces, debut, fin, remarques, fumeur) VALUES (:pays, :region, :ville, :sejour, :pieces, :personnes, :parking, :piscine, :climatisation, :wifi, :animauxautorises, :equipement, :acceshandicape, :equipementssportifs, :commerces, :debut, :fin, :remarque, :fumeur)';
	$req = $db->prepare($sql);
	$req->execute(array_merge($localisation, $caracteristiques, $amenagement, $contraintes, $disponibilites, $remarques));
	$res = $db->lastInsertId();
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
	
		<?php include('nonconnecter.php');?>

	<img class="fond1"src="images/fond1.jpg" />
	
	<aside>
		<img class="fond"src="images/fond.jpg" />
		<p>Villa</p>
	</aside>
	
	<aside>
		<img class="fond"src="images/famille.jpg" />
		<p>Family weekend</p>
	</aside>
	
	<aside>
		<img class="fond"src="images/paris.jpg" />
		<p>Flat in Paris</p>
	</aside>
	
	<section>

				
<?php foreach($homes as $home): ?>
		<a href="fiche_logementm.php?id=<?= $home['id_home']; ?>">Results <?= $home['id_home']; ?></a>
<?php endforeach; ?>
			
	</section>
	<img class="fond2"src="images/fond.jpg" />
<?php include('footer.php'); ?>
<script>confirm('Votre recherche a bien été enregistrée')</script>
</body>