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
		<link rel="stylesheet" href="styledeposerannonce.css" />
		<title>Deposer une annonce</title>
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
			
			<form method="post" action="annonceaccepte.php">
				<legend><h2>Déposer une annonce</h2></legend>
			
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

				
						<div class="localisation">
							<label class="ville" for="adresse">Adresse</label><br />
							<input name="adresse" class="ville" id="adresse">
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
			
								<input type="radio"class="parking" name="parking" id="parking"/> <label class="parking" id="parking" for="parking">Parking</label><br/>
							
								<input type="radio"class="piscine" name="piscine" id="piscine"/> <label class="piscine" id="piscine" for="piscine">Piscine</label><br/>
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
							<label for="fin"id="fin">Date de fin</label><br />
							<input class="fin"type="date" name="fin" id="fin">
						</div>
						
						<h3>Autres remarques</h3>
						<div class="remarques">
							<textarea name="remarque" id="remarque" rows="10" cols="50"></textarea>  
						</div>  
						
						</br>
						
						<h3>Phrase d'accroche</h3>
						<div class="accroche">
							<textarea name="accroche" id="accroche"></textarea>
						</div>
						
						<h3>Acte de propriété</h3>
							<input class="acte" type="image" id="propriete" value="Envoyer acte de propriété" />
						
						<h3>Image de la propriété</h3>
							<input class="acte" type="image" id="photo" value="Envoyer image" />
							<p>Pour que votre demande soit valide veuillez poster trois photographies de votre logement</p></article></br>
							<div class="envoyer">
							<input class="soumettre" type="submit" value="Envoyer" />
							</div>
							
					
						<?php
					
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
								// print_r($sql);
								$req = $db->prepare($sql);
								$req->execute(array_merge($localisation, $caracteristiques, $amenagement, $contraintes, $disponibilites, $remarques, $accroche, $propriete));
								$res = $db->lastInsertId();
								// print_r($res);
							}						 
						 ?>
				</article>
			</form>
		</fieldset>
				
				<img class="fond2"src="images/fond.jpg" />
		
		<?php include('footer.php');?>

			</body>
				