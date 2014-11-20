<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style-contact.css" />
		<title>Sweet Home Exchange : échangez vos propriétés en toute sûreté !</title>
	</head>
	<body>
		
		<?php include("menu.php") ; ?>


		<div id="esp_membre">
			<form method="post" action="traitement.php">
				<h3>Espace Membre<h3>
   					<h4>Email :</h4>
   					<input type="text" name="pseudo" />

					</br>

       				<h4>Mot de passe :</h4>
       				<input type="password" name="pass" id="pass" /> </br>
					<input type="submit" value="Se connecter" href="connection.php"/>
			</form>
       				</br></br>

       				<a href="inscription.php">S'inscrire</a> </br>
       				<a href="oublie_mdp.php">Mot de passe oublié</a>
       				</div>

       		<section>
       			<article>
       				<form method="post" action="traitement.php">

       					<h2>Contactez nous</h2>
       					<div class="input-nom">
       						<h3>Nom</h3>
       						<input type="text"/>
						</div>

						<div class="input-sujet">
							<h3>Sujet</h3>
       							<select name="sujet" id="sujet">
          					 		<option value="problèmes de comptes">Problèmes de compte</option>
           							<option value="suggestion">Suggestion</option>
           							<option value="détails pratique">Détails pratiques</option>
           							<option value="réclamations">Réclamations</option>
           							<option value="autre">Autre</option>
        						</select>   
        				</div>

						<div class="input-email">
       						<h3>Email</h3>
       						<input type="email" name="input-email" id="input-email" required />
						</div>

						<div class="input-message">
							<textarea name="textarea" rows="10" cols="50" placeholder="Votre message"></textarea>	
						</div> <br/>

						<div class="envoyer">
							<input type="submit" value="Envoyer">
						</div>
					</form>	
				</article>		
       		</section>		

       			<div id="footer">
		<ul>
			<li classe="lien_1" style="margin-left: 355px;"><a href="faq.php">F.A.Q</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cgu.php">Mentions légales</a></li>
			<li classe="lien_4"><a href="a_propos.php">A propos</a></li>
		</ul>
				</div>
				</body>
