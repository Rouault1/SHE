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
		<link rel="stylesheet" href="stylerecherche1.css" />
		<title>Effectuer_une_recherche</title>
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
			
			<form method="post" action="">
				<legend><h2>Recherche avancée</h2></legend>
			
				<article>
					<h3>Localisation</h3>
			
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

				
						<div class="localisation"id="localisation_ville">
							<label class="ville"for="localisation">Ville</label><br />
							<textarea rows=1 cols=15 name="ville" class="ville"id="ville"></textarea>
						</div>
						
			
			
			
						<h3>Caractéristiques du logement</h3><br/>	
						<p>
						
						<div class="caracteristiques" id="caracteristiques_sejour"><br/>
							<label class="sejour"for="séjour">Type de séjour</label><br/>
							<select name="séjour" id="sejour">
								<option value="ville">Ville</option>
								<option value="campagne">Campagne</option>
								<option value="A la mer">A la mer</option>
							</select>
						</div>
						
						<div class="caracteristiques" id="caracteristiques_pieces">
							<label class="pieces"for="pieces">Nombre de pièces</label><br/>
							<input id="pieces" class="pieces" type="number">
						</div>
				
						<div class="caracteristiques" id="caracteristiques_personnes">
							<label class="personnes"for="personnes" id="personnes">Nombre de personnes</label><br/>
							<input class="personnes" type="number">
						</div><br/>
				
						</p>
						
						<div class="amenagement">
							<h3 class="amenagement">Aménagements extérieurs</h3></br>
			
								<input type="radio" name="parking" id="parking"/> <label for="parking">Parking</label><br/>
							
								<input type="radio" name="piscine" id="piscine"/> <label for="piscine">Piscine</label><br/>
						</div>

						<h3>Contraintes et services</h3>
						<div class="contraintes">
							<input type="radio" name="climatisation" id="climatisation"/> <label for="climatisation">Climatisation</label>
						</div>
						<div class="contraintes">
							<input type="radio" name="wifi" id="wifi"/> <label for="wifi">Wifi</label><br/>
						</div>
						<div class="contraintes">
							<input type="radio" name="animaux autorisés" id="animauxautorises"/> <label for="animaux autorisés">Animaux autorisés</label><br/>
						</div>
						<div class="contraintes">
							<input type="radio" name="equipement" id="equipement"/> <label for="equipement">Equipements adaptés aux enfants</label><br/>
						</div>
						<div class="contraintes">
							<input type="radio" name="accès handicapé" id="acceshandicape"/> <label for="accès handicapé">Accès handicapé</label><br/>
						</div>
						
						<div class="contraintes">
							<input type="radio" name="fumeur" id="fumeur"/> <label for="fumeur">Fumeur</label><br/>
						</div>
						<div class="contraintes">
							<input type="radio" name="équipements sportifs" id="equipementssportifs"/> <label for="équipements sportifs">Equipements sportifs</label><br/>
						</div>
						<div class="contraintes">
							<input type="radio" name="commerces" id="commerces"/> <label for="commerces">Commerces à proximité</label><br/>
						</div>
			
						<h3>Disponibilités</h3>
						<div class="disponibilites">
							<label class="debut"for="debut">Date de début</label><br />
							<input class="debut"type="date" name="datedebut"id="début">
						</div>
						<div class="disponibilites">
							<label for="fin">Date de fin</label><br />
							<input type="date" name="datefin"id="fin">
						</div>
						
						<h3>Autres remarques</h3>
						<div class="remarques">
							<textarea name="remarque" id="remarque" rows="10" cols="50">
							</textarea>  
						</div>  
						
						</br>
						<div class="envoyer">
							<input class="enregistrer" type="submit" value="Enregistrer les paramètres de votre recherche" />
							<input class="soumettre" type="submit" value="Lancer la recherche" />
						</div>
					
				</article>
				</form>
		</fieldset>
				
				<img class="fond2"src="images/fond.jpg" />
		<footer>
					
			<ul class="bas">
				<li classe="lien_1"><a href="faq.php">F.A.Q</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="cgu.php">Mentions légales</a></li>
				<li classe="lien_4"><a href="a_propos.php">A propos</a></li>
			</ul>
			
		</footer>
	</body>
				

				