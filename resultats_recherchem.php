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
		<p>Week-end en famille</p>
	</aside>
	
	<aside>
		<img class="fond"src="images/paris.jpg" />
		<p>Appartement parisien</p>
	</aside>
	
	<section>
		
		<fieldset>

		<legend><h2>Résultats de votre recherche</h2></legend>

			<article >
				<p class="phraseaccroche">Phrase d'accroche</p><br/>
			    <img src="images/villa1.jpg" alt="villa1"/>
			    <div class="logement">
			    <ul>
			    	<li>Localisation</li><br/>
			    	<li>Caractéristiques</li><br/>
			    	<li>Disponibilité</li><br/>
			    	<li>Aménagement</li><br/>
			    </ul>
			    </div>
			
				<p class="phraseaccroche">Phrase d'accroche</p><br/>
			    <img src="images/villa1.jpg" alt="villa1"/>
			    <div class="logement">
			    <ul>
			    	<li>Localisation</li><br/>
			    	<li>Caractéristiques</li><br/>
			    	<li>Disponibilité</li><br/>
			    	<li>Aménagement</li><br/>
			    </ul>
			    </div>
			
				<p class="phraseaccroche">Phrase d'accroche</p><br/>
			    <img src="images/villa1.jpg" alt="villa1"/>
			    <div class="logement">
			    <ul>
			    	<li>Localisation</li><br/>
			    	<li>Caractéristiques</li><br/>
			    	<li>Disponibilité</li><br/>
			    	<li>Aménagement</li><br/>
			    </ul>
			    </div>
<?php
$localisation['pays']= $db->quote(isset($_POST["pays"]) ? $_POST["pays"] : '');
$localisation['region']=$db->quote(isset($_POST["region"]) ? $_POST["region"] : '');
$localisation['ville']=$db->quote(isset($_POST["ville"])? $_POST["ville"] : '');
$req=$db->query('SELECT home_country,home_region, home_ville FROM home WHERE home_country = '.$localisation['pays'].' AND home_region = '.$localisation['region'].'AND home_ville='.$localisation['ville'].'');


		echo '<ul>';
		while ($donnees = $req->fetch())
		{
			echo'<li>' .$localisation['pays']. '</li></br><li>' .$localisation['region'].'</li></br><li>'.$localisation['ville']. '</li>';
		}
		echo '</ul>';
?>	
<?php
$caracteristiques['sejour']=$db->quote(isset($_POST["sejour"]) ? $_POST["sejour"] : '');
$caracteristiques['pieces']=$db->quote(isset($_POST["pieces"]) ? $_POST["pieces"] : '');
$caracteristiques['personnes']=$db->quote(isset($_POST["personnes"]) ? $_POST["personnes"] : '');
$req=$db->query('SELECT caracteristiques_sejour,caracteristiques_pieces, caracteristiques_personnes FROM home WHERE caracteristiques_sejour = '.$caracteristiques_sejour['sejour'].' AND caracteristiques_pieces = '.$caracteristiques['pieces'].'AND caracteristiques_personnes='.$caracteristiques['personnes'].'');


		echo '<ul>';
		while ($donnees = $req->fetch())
		{
			echo'<li>' .$caracteristiques['sejour']. '</li></br><li>' .$caracteristiques['pieces'].'</li></br><li>'.$caracteristiques['personnes']. '</li>';
		}
		echo '</ul>';
?>	
<?php
$amenagement['piscine']=$db->quote(isset($_POST["piscine"]) ? $_POST["piscine"] : '');
$amenagement['parking']=$db->quote(isset($_POST["parking"]) ? $_POST["parking"] : '');

$req=$db->query('SELECT piscine, parking FROM home WHERE piscine = '.$amenagement['piscine'].' AND parking = '.$amenagement['parking'].'');


		echo '<ul>';
		while ($donnees = $req->fetch())
		{
			echo'<li>' .$amenagement['piscine']. '</li></br><li>' .$amenagement['parking'].'</li>';
		}
		echo '</ul>';
?>	
	
<?php
$contraintes['climatisation']=$db->quote(isset($_POST["climatisation"]) ? $_POST["climatisation"] : '');
$contraintes['wifi']=$db->quote(isset($_POST["wifi"]) ? $_POST["wifi"] : '');
$contraintes['animauxautorises']=$db->quote(isset($_POST["animauxautorises"]) ? $_POST["animauxautorises"] : '');
$contraintes['equipement']=$db->quote(isset($_POST["equipement"]) ? $_POST["equipement"] : '');
$contraintes['acceshandicape']=$db->quote(isset($_POST["acceshandicape"]) ? $_POST["acceshandicape"] : '');
$contraintes['equipementssportifs']=$db->quote(isset($_POST["equipementssportifs"]) ? $_POST["equipementssportifs"] : '');
$contraintes['fumeur']=$db->quote(isset($_POST["fumeur"]) ? $_POST["fumeur"] : '');
$contraintes['commerces']=$db->quote(isset($_POST["commerces"]) ? $_POST["commerces"] : '');

$req=$db->query('SELECT climatisation, wifi, animaux_autorises, equipement, acces_handicape, fumeur, equipement_sportif, commerces FROM home WHERE climatisation = '.$contraintes['climatisation'].' AND wifi = '.$contraintes['wifi'].' AND animaux_autorises= '.$contraintes['animauxautorises'].' AND equipement = '.$contraintes['equipement'].' AND acces_handicape = '.$contraintes['acceshandicape'].' AND  fumeur= '.$contraintes['fumeur'].'AND equipement_sportif = '.$contraintes['equipementssportifs'].' AND  commerces= '.$contraintes['commerces'].'');


		echo '<ul>';
		while ($donnees = $req->fetch())
		{
			echo'<li>' .$contraintes['climatisation']. '</li></br><li>' .$contraintes['wifi'].'</li></br><li>' .$contraintes['animauxautorises']. '</li></br><li>'.$contraintes['equipement']. '</li></br><li>' .$contraintes['acceshandicape'].'</li></br><li>' .$contraintes['fumeur']. '</li></br><li>'.$contraintes['equipementssportifs']. '</li></br><li>' .$contraintes['commerces'].'</li></br><li>';
		}
		echo '</ul>';
?>	


				<div class="envoyer">
					<a href="effectuer une recherche1.php" >Relancer la recherche</a>
				</div>
			
			</article>
		</fieldset>

	</section>
				<img class="fond2"src="images/fond.jpg" />

				
				<?php include('footer.php');?>
</body>