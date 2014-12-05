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
		<p>Week-end en famille</p>
	</aside>
	
	<aside>
		<img class="fond"src="images/paris.jpg" />
		<p>Appartement parisien</p>
	</aside>
	
	<section>
		
		<fieldset>
			
			<form method="post" action="resultats_recherchem.php">
				<legend><h2>Recherche avancée</h2></legend>
			<article>
						<h3>Localisation<h3>
						<div class="localisation" id="localisation_pays">
							<label class="pays" for="localisation">Pays</label><br/>
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
							<label class="ville" for="ville">Ville</label><br />
							<input name="ville" class="ville" id="ville">
						</div>
						<h3>Caractéristiques du logement</h3><br/>	
						<p>
						
						<div class="caracteristiques" id="caracteristiques_sejour"><br/>
							<label class="sejour"for="sejour">Type de séjour</label><br/>
							<select name="sejour" id="sejour" class="sejour">
								<option value="ville">Ville</option>
								<option value="campagne">Campagne</option>
								<option value="A la mer">A la mer</option>
							</select>
						</div>
						
						<div class="caracteristiques" id="caracteristiques_pieces">
							<label class="pieces"for="pieces">Nombre de pièces</label><br/>
							<input name="pieces"id="pieces" class="pieces" type="number">
						</div>
				
						<div class="caracteristiques" id="caracteristiques_personnes">
							<label class="personnes"for="personnes" id="personnes">Nombre de personnes</label><br/>
							<input name="personnes"id="personnes"class="personnes" type="number">
						</div><br/>
				
						</p>
						
						<div class="amenagement">
							<h3 class="amenagement">Aménagements extérieurs</h3></br>
			
								<input type="checkbox"class="parking" name="parking" id="parking"/> <label class="parking" id="parking" for="parking">Parking</label><br/>
							
								<input type="checkbox"class="piscine" name="piscine" id="piscine"/> <label class="piscine" id="piscine" for="piscine">Piscine</label><br/>
						</div>

						<h3>Contraintes et services</h3>
						<div class="contraintes">
							<input type="checkbox" name="climatisation" id="climatisation"/> <label for="climatisation">Climatisation</label>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="wifi" id="wifi"/> <label for="wifi">Wifi</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="animauxautorises" id="animauxautorises"/> <label id="animauxautorises" for="animauxautorises">Animaux autorisés</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="equipement" id="equipement"/> <label id="equipement" for="equipement">Equipements adaptés aux enfants</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="acceshandicape" id="acceshandicape"/> <label for="acceshandicape">Accès handicapé</label><br/>
						</div>
						
						<div class="contraintes">
							<input type="checkbox" name="fumeur" id="fumeur"/> <label for="fumeur">Fumeur</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="equipementssportifs" id="equipementssportifs"/> <label for="equipementssportifs">Equipements sportifs</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="commerces" id="commerces"/> <label for="commerces">Commerces à proximité</label><br/>
						</div>
			
						<h3>Disponibilités</h3>
						<div class="disponibilites">
							<label class="debut" for="debut"id="debut">Date de début</label><br />
							<input class="debut" type="date" name="debut" id="debut">
						</div>
						<div class="disponibilites">
							<label class="fin"for="fin"id="fin">Date de fin</label><br />
							<input class="fin"type="date" name="fin" id="fin">
						</div>
						
						<h3>Autres remarques</h3>
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
			
				

				