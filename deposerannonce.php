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
			
			<form method="post" action="">
				<legend><h2>Déposer une annonce</h2></legend>
			
				<article>
					
						<div class="localisation"id="localisation">
							<label class="ville"for="localisation">Adresse</label><br />
							<textarea rows=1 cols=15 name="adresse" class="adresse"id="adresse"></textarea>
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
								
								$localisation['adresse']=$db->quote(isset($_POST["adresse"])? $_POST["adresse"] : '');
								$caracteristiques['sejour']=$db->quote(isset($_POST["sejour"]) ? $_POST["sejour"] : '');
								$caracteristiques['pieces']=$db->quote(isset($_POST["pieces"]) ? $_POST["pieces"] : '');
								$caracteristiques['personnes']=$db->quote(isset($_POST["personnes"]) ? $_POST["personnes"] : '');
								$amenagement['parking']=$db->quote(isset($_POST["parking"]) ? $_POST["parking"] : '');
								$amenagement['piscine']=$db->quote(isset($_POST["piscine"]) ? $_POST["piscine"] : '');
								$contraintes['climatisation']=$db->quote(isset($_POST["climatisation"]) ? $_POST["climatisation"] : '');
								$contraintes['wifi']=$db->quote(isset($_POST["wifi"]) ? $_POST["wifi"] : '');
								$contraintes['animauxautorises']=$db->quote(isset($_POST["animauxautorises"]) ? $_POST["animauxautorises"] : '');
								$contraintes['equipement']=$db->quote(isset($_POST["equipement"]) ? $_POST["equipement"] : '');
								$contraintes['acceshandicape']=$db->quote(isset($_POST["acceshandicape"]) ? $_POST["acceshandicape"] : '');
								$contraintes['equipementssportifs']=$db->quote(isset($_POST["equipementssportifs"]) ? $_POST["equipementssportifs"] : '');
								$contraintes['fumeur']=$db->quote(isset($_POST["fumeur"]) ? $_POST["fumeur"] : '');
								$contraintes['commerces']=$db->quote(isset($_POST["commerces"]) ? $_POST["commerces"] : '');
								$disponibilites['debut']=$db->quote(isset($_POST["debut"]) ? $_POST["debut"] : '');
								$disponibilites['fin']=$db->quote(isset($_POST["fin"]) ? $_POST["fin"] : '');
								$remarques['remarque']=$db->quote(isset($_POST["remarque"]) ? $_POST["remarque"] : '');
								$accroche['accroche']=$db->quote(isset($_POST["accroche"]) ? $_POST["accroche"] : '');
								$propriete['propriete']=$db->quote(isset($_POST["propriete"]) ? $_POST["propriete"] : '');
								$photo['photo']=$db->quote(isset($_POST["photo"]) ? $_POST["photo"] : '');

								$sql = 'INSERT INTO home (adresse, caracteristiques_sejour, caracteristiques_pieces, caracteristiques_personnes, parking, piscine, climatisation, wifi, animaux_autorises, equipement, acces_handicape, equipement_sportif, commerces, debut, fin, remarques, accroche, acte_propriete, photo, fumeur) VALUES (' . $localisation['adresse'] . ','. $caracteristiques['sejour'] .','   . $caracteristiques['pieces'] .',' . $caracteristiques['personnes'] .','   . $amenagement['parking'] .',' . $amenagement['piscine'] .',' . $contraintes['climatisation'] .',' . $contraintes['wifi'] .',' . $contraintes['animauxautorises'] .',' . $contraintes['equipement'] .',' . $contraintes['acceshandicape'] .',' . $contraintes['equipementssportifs'] .',' . $contraintes['commerces'] .',' . $disponibilites['debut'] .',' . $disponibilites['fin'] .',' . $remarques['remarque'] .',' . $accroche['accroche'] .',' . $propriete['propriete'] .',' . $photo['photo'] .',' . $contraintes['fumeur'] .')';
								// print_r($sql);
								$req = $db->query($sql);

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
				