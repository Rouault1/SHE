<?php include('inc/header.php');?>
<script type="text/javascript" src="js/historique.js"></script>
<?php include('inc/esp_membre.php');?>
<?php session_start();
$_SESSION['id'] = 2; ?>
<?php if (!empty($_POST))
	{
				$form['notes'] = $_POST['notes'];
		// Initiaisation de l'objet PDO
		try {
			$db = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die ("Erreur:". $e->getMessage());
		}
		// Génération de la requête SQL
		$req = $db->prepare('INSERT INTO opinions (numstar, user_id_user ) VALUES (:notes, '.$_SESSION['id'].')');
		// On essaie d'executer la requête
		try {
			$req->execute($form);
			$res = $db->lastInsertId();
			if ($res) {
				echo 'Votre note a été prise en compte.';
			}	
		} catch (Exception $e) {
			die ("Erreur:". $e->getMessage());
		}
	}
?>		
	    <section class="historique">
			<h2>Derniers biens visités</h2>
				<div class="maison1">
					<a href="#"><img src="img/Maison8.jpg" width="210px" height="210px"/></a>
				</div>	
				<div class="bien1">
				<div class="description1">
					<article>
						<h3>Régions, caractéristiques, avis, phrase d'accroche</h3> </br>
						<form method="post" action="">
						<ul class="notes-echelle">
							<li>
								<label for="note01" title="Note&nbsp;: 1 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note01" value="1" required/>
							</li>
							<li>
								<label for="note02" title="Note&nbsp;: 2 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note02" value="2" required />
							</li>
							<li>
								<label for="note03" title="Note&nbsp;: 3 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note03" value="3" required />
							</li>
							<li>
								<label for="note04" title="Note&nbsp;: 4 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note04" value="4" required />
							</li>
							<li>
								<label for="note05" title="Note&nbsp;: 5 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note05" value="5" required />
							</li>
						</ul>
						    <input type="submit" value="Valider" class="valider_note"/>
					</form>
					</br>
						<a href="#"> Voir la fiche du bien</a>
					</article>
				</div> 
			</div>
			</br>
                <div class="bien2">
					<div class="maison2">
						<a href="#" ><img src="img/Maison7.jpg" width="210px" height="210px"/></a>
					</div>	

				<div class="description2">
					<article>
						<h3>Régions, caractéristiques, avis, phrase d'accroche</h3> </br>
						<form method="post" action="">
						<ul class="notes-echelle">
							<li>
								<label for="note01" title="Note&nbsp;: 1 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;" /></label>
								<input type="radio" name="notes" id="note01" value="1" required/>
							</li>
							<li>
								<label for="note02" title="Note&nbsp;: 2 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note02" value="2" required/>
							</li>
							<li>
								<label for="note03" title="Note&nbsp;: 3 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note03" value="3" required/>
							</li>
							<li>
								<label for="note04" title="Note&nbsp;: 4 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note04" value="4" required/>
							</li>
							<li>
								<label for="note05" title="Note&nbsp;: 5 sur 5"><img src="img/etoile-grise.png" style="width:20px;height:20px;"/></label>
								<input type="radio" name="notes" id="note05" value="5" required/>
							</li>
						</ul>
						    <input type="submit" value="Valider" class="valider_note"/>
					</form>
					</br>
						<a href="#"> Voir la fiche du bien</a>
					</article>
				</div>	
				</div>
		</section>
					
<?php include('inc/slider.php'); ?>
<?php include('inc/footer.php'); ?>