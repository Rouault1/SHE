<?php


session_start();

try {
	$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	die("Erreur:". $e->getMessage());
}

if(isset($_POST)) {
	$localisation['pays'] = isset($_POST["pays"]) ? $_POST["pays"] : '';
	$localisation['region'] = isset($_POST["region"]) ? $_POST["region"] : '';
	$localisation['ville'] = isset($_POST["ville"]) ? $_POST["ville"] : '';
	$localisation['adresse'] = isset($_POST["adresse"])? $_POST["adresse"] : '';
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
	$accroche['accroche'] = isset($_POST["accroche"]) ? $_POST["accroche"] : '';
	$propriete['propriete'] = isset($_POST["propriete"]) ? $_POST["propriete"] : '';

	$sql = 'INSERT INTO home (home_country, home_region, home_ville, adresse, caracteristiques_sejour, caracteristiques_pieces, caracteristiques_personnes, parking, piscine, climatisation, wifi, animaux, equipement, handicape, sport, commerces, debut, fin, remarques, accroche, acte_propriete, fumeur) VALUES (:pays, :region, :ville, :adresse, :sejour, :pieces, :personnes, :parking, :piscine, :climatisation, :wifi, :animauxautorises, :equipement, :acceshandicape, :equipementssportifs, :commerces, :debut, :fin, :remarque, :accroche, :propriete, :fumeur)';
	$req = $db->prepare($sql);
	$req->execute(array_merge($localisation, $caracteristiques, $amenagement, $contraintes, $disponibilites, $remarques, $accroche, $propriete));
	$id_home = $db->lastInsertId();

	

}


?>
<?php include('inc/header_eng.php'); ?>
<?php include('inc/slider.php'); ?>
<?php include('inc/esp_membre_eng.php');?>

<h1 class="titre_verif">Thanks for submitting your house.</h1>
	<div class="verif">
		<h3 class="verif2">Your announce has been successfully submitted.</h3>
		<a href="index.php" class="lien_verif">Back to home</a>
	</div>	
	
<?php include('inc/footer_eng.php');?>

</body>