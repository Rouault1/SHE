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
		<link rel="stylesheet" href="stylerecherchem.css" />
		<title>Recherche_membre</title>
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
		<p>Family weekend</p>
	</aside>
	
	<aside>
		<img class="fond"src="images/paris.jpg" />
		<p>Flat in Paris</p>
	</aside>
	
	<section>
		
		<fieldset>
			
			<form method="post" action="resultats_recherchem.php">
				<legend><h2>Advanced research</h2></legend>
			<article>
						<h3>Location<h3>
						<div class="localisation" id="localisation_pays">
							<label class="pays" for="localisation">Country</label><br/>
							<select name="pays" id="pays" class="pays">
								<option value="france">France</option>
							</select>
						</div>


						<div class="localisation"id="localisation_region">
							<label for="region">Region</label><br/>
							<select name="region" id="region">
								<option value="alsace">Alsace</option>
								<option value="aquitaine">Aquitaine</option>
								<option value="auvergne">Auvergne</option>
								<option value="bassenormandie">Basse-Normandie</option>
								<option value="bourgogne">Bourgogne</option>
								<option value="bretagne">Bretagne</option>
								<option value="centre">Centre</option>
								<option value="champagneardennes">Champagne-Ardenne</option>
								<option value="guadeloupe">Guadeloupe</option>
								<option value="guyane">Guyane</option>
								<option value="hautenormandie">Haute-Normandie</option>
								<option value="iledefrance">Ile-de-France</option>
								<option value="lareunion">La Réunion</option>
								<option value="languedocrousillon">Languedoc-Rousillon</option>
								<option value="limousin">Limousin</option>
								<option value="lorraine">Lorraine</option>
								<option value="martinique">Martinique</option>
								<option value="mayotte">Mayotte</option>
								<option value="midipyrennée">Midi-Pyrennée</option>
								<option value="nordpasdecalais">Nord-de-Calais</option>
								<option value="paysdelaloire">Pays de la Loire</option>
								<option value="picardie">Picardie</option>
								<option value="poitoucharentes">Poitou-Charentes</option>
								<option value="provencealpescotedazur">Provence-Alpes-Côte d'Azur</option>
								<option value="rhonealpes">Rhône-Alpes</option>
							</select>
						</div>

						<div class="localisation">
							<label class="ville" for="ville">City</label><br />
							<input name="ville" class="ville" id="ville">
						</div>
						<h3>Housing characteristics</h3><br/>	
						<p>
						
						<div class="caracteristiques" id="caracteristiques_sejour"><br/>
							<label class="sejour"for="sejour">Type of stay</label><br/>
							<select name="sejour" id="sejour" class="sejour">
								<option value="ville">City</option>
								<option value="campagne">Countryside</option>
								<option value="A la mer">Seaside</option>
							</select>
						</div>
						
						<div class="caracteristiques" id="caracteristiques_pieces">
							<label class="pieces"for="pieces">Number of room</label><br/>
							<input name="pieces"id="pieces" class="pieces" type="number">
						</div>
				
						<div class="caracteristiques" id="caracteristiques_personnes">
							<label class="personnes"for="personnes" id="personnes">Number of people</label><br/>
							<input name="personnes"id="personnes"class="personnes" type="number">
						</div><br/>
				
						</p>
						
						<div class="amenagement">
							<h3 class="amenagement">Outer arrangements</h3></br>
			
								<input type="checkbox"class="parking" name="parking" id="parking"/> <label class="parking" id="parking" for="parking">Parking</label><br/>
							
								<input type="checkbox"class="piscine" name="piscine" id="piscine"/> <label class="piscine" id="piscine" for="piscine">Pool</label><br/>
						</div>

						<h3>Constraints and services</h3>
						<div class="contraintes">
							<input type="checkbox" name="climatisation" id="climatisation"/> <label for="climatisation">Air conditioning</label>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="wifi" id="wifi"/> <label for="wifi">Wifi</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="animauxautorises" id="animauxautorises"/> <label id="animauxautorises" for="animauxautorises">Pets allowed</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="equipement" id="equipement"/> <label id="equipement" for="equipement">Child's adapted equipments</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="acceshandicape" id="acceshandicape"/> <label for="acceshandicape">Disabled access</label><br/>
						</div>
						
						<div class="contraintes">
							<input type="checkbox" name="fumeur" id="fumeur"/> <label for="fumeur">Smoking</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="equipementssportifs" id="equipementssportifs"/> <label for="equipementssportifs">Sports equipments</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="commerces" id="commerces"/> <label for="commerces">Shop nearby</label><br/>
						</div>
			
						<h3>Availabilities</h3>
						<div class="disponibilites">
							<label class="debut" for="debut"id="debut">From</label><br />
							<input class="debut" type="date" name="debut" id="debut">
						</div>
						<div class="disponibilites">
							<label class="fin"for="fin"id="fin">To</label><br />
							<input class="fin"type="date" name="fin" id="fin">
						</div>
						
						<h3>Comments</h3>
						<div class="remarques">
							<textarea name="remarque" id="remarque" rows="10" cols="50"></textarea>  
						</div>  
						
						</br>
						<div class="envoyer">
							
							<input class="soumettre" type="submit" value="Lancer la recherche" />
						</div>

				</article>
				</form>
		</fieldset>
				
				<img class="fond2"src="images/fond.jpg" />
		<?php include('footer.php');?>

			</body>
			
				

				