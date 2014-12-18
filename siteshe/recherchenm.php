<?php session_start(); ?>
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
		<link rel="stylesheet" href="style_site_she.css" />
		<title>Recherche_membre</title>
	</head>

	<body>
		<?php include('inc/header.php'); ?>
	
		<?php include('inc/esp_membre.php');?>
	
	
	
	<section><div class="corps_deposeruneannonce">
		

			
			<form method="post" action="resultats_recherchem.php">
				<legend><h2>Recherche</h2></legend>
			<article>
						<h3>Localisation<h3>
						<div class="localisation" id="localisation_pays">
							<label class="pays" for="home_country">Pays</label><br/>
							<select name="home_country" id="home_country" class="pays">
								<option value="france">France</option>
							</select>
						</div>


						<div class="localisation"id="localisation_region">
							<label for="home_region">Region</label><br/>
							<select name="home_region" id="home_region">
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
							<label class="ville" for="home_ville">Ville</label><br />
							<input name="home_ville" class="ville" id="home_ville">
						</div>

						<button type="button" onclick="toggle_div(this,'id_du_div');">recherche avancée</button>
 
						<div id="id_du_div" style="display:none;">
						<h3>Caractéristiques du logement</h3><br/>	
						<p>
							<div class="caracteristiques" id="caracteristiques_sejour"><br/>
								<label class="sejour"for="caracteristiques_sejour">Type de séjour</label><br/>
								<select name="caracteristiques_sejour" id="caracteristiques_sejour" class="sejour">
									<option value="ville">Ville</option>
									<option value="campagne">Campagne</option>
									<option value="A la mer">A la mer</option>
								</select>
							</div>
							
							<div class="caracteristiques" id="caracteristiques_pieces">
								<label class="pieces"for="caracteristiques_pieces">Nombre de pièces</label><br/>
								<input name="caracteristiques_pieces" id="caracteristiques_pieces" class="pieces" type="number">
							</div>
					
							<div class="caracteristiques" id="caracteristiques_personnes">
								<label class="personnes" for="caracteristiques_personnes">Nombre de personnes</label><br/>
								<input name="caracteristiques_personnes" id="caracteristiques_personnes"class="personnes" type="number">
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
							<input type="checkbox" name="animaux" id="animaux"/> <label id="animaux" for="animaux">Animaux autorisés</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="equipement" id="equipement"/> <label id="equipement" for="equipement">Equipements adaptés aux enfants</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="handicape" id="handicape"/> <label for="handicape">Accès handicapé</label><br/>
						</div>
						
						<div class="contraintes">
							<input type="checkbox" name="fumeur" id="fumeur"/> <label for="fumeur">Fumeur</label><br/>
						</div>
						<div class="contraintes">
							<input type="checkbox" name="sport" id="sport"/> <label for="sport">Equipements sportifs</label><br/>
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
							</div>
							 

							<script type="text/javascript">
							function toggle_div(bouton, id) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
							  var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
							  if(div.style.display=="none") { // Si le div est masqué...
							    div.style.display = "block"; // ... on l'affiche...
							    bouton.innerHTML = "recherche simple"; // ... et on change le contenu du bouton.
							    
							  } else { // S'il est visible...
							    div.style.display = "none"; // ... on le masque...
							    bouton.innerHTML = "recherche avancée"; // ... et on change le contenu du bouton.
							  }
							}
							</script>
						
						
						
				</article>
				</form>
		
				</section>
				
				
		<?php include('inc/slider.php');?>
	   <?php include('inc/footer.php');?>

			</body>